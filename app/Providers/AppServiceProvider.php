<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PushoverService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Явная регистрация PushoverService
        $this->app->singleton(PushoverService::class, function ($app) {
            return new PushoverService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         require_once app_path('helpers.php');
    }
}
