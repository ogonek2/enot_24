<?php

return [
    'telegram' => [
        'bot' => env('TELEGRAM_BOT_TOKEN'), // Здесь ваш токен бота
    ],

    'webhook' => [
        'url' => env('TELEGRAM_WEBHOOK_URL', 'https://enot-24.com.ua/webhook/telegram'),
    ],
];
