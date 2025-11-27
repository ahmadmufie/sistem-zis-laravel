<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Halaman awal diredirect ke login saja
Route::get('/', function () {
    return redirect('/login');
});

// Jalur untuk Tamu (Guest) - belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

// Jalur untuk Member (Auth) - sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::resource('muzakki', \App\Http\Controllers\MuzakkiController::class);
    Route::resource('mustahiq', \App\Http\Controllers\MustahiqController::class);
    Route::resource('transaksi', \App\Http\Controllers\TransaksiController::class);
    Route::resource('penyaluran', \App\Http\Controllers\PenyaluranController::class);
    Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::resource('user', \App\Http\Controllers\UserController::class);
});
