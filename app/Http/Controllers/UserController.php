<?php

namespace App\Http\Controllers;

use DesignPattern\Singleton\TelegramApi;

class UserController extends Controller
{
    public function index()
    {
        // $telegramApi = TelegramApi::getInstance();
        $telegramApi = app(TelegramApi::class);
        $telegramApi->sendMessage();
    }
}