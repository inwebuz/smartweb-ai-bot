<?php

namespace App\TelegramBot\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected string $name = 'start';

    protected string $description = 'Start the bot';

    public function handle(): void
    {
        $this->replyWithMessage([
            'text' => 'Hello, I am a bot!',
        ]);
    }
}
