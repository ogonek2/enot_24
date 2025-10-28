<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\notificationMessages;
use App\notificationProfile;
use App\User;
use App\bonuses;

class notificationsController extends Controller
{
    public function showAdmin()
    {
        return view('userAdmin.notifications', [
            'messages' => notificationMessages::all(),
            'profile' => notificationProfile::all(),
            'users' => User::all(),
            'bonuses' => bonuses::all(),
        ]);
    }
    public function makeProfile(Request $req)
    {
        $img = $req->file('icon')->store('src/notifications/profile', 'public');
        $serviceCategories = notificationProfile::create([
            'name' => $req->name,
            'title' => $req->title,
            'message_permisson' => $req->message_permission,
            'icon' => $img,
        ]);
        return redirect()->back()->with('success', 'Посильного створено!');
    }

    public function makeIndividual(Request $req)
    {
        notificationMessages::create([
            'from_profile' => $req->from_profile,
            'to_user_is' => $req->client,
            'message' => $req->value,
        ]);

        return redirect()->back()->with('success', 'Лист створено!');
    }
    public function makeMailing(Request $req)
    {
        foreach (User::all() as $user) {
            notificationMessages::create([
                'from_profile' => $req->from_profile,
                'to_user_is' => $user->id,
                'message' => $req->value,
            ]);
        }

        return redirect()->back()->with('success', 'Лист створено!');
    }

    public function makeBonus(Request $req)
    {
        $message = '';
        $getBonusCard = bonuses::where('user_id', $req->client)->first();

        // Проверяем, существует ли бонусная карточка
        if ($getBonusCard) {
            // Нарахування бонусу
            $bonusPlus = $getBonusCard->bonus + $req->bonus;

            // Обновляем запись с новой суммой бонусов
            $getBonusCard->update(['bonus' => $bonusPlus]);

            $message = 'Шановний клієнт! Вітаю, вам нарховано +' . $req->bonus . '₴ Бонусу!';
        } else {
            $message = 'Операція нарахування була відклонена. Зверніться будь ласка у технічну підтримку сайту';
        }
        notificationMessages::create([
            'from_profile' => 2,
            'to_user_is' => $req->client,
            'message' => $message,
        ]);

        return redirect()->back()->with('success', 'Лист створено!');
    }
}
