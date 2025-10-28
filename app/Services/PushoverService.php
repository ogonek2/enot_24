<?php

namespace App\Services;

use GuzzleHttp\Client;

class PushoverService
{
    // Метод для отправки уведомления
    public function sendNotification(object $formData): void
    {
        $pushoverUserKey = 'u4bg4h85bhvqmzkhzfu7rrm7qwfr7h';
        $pushoverApiToken = 'a5zqyqdcy3jc6e2o321p6r2kk2o7qd';

        // Проверка, что токены существуют
        if (!$pushoverUserKey || !$pushoverApiToken) {
            throw new \Exception("Pushover API token or user key is not set.");
        }

        // Подготовка сообщения (можно кастомизировать в зависимости от параметров формы)
        $message = $this->buildMessage($formData);

        // Отправка запроса на Pushover
        $client = new Client();

        try {
            $response = $client->post('https://api.pushover.net/1/messages.json', [
                'form_params' => [
                    "token" => $pushoverApiToken,
                    "user" => $pushoverUserKey,
                    "title" => "Нове замовлення \ Перейдіть за повідомленням!",
                    "message" => $message,
                ]
            ]);

            // Обработка ошибки, если она произошла
            if ($response->getStatusCode() !== 200) {
                throw new \Exception("Failed to send Pushover notification. Status code: " . $response->getStatusCode());
            }

            $responseBody = json_decode($response->getBody()->getContents(), true);

            // Если ответ от Pushover содержит ошибку
            if ($responseBody['status'] != 1) {
                throw new \Exception("Error from Pushover: " . implode(", ", $responseBody['errors']));
            }

        } catch (\Exception $e) {
            // Ловим исключения и выбрасываем их с описанием
            throw new \Exception("Failed to send Pushover notification: " . $e->getMessage());
        }
    }

    // Метод для построения сообщения в зависимости от данных формы
    private function buildMessage(object $formData): string
    {
        // Пример: можно обрабатывать данные в зависимости от типа формы
        // Это просто пример, ты можешь настроить логику под себя
        $message = "Повідомлення:\n\n";
        
        foreach ($formData as $key => $value) {
            $message .= ucfirst($key) . ": " . $value . "\n";
        }

        return $message;
    }
}
