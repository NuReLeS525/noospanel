<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
//    public function index() {
//        return Currency::get();
//
////        return DB::table('currencies')->get();
//    }

    // Метод отображения списка валютных пар
    public function index()
    {
        $pairs = Currency::all();
        return view('index', compact('pairs'));
    }

    public function show(Currency $currency) {
        return $currency;
    }



    public function updateCurrencyPairs()
    {
        $apiKey = env('STOCK_API_KEY'); // Ключ API из .env
        $pairs = Currency::all();  // Получаем все валютные пары из базы

        foreach ($pairs as $pair) {
            // Формируем запрос к API
            $response = Http::get('https://www.alphavantage.co/query', [
                'function' => 'CURRENCY_EXCHANGE_RATE',
                'from_currency' => $pair->from_currency,
                'to_currency' => $pair->to_currency,
                'apikey' => $apiKey,
            ]);

            // Парсим JSON-ответ
            $data = $response->json();
            $rate = $data['Realtime Currency Exchange Rate']['5. Exchange Rate'] ?? null;

            // Обновляем данные в базе
            if ($rate) {
                $pair->update([
                    'price' => $rate,
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('currency_pairs.index')->with('success', 'Цены обновлены.');
    }

    public function getExchangeRates()
    {
        $apiKey = env('ALPHA_VANTAGE_API_KEY');

        // Список валютных пар
        $currencyPairs = [
            ['from_currency' => 'BTC', 'to_currency' => 'USD'],
            ['from_currency' => 'ETH', 'to_currency' => 'USD'],
            ['from_currency' => 'USD', 'to_currency' => 'EUR'],
            ['from_currency' => 'GBP', 'to_currency' => 'USD'],
            // добавьте остальные валютные пары по мере необходимости
        ];

        $rates = [];

        foreach ($currencyPairs as $pair) {
            // Выполнение запроса к API
            $response = Http::get('https://www.alphavantage.co/query', [
                'function' => 'CURRENCY_EXCHANGE_RATE',
                'from_currency' => $pair['from_currency'],
                'to_currency' => $pair['to_currency'],
                'apikey' => $apiKey,
            ]);

            if ($response->successful()) {
                // Извлекаем курс обмена
                $rate = $response->json()['Realtime Currency Exchange Rate']['5. Exchange Rate'] ?? null;
                if ($rate) {
                    $rates[] = [
                        'pair' => "{$pair['from_currency']}/{$pair['to_currency']}",
                        'rate' => $rate,
                    ];
                }
            }
        }

        return view('currency_rates.index', compact('rates'));
    }

    public function pagination() {
        $currencies = Currency::paginate(2);
        return view('index', compact('currencies'));
    }
}
