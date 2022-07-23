<?php

namespace App\Providers;

use DesignPattern\Adapter\GeocoderAdapter;
use DesignPattern\Adapter\GoogleGeocoderAdapter;
use DesignPattern\Adapter\UzavtoGeocoderAdapter;
use DesignPattern\Adapter\YandexGeocoderAdapter;
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

        $this->app->bind(GeocoderAdapter::class, function ($app) {
            $settings = config('app.geocoder');
            switch ($settings) {
                case 'google':
                    return new GoogleGeocoderAdapter;
                case 'yandex':
                    return new YandexGeocoderAdapter;
                default:
                    return new UzavtoGeocoderAdapter;
            }
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
