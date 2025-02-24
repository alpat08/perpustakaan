<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;


Route::get('/', [PublicController::class, 'index'])->name('public');

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::get('/registrasi', [LoginController::class, 'create'])->name('create');
    Route::post('/signup', [LoginController::class, 'store'])->name('store');

    Route::post('/logins', [LoginController::class, 'login'])->name('logins');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dash');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});