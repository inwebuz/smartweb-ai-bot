<?php

namespace App\TelegramBot;

use Illuminate\Support\Facades\Http;

class Telegram
{
    private $token;

    public function __construct()
    {
        $this->token = config('services.telegram.bot.token');
    }

    public function __call($name, $arguments)
    {
        $data = (isset($arguments[0]) && is_array($arguments[0])) ? $arguments[0] : [];
        return $this->send($name, $data);
    }

    private function send($method, $data)
    {
        return Http::post('https://api.telegram.org/bot' . $this->token . '/' . $method, $data);
    }
}
