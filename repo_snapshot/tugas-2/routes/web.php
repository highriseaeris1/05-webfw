<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Rute /about dengan Closure sederhana menampilkan teks profil toko tanpa Controller
Route::get('/about', function () {
    return 'POS Barokah Mart adalah sistem kasir dan manajemen ritel modern yang melayani penjualan kebutuhan sembako, makanan ringan, minuman, dan kebutuhan rumah tangga dengan pelayanan yang cepat, transparan, dan terpercaya. Toko kami beroperasi setiap hari mulai pukul 07.00 sampai 22.00 WIB di Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang. Untuk informasi kemitraan, pengadaan barang, atau layanan pelanggan, silakan hubungi kami melalui telepon di (0267) 8451234 atau email kontak@barokahmart.id.';
});

// Peta rute tambahan pengelolaan data supplier mitra toko (khusus role:admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('suppliers', SupplierController::class);
});


