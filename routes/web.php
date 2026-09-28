<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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

// Menu navigasi untuk role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/products', function () {
        return 'Halaman Master Produk';
    })->name('products.index');
    Route::get('/report/sales', function () {
        return 'Halaman Laporan Penjualan';
    })->name('report.sales');
});

// Menu transaksi POS umum
Route::middleware('auth')->group(function () {
    Route::get('/pos', function () {
        return 'Halaman Transaksi Kasir (POS)';
    })->name('pos.index');
});

// Menu khusus kasir: Riwayat Transaksi Saya (Soal 2)
Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/pos/history', function () {
        return view('pos.history');
    })->name('pos.history');
});
