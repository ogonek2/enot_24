<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;
use App\bonuses;
use Milon\Barcode\DNS1D;
use App\notificationMessages;

class SmsAuthController extends Controller
{
    public function sendSmsCode(Request $request)
    {   
        if (Auth::check()) {
            return redirect()->route('home');
        }
        // Валидация номера телефона
        $request->validate([
            'phone' => 'required|string'
        ]);

        $phoneNumber = $request->phone;
        $smsCode = rand(100000, 999999);

        // Поиск пользователя по номеру телефона
        $user = User::where('phone', $phoneNumber)->first();

        // Если пользователь не найден, создаем нового
        if (!$user) {
            $user = User::create([
                'phone' => $phoneNumber,
                'sms_code' => $smsCode,
                'sms_code_expires_at' => Carbon::now()->addMinutes(10)
            ]);
            $user->update([
                'name' => 'Клієнт№' . $user->id,
            ]);

            $bonusNumber = bonuses::generateUniqueBonusNumber();
            $barcode = DNS1D::getBarcodePNG($bonusNumber, 'C39');
            $bonusCard = bonuses::create([
                'user_id' => $user->id,
                'bonus_number' => $bonusNumber,
                'bonus_code' => $barcode,
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

            $message = "Реєстрація: Ваш код підтвердження: {$smsCode}";
        } else {
            // Если пользователь существует, обновляем код и время его истечения
            $user->update([
                'sms_code' => $smsCode,
                'sms_code_expires_at' => Carbon::now()->addMinutes(10)
            ]);
            $message = "Вхід: Ваш код підтвердження: {$smsCode}";
        }

        // Отправка SMS-кода через Alpha SMS
        $client = new Client();
        try {
            $response = $client->get('https://alphasms.ua/api/http.php', [
                'query' => [
                    'version' => 'http',
                    'key' => '12bf3bae-dfc3-4c81-a776-b18448a35f2d',
                    'command' => 'send',
                    'from' => 'Enot24',
                    'to' => $phoneNumber,
                    'message' => $message,
                ]
            ]);

            $result = $response->getBody()->getContents();
            if (strpos($result, 'id:') !== false) {
                session()->flash('phone', $request->phone);
                return redirect()->route('verify_page');
            } else {
                return response()->json(['error' => 'Ошибка при отправке SMS: ' . $result], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ошибка при отправке SMS: ' . $e->getMessage()], 500);
        }
    }

    public function loginWithSmsCode(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        // Валидация SMS-кода
        $request->validate([
            'sms_code' => 'required|integer'
        ]);

        // Поиск пользователя по SMS-коду и проверка срока его действия
        $user = User::where('sms_code', $request->sms_code)
            ->where('sms_code_expires_at', '>', Carbon::now())
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Неверный код или код истек'], 401);
        }

        // Удаляем код подтверждения после успешного входа
        $user->update([
            'sms_code' => null,
            'sms_code_expires_at' => null
        ]);

        // Устанавливаем флаг для запоминания пользователя
        $remember = $request->has('remember');

        // Выполняем аутентификацию с remember_token
        auth()->login($user, $remember);

        return redirect()->route('home');
    }

}
