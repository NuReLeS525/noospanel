<?php

use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/currencies', [CurrencyController::class, 'index']);

Route::get('currencies/{currency}', [CurrencyController::class, 'show']);

Route::get('/exchange-rate/{from}/{to}', [ApiController::class, 'getExchangeRate']);
