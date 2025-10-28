<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\durationForms;
use App\Services\PushoverService;

class orderController extends Controller
{
    protected $pushoverService;

    // Внедрение зависимости через конструктор
    public function __construct(PushoverService $pushoverService)
    {
        $this->pushoverService = $pushoverService;
    }
    public function durationForm(Request $req) {
        $validatedData = $req->validate([
            'phone' => 'required|min:1|max:255',
        ]);
        if ($validatedData) {
            $getPhone = $req->phone;
            
            $apiToken = env('TG_BOT_TOKEN');
            $chatId = env("NOTIFICATIONS_CHAT_ID");
            
            // Проверяем наличие номера телефона в базе данных через модель
            if (durationForms::where('phone', $getPhone)->exists()) {
                // Если номер существует
                $message = "📋 <b>Зворотній зв'язок - АКЦІЯ 20% на перше замовлення:</b>\n\n";
                $message .= "📞 <b>Телефон:</b> $getPhone\n\n";
                $message .= "⚠️ <b>ЗАСТЕРЕЖЕННЯ: </b>Цей номер раніше вже був записаний на перше замовлення\n";
            } else {
                // Если номер не найден
                $message = "📋 <b>Зворотній зв'язок - АКЦІЯ 20% на перше замовлення:</b>\n\n";
                $message .= "📞 <b>Телефон:</b> $getPhone\n\n";
                $message .= "✅ <b>Раніше не фіксувався на акції</b>\n";
                
                durationForms::create(['phone' => $getPhone]);
            }
            
            session(['windowHidden' => now()->addMinutes(10)]);
            
            $url = "https://api.telegram.org/bot{$apiToken}/sendMessage?" . http_build_query([
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'HTML'
            ]);
            
            file_get_contents($url);
            
            return redirect()->route('thanks');
        }
    }

    public function feedback(Request $req) {
        $validatedData = $req->validate([
            'feedback_client' => 'required|min:6|max:255',
        ]);
        if ($validatedData) {
            
            $apiToken = env('TG_BOT_TOKEN');
            $chatId = env("NOTIFICATIONS_CHAT_ID");
        
            $name_client = $req->client_name;
            $phone_client = $req->feedback_client;
            $adress_client = $req->adress;
            $comment_client = $req->comment;
            $service = $req->service_type;
            $data_w_f = $req->data_f_w ?? '~Відсутня~';

            $message = "📋 <b>$service:</b>\n\n";
            $message .= "📝 <b>Знижка або акція:</b> $data_w_f \n";
            $message .= "👤 <b>Им'я:</b> $name_client\n";
            $message .= "📞 <b>Телефон:</b> $phone_client\n";
            $message .= "🏠 <b>Адреса:</b> $adress_client\n";
            $message .= "📝 <b>Коментарій:</b> $comment_client\n";

            session(['windowHidden' => now()->addMinutes(10)]);
            
            $url = "https://api.telegram.org/bot{$apiToken}/sendMessage?" . http_build_query([
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'HTML'
            ]);
            
            file_get_contents($url);
            
            return redirect()->route('thanks');
        } 
    }
    
    public function durationFormPhone(Request $req) {
        $validatedData = $req->validate([
            'phone' => 'required|min:1|max:255',
        ]);
        if ($validatedData) {
            $getPhone = $req->phone;
            
            $apiToken = env('TG_BOT_TOKEN');
            $chatId = env("NOTIFICATIONS_CHAT_ID");
            
            // Если номер не найден
            $message = "📋 <b>Зворотній зв'язок - $req->promotionType</b>\n\n";
            $message .= "📞 <b>Телефон:</b> $getPhone\n\n";
                
            
            $url = "https://api.telegram.org/bot{$apiToken}/sendMessage?" . http_build_query([
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'HTML'
            ]);
            
            file_get_contents($url);
            
            
            session(['windowHidden' => now()->addMinutes(10)]);
            return redirect()->route('thanks');
        }
    }
}
