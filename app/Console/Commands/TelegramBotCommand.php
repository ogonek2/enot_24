<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Api;

class TelegramBotCommand extends Command
{
    protected $signature = 'telegram:bot';

    protected $description = 'Telegram Bot';

    public function handle()
    {
        $telegram = new Api(config('telegram.bot_token'));

        // Получаем обновления (сообщения от пользователей)
        $updates = $telegram->getUpdates();

        foreach ($updates as $update) {
            $message = $update->getMessage();
            $chatId = $message->getChat()->getId();
            $text = $message->getText();

            // Ответ на сообщение
            $telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => 'Вы сказали: ' . $text,
            ]);
        }
    }
}
