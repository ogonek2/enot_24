<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Переопределяем метод для аутентификации
    protected function credentials(Request $request)
    {
        // Возвращаем массив с номером телефона и паролем
        return $request->only('phone', 'password');
    }

    // Переопределяем метод валидации
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|string', // Убедись, что здесь есть нужная валидация для номера телефона
            'password' => 'required|string',
        ]);
    }
}

