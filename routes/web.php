<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// menu navigasi untuk role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/report/sales', function () {
        return 'Halaman Laporan Penjualan';
    })->name('report.sales');
});

// menu transaksi pos umum
Route::middleware('auth')->group(function () {
    Route::get('/pos', function () {
        return 'Halaman Transaksi Kasir (POS)';
    })->name('pos.index');
});

// menu khusus kasir: riwayat transaksi saya (soal 2)
Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/pos/history', function () {
        return view('pos.history');
    })->name('pos.history');
});
