<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard POS Barokah Mart</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Ringkasan Hari Ini</h3>
                        <p class="text-gray-600 mt-1">Selamat datang kembali, <span class="font-medium text-gray-900">{{ auth()->user()->name }}</span>. Anda login dengan hak akses <span class="font-semibold text-indigo-600 uppercase">{{ auth()->user()->role }}</span>.</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-xs text-gray-500 font-medium">Status Komponen Badge:</span>
                        <x-badge status="aman" />
                        <x-badge status="menipis" />
                        <x-badge status="habis" />
                    </div>
                </div>
            </x-card>

            {{-- Kartu Monitoring Status Stok Produk menggunakan x-badge --}}
            <x-card>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Status Stok Produk (Komponen x-badge)</h3>
                        <p class="text-sm text-gray-500">Label indikator status stok barang di gudang dan etalase toko.</p>
                    </div>
                    <span class="text-xs bg-gray-100 text-gray-600 px-2.5 py-1 rounded">Live Inventory</span>
                </div>

                <div class="overflow-x-auto border border-gray-200 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-gray-700">Kode</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700">Nama Produk</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700">Kategori</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700">Harga Satuan</th>
                                <th class="px-4 py-3 text-center font-medium text-gray-700">Jumlah Stok</th>
                                <th class="px-4 py-3 text-center font-medium text-gray-700">Status Stok</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr>
                                <td class="px-4 py-3 font-mono text-gray-600">BRG-001</td>
                                <td class="px-4 py-3 font-medium text-gray-900">Beras Rojolele 5kg</td>
                                <td class="px-4 py-3 text-gray-600">Sembako</td>
                                <td class="px-4 py-3 text-gray-700">Rp72.500</td>
                                <td class="px-4 py-3 text-center font-medium text-gray-800">48 pcs</td>
                                <td class="px-4 py-3 text-center">
                                    <x-badge status="aman" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-mono text-gray-600">BRG-002</td>
                                <td class="px-4 py-3 font-medium text-gray-900">Minyak Goreng Sawit 2L</td>
                                <td class="px-4 py-3 text-gray-600">Sembako</td>
                                <td class="px-4 py-3 text-gray-700">Rp34.000</td>
                                <td class="px-4 py-3 text-center font-medium text-gray-800">5 pcs</td>
                                <td class="px-4 py-3 text-center">
                                    <x-badge status="menipis" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-mono text-gray-600">BRG-003</td>
                                <td class="px-4 py-3 font-medium text-gray-900">Gula Pasir Kristal 1kg</td>
                                <td class="px-4 py-3 text-gray-600">Sembako</td>
                                <td class="px-4 py-3 text-gray-700">Rp17.500</td>
                                <td class="px-4 py-3 text-center font-medium text-gray-800">0 pcs</td>
                                <td class="px-4 py-3 text-center">
                                    <x-badge status="habis" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-mono text-gray-600">BRG-004</td>
                                <td class="px-4 py-3 font-medium text-gray-900">Teh Celup Melati (Isi 25)</td>
                                <td class="px-4 py-3 text-gray-600">Minuman</td>
                                <td class="px-4 py-3 text-gray-700">Rp6.500</td>
                                <td class="px-4 py-3 text-center font-medium text-gray-800">32 pcs</td>
                                <td class="px-4 py-3 text-center">
                                    <x-badge status="aman" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-mono text-gray-600">BRG-005</td>
                                <td class="px-4 py-3 font-medium text-gray-900">Kopi Bubuk Arabika 200g</td>
                                <td class="px-4 py-3 text-gray-600">Minuman</td>
                                <td class="px-4 py-3 text-gray-700">Rp24.000</td>
                                <td class="px-4 py-3 text-center font-medium text-gray-800">3 pcs</td>
                                <td class="px-4 py-3 text-center">
                                    <x-badge status="menipis" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
