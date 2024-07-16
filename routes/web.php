<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\DashboardController;

Route::resource('jobs', JobController::class);
Route::resource('marketings', MarketingController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
