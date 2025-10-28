<?php

namespace App\Http\Controllers;

use App\serviceCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\bonuses;
use App\Cart;
use App\locations;
use App\services;
use App\discount;
use App\User;
use App\ordersList;
use App\notificationMessages;
use App\authReserve;
use Milon\Barcode\DNS1D;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class userSystemAdminController extends Controller
{
    public function showIndex()
    {
        return view('userAdmin.main', [
            'users' => User::all(),
            'bonuses' => bonuses::all(),
            'cart' => Cart::where('browser_id', $_SERVER['REMOTE_ADDR'])->get(),
            'services' => services::all(),
            'categories' => serviceCategories::all(),
        ]);
    }
    public function scan(Request $request)
    {
        $barcode = $request->input('barcode');
        $user = User::where('phone', $barcode)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Клієнт з таким номером не знайдений'
            ], 404);
        }

        // Находим бонусную карту
        $bonus = bonuses::find($user->bonus_card_id);
        if (!$bonus) {
            return response()->json([
                'message' => 'Бонусна карта не знайдена для цього клієнта'
            ], 404);
        }

        // Находим заказы по номеру телефона и статусу
        $orderList = ordersList::where('user_phone', $user->phone)->where('status', 2)->get();

        $services = [];
        foreach ($orderList as $el) {
            // Находим данные сервиса
            $data = services::find($el->service_id);
            if (!$data) {
                continue; // Пропускаем, если сервис не найден
            }

            $services[] = [
                'id' => $data->id,
                'price' => $el->service_price,
                'name' => $data->name,
            ];
        }

        return response()->json([
            'message' => "Знайдено клієнта! {$user->name}",
            'client' => $user,
            'bonuses' => $bonus,
            'orderList' => $services,
        ]);
    }

    public function getServices()
    {
        $services = services::all();
        return response()->json($services);
    }

    public function orderSuccess(Request $request)
    {
        $products = $request->input('products'); // Список товаров (id и цена)
        $bonuses = $request->input('bonuses'); // Использованные бонусы
        $finalAmount = $request->input('finalAmount'); // Общая сумма после бонусов
        $clientId = $request->input('clientId');
        $phone = $request->input('phone');

        // Проверка корректности полученных данных
        if (!is_array($products)) {
            return response()->json(['error' => 'Invalid services list format'], 400);
        }

        // Пример обработки товаров
        foreach ($products as $product) {
            if (!isset($product['id']) || !isset($product['price'])) {
                return response()->json(['error' => 'Invalid product format'], 400);
            }
            $productId = $product['id'];
            $productPrice = $product['price'];

            $order = ordersList::where('user_phone', $phone)->where('status', 2)->where('service_id', $productId)->first();
            if ($order) {
                $order->service_price = $productPrice;
                $order->status = '1';
                $order->save();
            }
        }
        
        $bonusCard = bonuses::where('user_id', $clientId)->first();
        if ($bonusCard) {
            // Получаем бонусную карту пользователя

            // Проверяем, что бонусная карта существует
            if ($bonuses > 0) {
                // Вычитаем использованные бонусы
                $newBonusBalance = $bonusCard->bonus - $bonuses;

                // Обновляем бонусы
                $bonusCard->update([
                    'bonus' => $newBonusBalance,
                ]);

                $message = 'Ваше замовлення було підтвердженно!<br><br>З рахунку списано: <b>' . $bonuses . ' ₴</b>';
                notificationMessages::create([
                    'from_profile' => 2,
                    'to_user_is' => $clientId,
                    'message' => $message,
                ]);
            }
            
            // Добавляем 2% от финальной суммы
            $bonusIncrease = $finalAmount * 0.02;
            $updatedBonusBalance = $bonusCard->bonus + $bonusIncrease;
    
            // Обновляем бонусы после добавления 2% от финальной суммы
            $bonusCard->update([
                'bonus' => $updatedBonusBalance,
            ]);
            $message = 'Вітаю!<br><br>Вам нараховано: <b>' . $bonusIncrease . ' ₴</b>';
            notificationMessages::create([
                'from_profile' => 2,
                'to_user_is' => $clientId,
                'message' => $message,
            ]);
        }

        // Возвращаем успешный ответ
        return response()->json([
            'success' => true,
            'message' => 'Данные успешно обработаны',
            'finalAmount' => $finalAmount,
        ]);
    }

    public function makeOrderAuth(Request $request)
    {
        // Получаем и декодируем данные клиента
        $client = json_decode($request->input('client'), true); // true преобразует в массив
        $bonusAmount = $request->input('bonusAmout');
        $servicesList = json_decode($request->input('servicesList'), true);

        // Проверка данных клиента
        $clientId = $client['id'] ?? null;
        $clientPhone = $client['phone'] ?? null;

        // Проверка услуг
        if (!is_array($servicesList)) {
            return response()->json(['error' => 'Invalid services list format'], 400);
        }
        foreach ($servicesList as $el) {
            ordersList::create([
                'service_id' => $el['id'],
                'user_phone' => $clientPhone,
                'service_price' => $el['price'],
                'status' => 2,
            ]);
        }

        return response()->json(['message' => 'Order created successfully']);
    }
    public function makeOrderReserve(Request $request)
    {
        // Получаем и декодируем данные клиента
        $client = json_decode($request->input('client'), true); // true преобразует в массив
        $bonusAmount = $request->input('bonusAmout');
        $servicesList = json_decode($request->input('servicesList'), true);

        // Проверка данных клиента
        $clientPhone = $client['phone'] ?? null;

        $authReserve = authReserve::where('reserve_phone', $clientPhone)->first();

        if ($authReserve) {
            $getReserveBonus = $authReserve->reserve_bonus + $bonusAmount;
            $authReserve->update(['reserve_bonus' => $getReserveBonus]);
        } else {
            authReserve::create([
                'reserve_phone' => $clientPhone,
                'reserve_bonus' => $bonusAmount,
            ]);
        }

        // Проверка услуг
        if (!is_array($servicesList)) {
            return response()->json(['error' => 'Invalid services list format'], 400);
        }

        foreach ($servicesList as $el) {
            ordersList::create([
                'service_id' => $el['id'],
                'user_phone' => $clientPhone,
                'service_price' => $el['price'],
                'status' => 1,
            ]);
        }

        return response()->json(['message' => 'Order created successfully']);
    }
    public function makeUser(Request $request)
    {
        $user = User::create([
            'phone' => $request->phone_client,
            'name' => $request->name_client,
        ]);

        $bonusNumber = bonuses::generateUniqueBonusNumber();
        $barcode = DNS1D::getBarcodePNG($bonusNumber, 'C39');
        $bonusCard = bonuses::create([
            'user_id' => $user->id,
            'bonus_number' => $bonusNumber,
            'bonus_code' => $barcode,
            'bonus' => $request->bonus_client,
        ]);
        User::find($user->id)->update([
            'bonus_card_id' => $bonusCard->id,
        ]);

        $messageSystem = '<b>Вітаємо зі створенням облікового запису!</b><br>Тут ви будете отримувати службові сповіщення';
        notificationMessages::create([
            'from_profile' => 2,
            'to_user_is' => $user->id,
            'message' => $messageSystem,
        ]);
        notificationMessages::create([
            'from_profile' => 1,
            'to_user_is' => $user->id,
            'message' => $messageSystem,
        ]);

        return response()->json(['client_number' => $request->phone_client]);
    }

    public function showLogs()
    {
        // Get all log files from the logs directory
        $logFiles = File::files(storage_path('logs'));

        // Sort files by modification time, in descending order (newest first)
        usort($logFiles, function ($a, $b) {
            return File::lastModified($b) - File::lastModified($a); // Sort by modification time
        });

        // Prepare an array with filenames and their content
        $logs = [];
        foreach ($logFiles as $logFile) {
            $logs[] = [
                'filename' => $logFile->getFilename(),
                'content' => File::get($logFile),
            ];
        }

        return view('userAdmin.logs', compact('logs'));
    }

    public function showAnalytics()
    {
        // Клиентская аналитика
        $users = DB::table('users')
            ->leftJoin('bonuses', 'users.bonus_card_id', '=', 'bonuses.id')
            ->select('users.*', 'bonuses.bonus')
            ->get();
        $clientCount = $users->count();
        $totalBonuses = $users->sum('bonus');
        $withBonusCount = $users->where('bonus', '>', 0)->count();
        $withoutBonusCount = $clientCount - $withBonusCount;

        // Аналитика по рейтингу (оценки от 1 до 5)
        $ratingsData = DB::table('ratings')
            ->select('assessment', DB::raw('COUNT(*) as count'))
            ->groupBy('assessment')
            ->orderBy('assessment')
            ->pluck('count', 'assessment');

        // Месячная тенденция бонусов
        $monthlyBonusData = DB::table('bonuses')
            ->select(DB::raw('SUM(bonus) as total_bonus'), DB::raw('MONTH(updated_at) as month'))
            ->where('bonus', '>', 0)
            ->whereYear('updated_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_bonus', 'month');

        // Аналитика заказов
        $totalEarnings = DB::table('orders_lists')
            ->sum(DB::raw('CAST(REPLACE(service_price, "грн", "") AS DECIMAL(10, 2))'));
        $processedCount = DB::table('orders_lists')->where('status', 1)->count();
        $pendingCount = DB::table('orders_lists')->where('status', 2)->count();
        $uniqueClientsCount = DB::table('orders_lists')->distinct('user_phone')->count('user_phone');
        $averageOrderValue = $totalEarnings / max($processedCount + $pendingCount, 1);
        $averageOrdersPerClient = ($processedCount + $pendingCount) / max($uniqueClientsCount, 1);

        // Минимальный и максимальный доход по заказам
        $minOrderEarnings = DB::table('orders_lists')
            ->min(DB::raw('CAST(REPLACE(service_price, "грн", "") AS DECIMAL(10, 2))'));
        $maxOrderEarnings = DB::table('orders_lists')
            ->max(DB::raw('CAST(REPLACE(service_price, "грн", "") AS DECIMAL(10, 2))'));

        // Популярные товары с именами
        $popularProducts = DB::table('orders_lists')
            ->select('orders_lists.service_id', DB::raw('COUNT(*) as count'), 'services.name')
            ->join('services', 'orders_lists.service_id', '=', 'services.id')
            ->groupBy('orders_lists.service_id', 'services.name')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        // Товары, заказанные в этом месяце с именами
        $thisMonthProducts = DB::table('orders_lists')
            ->whereYear('orders_lists.created_at', date('Y'))
            ->whereMonth('orders_lists.created_at', date('m'))
            ->select('orders_lists.service_id', DB::raw('COUNT(*) as count'), 'services.name')
            ->join('services', 'orders_lists.service_id', '=', 'services.id')
            ->groupBy('orders_lists.service_id', 'services.name')
            ->orderByDesc('count')
            ->get();

        return view('userAdmin.analytics', compact(
            'clientCount',
            'totalBonuses',
            'withBonusCount',
            'withoutBonusCount',
            'monthlyBonusData',
            'totalEarnings',
            'processedCount',
            'pendingCount',
            'uniqueClientsCount',
            'averageOrderValue',
            'averageOrdersPerClient',
            'minOrderEarnings',
            'maxOrderEarnings',
            'popularProducts',
            'thisMonthProducts',
            'ratingsData'
        ));
    }
    public function showClients()
    {
        // Retrieve users with their bonus information
        $users = User::with('bonus') // assuming a 'bonus' relationship is defined in the User model
            ->select('id', 'name', 'phone', 'bonus_card_id')
            ->get();

        return view('userAdmin.users', compact('users'));
    }
}
