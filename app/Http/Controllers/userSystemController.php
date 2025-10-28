<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\bonuses;
use App\Cart;
use App\locations;
use App\services;
use App\discount;
use App\ordersList;
use App\serviceCategories;
use App\notificationMessages;
use App\notificationProfile;
use App\rating;
use App\Planer;

use Illuminate\Support\Facades\Auth;

class userSystemController extends Controller
{
    public function viewHome()
    {
        return view('auth.home', [
            'bonuses' => bonuses::where('user_id', Auth::id())->first(),
            'orderList' => ordersList::where('user_phone', Auth::user()->phone)->get(),
            'services' => services::all(),
            'categories' => serviceCategories::all(),
            'notifications' => notificationMessages::where('to_user_is', Auth::id())->get(),
            'notificationsProfile' => notificationProfile::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editName(Request $req)
    {
        Auth::user()->update([
            'name' => $req->text,
        ]);

        return response()->json(['success' => 'Success']);
    }
    public function editPhone(Request $req)
    {
        Auth::user()->update([
            'phone' => $req->text,
        ]);

        return response()->json(['success' => 'Success']);
    }
    public function rating(Request $req)
    {
        $userAssessment = rating::where('user_id', Auth::id())->first();

        if ($userAssessment) {
            $userAssessment->update(['assessment' => $req->assessment]);
        } else {
            rating::create([
                'user_id' => Auth::id(),
                'assessment' => $req->assessment,
            ]);
        }

        return response()->json(['success' => 'Success']);
    }
    public function question(Request $req)
    {
        $apiToken = "6769093680:AAF3JfdRWXdaEusU-30CY4PJM4NCM7bC2wM";
        $chatId = "-1002202176424";

        $name_client = Auth::user()->name;
        $phone_client = Auth::user()->phone;
        $comment_client = $req->question;

        $message = "<b>❔ - Питання:</b>\n\n";
        $message .= "👤 <b>Им'я:</b> $name_client\n";
        $message .= "📞 <b>Телефон:</b> $phone_client\n";
        $message .= "📝 <b>Питання:</b> $comment_client\n";

        $url = "https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chatId&text=" . urlencode($message) . "&parse_mode=HTML";

        $response = file_get_contents($url);

        return response()->json(['success' => 'Success']);
    }
}
