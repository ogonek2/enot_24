<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\services;
use App\serviceCategories;
use App\bonuses;
use App\ordersList;
use App\notificationMessages;
use App\Services\PushoverService;


use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $pushoverService;

    // Внедрение зависимости через конструктор
    public function __construct(PushoverService $pushoverService)
    {
        $this->pushoverService = $pushoverService;
    }
    public function index()
    {
        return view(
            'cart',
            [
                'cart' => Cart::where('browser_id', $_SERVER['REMOTE_ADDR'])->get(),
                'services' => services::all(),
                'categories' => serviceCategories::all(),
            ]
        );
    }

    public function store(Request $req)
    {

        Cart::create([
            'service_id' => $req->service_id,
            'browser_id' => $_SERVER['REMOTE_ADDR'],
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $cartItem = Cart::find($id);
        $cartItem->delete();

        return redirect()->back();
    }
    public function allDestroy()
    {
        $cartItem = Cart::where('browser_id', $_SERVER['REMOTE_ADDR'])->delete();

        return redirect()->back();
    }

    public function submit(Request $req)
    {
        $apiToken = "6769093680:AAF3JfdRWXdaEusU-30CY4PJM4NCM7bC2wM";
        $chatId = "-1002202176424";
        
            $validatedData = $req->validate([
                'feedback_client' => 'required|min:1|max:255',
                'service_client' => 'required|min:1',
            ]);
            
            if ($validatedData) {
                $service_client = $req->service_client;
                $type_service_price = $req->type_service_price;

                $result = []; // Массив для хранения результата

                foreach ($service_client as $key => $value) {
                    if (isset($type_service_price[$key])) {
                        $result[] = $value . ' - ' . $type_service_price[$key];
                    }
                }
                $messageContent = implode("\n", $result);

                $name_client = $req->client_name;
                $phone_client = $req->feedback_client;
                $adress_client = $req->adress;
                $comment_client = $req->comment;

                $message = "📋 <b>Замовлення на чистку:</b>\n\n";
                $message .= "👤 <b>Им'я:</b> $name_client\n";
                $message .= "📞 <b>Телефон:</b> $phone_client\n";
                $message .= "🏠 <b>Адреса:</b> $adress_client\n";
                $message .= "📝 <b>Коментарій:</b> $comment_client\n";
                $message .= "🔧 <b>Сервіс:</b>\n$messageContent\n";

                Cart::where('browser_id', $_SERVER['REMOTE_ADDR'])->delete();
                $servicesObject = json_decode($req->input('servicesObject'), true);
                foreach ($servicesObject as $el) {
                    ordersList::create([
                        'service_id' => $el['service_name'],
                        'user_phone' => $req->feedback_client,
                        'service_price' => $el['service_price'],
                    ]);
                }
                try {
                // Отправляем уведомление через Pushover
                    $formData = (object) [
                        "Телефон" => $phone_client,
                        "Ім'я" => $name_client,
                        "Коментарій" => $comment_client,
                        "Сервіс" => $messageContent
                    ];
                    $this->pushoverService->sendNotification($formData); // Используем $this для доступа к свойствам класса
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Не удалось отправить уведомление: ' . $e->getMessage()], 500);
                }
                

                
                return redirect()->route('thanks');
            }
    }
}
