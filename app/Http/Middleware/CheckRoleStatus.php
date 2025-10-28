<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleStatus
{
    public function handle(Request $request, Closure $next, $roleLevel)
    {
        // Проверяем, авторизован ли пользователь
        if (!Auth::check()) {
            return redirect('/login'); // Редиректим на страницу входа, если пользователь не авторизован
        }

        // Получаем текущего пользователя
        $user = Auth::user();

        // Проверяем роль пользователя
        if ($user->role == $roleLevel) {
            return $next($request);
        }

        return abort(403, 'У вас нема доступу до керування!'); // Возвращаем ошибку 403, если роль пользователя ниже требуемого уровня
    }
}
