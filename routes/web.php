<?php

use App\Http\Controllers\TelegramBotController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', [TestController::class, 'index'])->name('test');
Route::get('telegram-bot/' . config('services.telegram.bot.route_secret') . '/set-webhook', [TelegramBotController::class, 'setWebhook'])->name('telegram-bot.setWebhook');
Route::post('telegram-bot/' . config('services.telegram.bot.route_secret') . '/webhook', [TelegramBotController::class, 'webhook'])->name('telegram-bot.webhook');
