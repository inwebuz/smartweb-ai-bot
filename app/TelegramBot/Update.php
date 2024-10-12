<?php

namespace App\TelegramBot;

use App\Models\BotChat;
use App\Models\BotMessage;
use App\Models\BotUser;
use Illuminate\Http\Request;

class Update
{
    protected $request;

    public BotChat $botChat;
    public BotUser $botUser;
    public BotMessage $botMessage;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getId()
    {
        return $this->request->input('update_id');
    }

    public function getMessage()
    {
        return $this->request->input('message', []);
    }
}
