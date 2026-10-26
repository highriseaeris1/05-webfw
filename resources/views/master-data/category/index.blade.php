<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Master Kategori</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Daftar Kategori Produk</h3>
                        <p class="text-sm text-gray-500">Daftar kategori produk yang hanya dapat diakses oleh Admin.</p>
                    </div>
                    <a href="{{ route('categories.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-md">+ Tambah Kategori</a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-emerald-100 border border-emerald-300 text-emerald-800 rounded-md text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto border border-gray-200 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left font-medium text-gray-700">No</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-700">Nama Kategori</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-700">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse ($categories as $index => $category)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-3 text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-3 font-medium text-gray-900">{{ $category->name }}</td>
                                    <td class="px-6 py-3 text-gray-500">{{ $category->description ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-6 text-center text-gray-500">Belum ada data kategori.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
