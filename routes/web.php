<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicController;


Route::get('/', [PublicController::class, 'index'])->name('public');

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/registrasi', [LoginController::class, 'create'])->name('create');
    Route::post('/store', [LoginController::class, 'store'])->name('store');

});