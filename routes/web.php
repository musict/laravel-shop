<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThumbnailController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/storage/images/{dir}/{method}/{size}/{file}', ThumbnailController::class)
    ->where('method', 'resize|crop|fit')
    ->where('size', '\d+x\d+')
    ->where('file', '.+\.(png|jpg|gif|bmp|jpeg)$')
    ->name('thumbnail');

Route::controller(AuthController::class)->group(function (){

    Route::middleware('guest')->group(function (){

        Route::get('/login', 'loginPage')->name('loginPage');
        Route::post('/login', 'loginHandler')->name('loginHandler');

        Route::get('/register', 'registerPage')->name('registerPage');
        Route::post('/register', 'registerHandler')->name('registerHandler');
        Route::get('/forgot-password', 'forgotPasswordPage')->name('forgotPasswordPage');

        Route::post('/forgot-password', 'forgotPasswordHandler')->name('forgotPasswordHandler');

        Route::get('/reset-password/{token}', 'resetPasswordPage')->name('resetPasswordPage');

        Route::post('/reset-password', 'resetPasswordHandler')->name('resetPasswordHandler');
    });


    Route::delete('/logout', 'logout')->name('logout')->middleware('auth');
});
