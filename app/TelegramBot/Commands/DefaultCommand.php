<?php

namespace App\TelegramBot\Commands;

class DefaultCommand extends Command
{
    public function handle()
    {
        $text = $this->update->botMessage->text;
        $this->telegram->sendMessage([
            'chat_id' => $this->update->botChat->id,
            'text' => 'Hello, ' . $this->update->botUser->first_name . '! You said: ' . $text,
        ]);
    }
}
