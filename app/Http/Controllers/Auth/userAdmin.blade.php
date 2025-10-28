<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\adminsHash;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;
use App\bonuses;
use Milon\Barcode\DNS1D;
use App\notificationMessages;

class userAdmin extends Controller
{
    public function makeAdmin(Request $req)
    {
        // Валидация номера телефона
        $request->validate([
            'admin_id' => 'required|string'
        ]);
        
        adminHash::create([
            'admin_id' => $request->admin_id,
            'admin_hash_key' => Hash::make($request->admin_hash_key),
        ]);
        
        return redirect()->back();
    }
    public function loginAdmin(Request $req)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        // Валидация номера телефона
        $request->validate([
            'phone' => 'required|string'
        ]);

        $phoneNumber = $request->phone;
        
        $user_db = User::where('phone', $phoneNumber)->first();
        $user_auth = adminHash::where('admin_id', $user_db->id)->first();
        
        if (!$user) {
            return response()->json(['phone' => 'Не існує адміністратора!'], 500);
        }
        
        // Проверить пароль
        if (Hash::check($request->key_auth, $user_auth->admin_hash_key)) {
            auth()->login($user_db);
        } else {
            return response()->json(['key_auth' => 'Неверный пароль'], 401);
        }
    }

}
