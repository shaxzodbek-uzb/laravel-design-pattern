<?php
namespace DesignPattern\Singleton;


// 1 marta sozlana, istalga ishlatiladi
// xotirada joyni tejidi
// istalgan nuqtadan chaqirilsa 1ta obyekt qaytaradi

class TelegramApi
{
    // private $key;
    static private $instance;

    public static function getInstance() {
        if(!self::$instance){
            $telegramApi = new TelegramApi;
            $telegramApi->setKey(rand(1, 100));
            self::$instance = $telegramApi;
        }
        return self::$instance;
    }

    public function setKey($key) {
        $this->key = $key;
    }

    public static function sendMessage()
    {
        info('log sending message, key: ' . self::getInstance()->key);
    }
}