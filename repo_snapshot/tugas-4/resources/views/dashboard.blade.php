<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - POS Barokah Mart</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-6">
            <span class="text-xl font-bold text-indigo-600">POS Barokah Mart</span>
            <a href="{{ route('dashboard') }}" class="text-indigo-600 font-semibold text-sm">Dashboard</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Kelola Kasir</a>
                <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Data Kategori</a>
            @endif
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-700 font-medium">{{ auth()->user()->name }} (Role: {{ auth()->user()->role }})</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm text-red-600 hover:underline">Keluar</button>
            </form>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto p-6 mt-6">
        <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p class="text-gray-600 mt-2">
                Anda login dengan hak akses sebagai 
                <span class="font-semibold text-indigo-600 uppercase">{{ auth()->user()->role }}</span>.
            </p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('users.index') }}" class="block p-5 rounded-lg border border-gray-200 hover:border-indigo-500 hover:shadow-sm transition">
                        <h3 class="text-lg font-semibold text-gray-800">Manajemen Akun Kasir</h3>
                        <p class="text-sm text-gray-500 mt-1">Tambah, perbarui, dan hapus akun kasir operasional.</p>
                    </a>
                    <a href="{{ route('categories.index') }}" class="block p-5 rounded-lg border border-gray-200 hover:border-indigo-500 hover:shadow-sm transition">
                        <h3 class="text-lg font-semibold text-gray-800">Master Data Kategori</h3>
                        <p class="text-sm text-gray-500 mt-1">Kelola data kategori produk untuk inventaris toko.</p>
                    </a>
                @else
                    <div class="p-5 rounded-lg border border-gray-200 bg-gray-50 md:col-span-2">
                        <h3 class="text-lg font-semibold text-gray-800">Panel Operasional Kasir</h3>
                        <p class="text-sm text-gray-600 mt-1">
                            Akun kasir berwenang mencatat transaksi kasir harian. Anda tidak memiliki izin untuk mengelola master data seperti kategori, produk, dan manajemen pengguna.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
