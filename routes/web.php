<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\Authentication;
use Illuminate\Support\Facades\Route;

Route::middleware([Authentication::class])->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('main.index');

    Route::name('product.')->prefix('product')->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
    });
});
