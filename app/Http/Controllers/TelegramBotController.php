<?php

namespace App\Http\Controllers;

use App\Models\BotChat;
use App\Models\BotMessage;
use App\Models\BotUser;
use App\TelegramBot\Commands\DefaultCommand;
use App\TelegramBot\Telegram as TelegramBotTelegram;
use App\TelegramBot\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramBotController extends Controller
{
    public function webhook(Request $request)
    {
        try {
            $update = new Update($request);
            $message = $update->getMessage();
            if ($message && !empty($message['chat']['id']) && !empty($message['from']['id']) && !empty($message['text'])) {
                $update->botUser = BotUser::updateOrCreate([
                    'id' => $message['from']['id'],
                ], $message['from']);

                $update->botChat = BotChat::updateOrCreate([
                    'id' => $message['chat']['id'],
                ], $message['chat']);

                $update->botMessage = BotMessage::updateOrCreate([
                    'id' => $message['message_id'],
                ], [
                    'chat_id' => $message['chat']['id'],
                    'user_id' => $message['from']['id'],
                    'date' => $message['date'] ?? null,
                    'text' => $message['text'],
                    'entities' => $message['entities'] ?? [],
                ]);

                $command = new DefaultCommand($update);
                $command->handle();
            }
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
        }

        return 'ok';
    }

    public function setWebhook()
    {
        Http::get('https://api.telegram.org/bot' . config('services.telegram.bot.token') . '/setWebhook', ['url' => config('services.telegram.bot.webhook_url')]);
    }
}
