<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\Client\BookController;
use App\Controllers\Client\FavoriteController;
use App\Controllers\Client\HomeController;
use App\Core\Auth;
use App\Core\Route;

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');

Route::fallback(function () {
    return redirect()->route(Auth::check() ? 'client.favorite' : 'client.home');
});

Route::prefix("client")->group(function () {

    Route::prefix("home")->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('client.home');
    });

    Route::prefix("book")->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('client.book');
    });

    Route::prefix("favorite")->group(function () {
        Route::middleware('auth')->get('/', [FavoriteController::class, 'index'])->name('client.favorite');
    });

});
