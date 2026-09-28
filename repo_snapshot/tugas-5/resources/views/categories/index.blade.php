<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori - POS Barokah Mart</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-6">
            <span class="text-xl font-bold text-indigo-600">POS Barokah Mart</span>
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Dashboard</a>
            <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Kelola Kasir</a>
            <a href="{{ route('categories.index') }}" class="text-indigo-600 font-semibold text-sm">Data Kategori</a>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-700 font-medium">{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm text-red-600 hover:underline">Keluar</button>
            </form>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Master Kategori Barang</h1>
                <p class="text-gray-600 text-sm">Daftar kategori produk yang hanya dapat diakses oleh Admin.</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <th class="py-3 px-6">No</th>
                        <th class="py-3 px-6">Nama Kategori</th>
                        <th class="py-3 px-6">Deskripsi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm">
                    @forelse ($categories as $index => $category)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-6 font-medium text-gray-900">{{ $index + 1 }}</td>
                            <td class="py-3 px-6 text-gray-800">{{ $category->name }}</td>
                            <td class="py-3 px-6 text-gray-500">{{ $category->description ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-4 px-6 text-center text-gray-500">Belum ada data kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
