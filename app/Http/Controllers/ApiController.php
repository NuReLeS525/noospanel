<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getExchangeRate($fromCurrency, $toCurrency)
    {
        $apiKey = env('STOCK_API_KEY'); // Ваш ключ API

        // Выполняем HTTP-запрос
        $response = Http::get('https://www.alphavantage.co/query', [
            'function' => 'CURRENCY_EXCHANGE_RATE',
            'from_currency' => $fromCurrency,
            'to_currency' => $toCurrency,
            'apikey' => $apiKey,
        ]);

        // Проверяем статус запроса
        if ($response->successful()) {
            $data = $response->json();

            // Извлекаем курс из ответа
            $rate = $data['Realtime Currency Exchange Rate']['5. Exchange Rate'] ?? null;

            if ($rate) {
                return response()->json([
                    'from_currency' => $fromCurrency,
                    'to_currency' => $toCurrency,
                    'exchange_rate' => $rate,
                ]);
            } else {
                return response()->json([
                    'error' => 'Exchange rate not found',
                ], 404);
            }
        } else {
            return response()->json([
                'error' => 'Failed to fetch data from API',
            ], $response->status());
        }
    }
}
