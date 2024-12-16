<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', [HomeController::class, 'index'])->name('home'); хз что делает, но вроде включает аутентификацию

Route::get('/', [AppController::class, 'index'])->name('app.index');
// при открытии / срабатывает AppController
// внутри него есть функция index, а она показывает файл index.blade.php

Route::get('/profile', [UserController::class, 'index'])->name('app.profile');
// name('app.profile') это оказывается для создания route('app.profile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::view('/forgot-password', 'auth.passwords.email')->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'passwordEmail'])->name('password.email');

    Route::get('/reset-password/{token}',
        [ForgotPasswordController::class, 'passwordReset'])->name('password.reset');

    Route::post('/reset-password', [ForgotPasswordController::class, 'passwordUpdate'])->name('password.update');
});

//Route::get('/currencies', function () {
//
//
//
//});

Route::get('/', [CurrencyController::class, 'index'])->name('currencies.index');
//Route::get('/', [CurrencyController::class, 'getExchangeRates']);
Route::get('/', [CurrencyController::class, 'pagination'])->name('currencies.pagination');
