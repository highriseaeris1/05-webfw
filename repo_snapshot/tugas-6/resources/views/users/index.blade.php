<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Akun Kasir - POS Barokah Mart</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-6">
            <span class="text-xl font-bold text-indigo-600">POS Barokah Mart</span>
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Dashboard</a>
            <a href="{{ route('users.index') }}" class="text-indigo-600 font-semibold text-sm">Kelola Kasir</a>
            <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Data Kategori</a>
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
                <h1 class="text-2xl font-bold text-gray-800">Manajemen Akun Kasir</h1>
                <p class="text-gray-600 text-sm">Rute khusus administrator untuk mengelola hak akses kasir POS Barokah Mart.</p>
            </div>
            <a href="{{ route('users.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-sm transition">
                + Tambah Kasir Baru
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-emerald-100 border border-emerald-300 text-emerald-800 rounded-md text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <th class="py-3 px-6">Nama Kasir</th>
                        <th class="py-3 px-6">Email</th>
                        <th class="py-3 px-6">Role</th>
                        <th class="py-3 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-6 font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="py-3 px-6 text-gray-600">{{ $user->email }}</td>
                            <td class="py-3 px-6">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-right space-x-2">
                                <a href="{{ route('users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kasir ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-6 px-6 text-center text-gray-500">Belum ada akun kasir terdaftar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
