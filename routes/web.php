<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DashboardController;

// Route untuk halaman utama (bisa diakses siapa saja)
Route::get('/', [PublicController::class, 'index'])->name('public');

Route::get('/fajar-is-real', [PublicController::class, 'real'])->name('fajar-is-real');

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
    Route::middleware(['role:siswa,guru'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/dashboard/buku', [DashboardController::class, 'buku'])->name('dashbook');
        Route::get('/dashboard/buku/{buku}', [DashboardController::class, 'show'])->name('show');

        Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('/dashboard/profile/edit', [DashboardController::class, 'edit'])->name('profile-edit');
        Route::put('/dashboard/profile/update', [DashboardController::class, 'update'])->name('profile-update');
        Route::get('/dashboard/profile/password', [DashboardController::class, 'password'])->name('password');
        Route::post('/dashboard/profile/password-update', [DashboardController::class, 'update_password'])->name('update-password');
        Route::get('/dashboard/profile/verify', [DashboardController::class, 'verify'])->name('verify');
        Route::post('/dashboard/profile/check-password', [DashboardController::class, 'check'])->name('check-password');
        
        Route::get('/dashboard/{chapter}/show', [ChapterController::class, 'view_isi'])->name('view_isi');
        Route::post('/dashboard/buku/pinjam', [PinjamController::class, 'store'])->name('pinjam');
        Route::post('/dashboard/buku/pinjam/update', [PinjamController::class, 'update'])->name('pinjam-update');
        
        Route::get('/dashboard/pinjaman-buku', [DashboardController::class, 'pinjaman'])->name('siswa-pinjam');
        
        Route::post('/dashboard/pinjaman-buku/kembali', [DashboardController::class, 'kembali'])->name('kembali');

        Route::get('/dashboard/riwayat', [DashboardController::class, 'riwayat'])->name('riwayat');
    });

    // Route khusus admin & guru
    Route::middleware(['role:admin,guru'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/chart-data', [AdminController::class, 'getChartData']);

        Route::get('/admin/peminjaman', [AdminController::class, 'peminjaman'])->name('peminjaman');

        Route::get('/admins/buku/name/{cerita}',[BukuController::class,'chapter'])->name('chapter');
        Route::get('/admins/chapter/buku/{buku}', [ChapterController::class, 'index'])->name('chapters.index');
        Route::get('/admins/{chapter}/show', [ChapterController::class, 'view_chapter'])->name('view_chapter');
        Route::get('/admins/{chapter}/edit', [ChapterController::class, 'edit_chapter'])->name('edit_chapter');
        Route::post('/admins/{chapter}/update', [ChapterController::class, 'update_chapter'])->name('update_chapter');
        Route::delete('admins/{chapter}/delete', [ChapterController::class, 'destroy'])->name('delete_chapter');
        Route::get('/admins/chapter/create/{buku}', [ChapterController::class, 'create'])->name('chapters.create');
        Route::post('/admins/chapter/store/{buku}', [ChapterController::class, 'store'])->name('chapters.store');
        Route::resource('/admins/buku/chapter',ChapterController::class)->except('index','create','store')->names('chapters');
        Route::resource('/admins/user', UserController::class)->names('user');
        // Route::get('/admins/bukus', [BukuController::class,'index'])->name('buku.index');
        Route::resource('/admins/buku', BukuController::class)->names('buku');
        Route::resource('/admins/genre', GenreController::class)->names('genre');
    });
});
