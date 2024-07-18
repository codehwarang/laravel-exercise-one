<?php

use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Authentication;
use Illuminate\Support\Facades\Route;

Route::name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('main.index');
})->middleware(Authentication::class);
