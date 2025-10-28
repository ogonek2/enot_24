<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\adminsHash;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Проверяем, совпадают ли введенные email и пароль с жестко закодированными значениями
        if ($credentials['email'] === 'admin@example.com' && $credentials['password'] === 'secret') {
            // Аутентификация успешна
            Auth::loginUsingId(1); // Жестко закодированный id пользователя
            return redirect()->intended(route('admin.main'));
        }

        return back()->withErrors(['email' => 'Неверный email или пароль.']);
    }
    
    
    public function makeAdmin(Request $request)
    {
        // Валидация номера телефона
        $request->validate([
            'admin_id' => 'required|string'
        ]);
        
        adminsHash::create([
            'admin_id' => $request->admin_id,
            'admin_hash_key' => Hash::make($request->admin_hash_key),
        ]);
        
        return redirect()->back();
    }
    public function loginAdmin(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
    
        // Валидация номера телефона
        $request->validate([
            'phone' => 'required|string',
            'key_auth' => 'required|string',
        ]);
    
        $phoneNumber = $request->phone;
    
        // Найти пользователя
        $user_db = User::where('phone', $phoneNumber)->first();
    
        if (!$user_db) {
            return response()->json(['phone' => 'Не існує адміністратора!'], 500);
        }
    
        // Найти ключ авторизации администратора
        $user_auth = adminsHash::where('admin_id', $user_db->id)->first();
    
        if (!$user_auth) {
            return response()->json(['key_auth' => 'Не знайдено ключ для адміністратора'], 500);
        }
    
        // Проверить пароль
        if (Hash::check($request->key_auth, $user_auth->admin_hash_key)) {
            auth()->login($user_db);
            return redirect()->route('home');
        } else {
            return response()->json(['key_auth' => 'Неверный пароль'], 401);
        }
    }

    
}
