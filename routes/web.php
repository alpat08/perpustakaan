<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;

// Route untuk halaman utama (bisa diakses siapa saja)
Route::get('/', [PublicController::class, 'index'])->name('public');

// Route untuk pengguna yang belum login (guest)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');

    Route::get('/registrasi', [LoginController::class, 'create'])->name('registrasi.create');
    Route::post('/registrasi', [LoginController::class, 'store'])->name('registrasi.store');
});

// Route untuk pengguna yang sudah login (auth)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Route khusus siswa
    Route::middleware(['role:siswa'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/dashboard/buku', [DashboardController::class, 'buku'])->name('dashbook');
        Route::get('/dashboard/buku/{buku}', [DashboardController::class, 'show'])->name('show');

        Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('/dashboard/profile/edit', [DashboardController::class, 'edit'])->name('profile-edit');
        Route::get('/dashboard/profile/update', [DashboardController::class, 'update'])->name('profile-update');
        Route::get('/dashboard/profile/password', [DashboardController::class, 'password'])->name('password');
        Route::post('/dashboard/profile/password-update', [DashboardController::class, 'update_password'])->name('update-password');
        Route::get('/dashboard/profile/verify', [DashboardController::class, 'verify'])->name('verify');
        Route::post('/dashboard/profile/check-password', [DashboardController::class, 'check'])->name('check-password');
    });

    // Route khusus admin & guru
    Route::middleware(['role:admin,guru'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::resource('/admins/user', UserController::class)->names('user');
        Route::resource('/admins/buku', BukuController::class)->names('buku');
        Route::resource('/admins/genre', GenreController::class)->names('genre');
    });
});
