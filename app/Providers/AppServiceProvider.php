<?php

namespace App\Providers;

use DesignPattern\Singleton\TelegramApi;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TelegramApi::class, function ($app) {
            // 1. holat
            // return TelegramApi::getInstance();

            // 2. holat
            $telegramApi = new TelegramApi;
            $telegramApi->setKey(rand(1, 100));
            return $telegramApi;
        });
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
