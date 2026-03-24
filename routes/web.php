<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\Client\BookController;
use App\Controllers\Client\FavoriteController;
use App\Controllers\Client\HomeController;
use App\Controllers\Client\FinishedController;

use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\BookController as AdminBookController;
use App\Controllers\Admin\SaveBookController;
use App\Controllers\Admin\FinishedController as AdminFinishedController;
use App\Controllers\Admin\SettingsController;

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
        Route::get('/', [FavoriteController::class, 'index'])->name('client.favorite');
    });

    Route::prefix("finished")->group(function () {
        Route::get('/', [FinishedController::class, 'index'])->name('client.finished');
    });
});

Route::prefix("admin")->group(function () {
    Route::prefix("dashboard")->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    });

    Route::prefix("book")->group(function () {
        Route::get('/', [AdminBookController::class, 'index'])->name('admin.book');
        Route::get('/create', [AdminBookController::class, 'create'])->name('admin.book.create');
        Route::get('/edit/{id}', [AdminBookController::class, 'edit'])->name('admin.book.edit');
        Route::post('/store/{id}', [AdminBookController::class, 'store'])->name('admin.book.store');
        Route::put('/update/{id}', [AdminBookController::class, 'update'])->name('admin.book.update');
        Route::delete('/delete/{id}', [AdminBookController::class, 'delete'])->name('admin.book.delete');
    });

    Route::prefix("saveBook")->group(function () {
        Route::get('/', [SaveBookController::class, 'index'])->name('admin.saveBook');
        Route::get('/book/{id}', [SaveBookController::class, 'saveBookShow'])->name('admin.saveBook.show');
        Route::put('/update/{id}', [SaveBookController::class, 'update'])->name('admin.saveBook.update');
    });

    Route::prefix("finished")->group(function () {
        Route::get('/', [AdminFinishedController::class, 'index'])->name('admin.finished');
        Route::get('/book/{id}', [AdminFinishedController::class, 'finishedShow'])->name('admin.finished.show');
    });

    Route::prefix("settings")->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('admin.settings');
    });
});
