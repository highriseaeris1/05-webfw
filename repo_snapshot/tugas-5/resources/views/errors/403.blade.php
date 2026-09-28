<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Dibatasi | POS Barokah Mart</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-md border border-gray-200 max-w-lg w-full p-8 text-center">
        <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-5">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>

        <div class="inline-block px-3 py-1 bg-red-50 text-red-700 text-xs font-semibold rounded-full uppercase tracking-wider mb-3">
            Peringatan Otorisasi (403 Forbidden)
        </div>

        <h1 class="text-2xl font-bold text-gray-900 mb-2">Akses Halaman Dibatasi</h1>
        <p class="text-gray-600 text-sm mb-6 leading-relaxed">
            Maaf, akun Anda tidak memiliki wewenang untuk membuka halaman ini. Rute ini hanya diperuntukkan bagi pengguna dengan tingkatan peran administratif.
        </p>

        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6 text-left text-xs space-y-2">
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Peran Anda:</span>
                <span class="font-semibold text-gray-800 uppercase">{{ $userRole ?? auth()->user()?->role ?? 'Tamu' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Peran yang Diizinkan:</span>
                <span class="font-semibold text-indigo-600 uppercase">{{ isset($requiredRoles) ? implode(', ', $requiredRoles) : 'admin' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 font-medium">Sistem:</span>
                <span class="text-gray-700">POS Barokah Mart - Role Guard</span>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('dashboard') }}"
                class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition shadow-sm">
                Kembali ke Dashboard
            </a>
            <button onclick="window.history.back()"
                class="px-5 py-2.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition">
                Halaman Sebelumnya
            </button>
        </div>
    </div>
</body>
</html>
