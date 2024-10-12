<?php

namespace App\TelegramBot\Commands;

use App\TelegramBot\Telegram;
use App\TelegramBot\Update;

class Command
{
    protected $telegram;
    protected $update;

    public function __construct(Update $update)
    {
        $this->telegram = new Telegram();
        $this->update = $update;
    }
}
