<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Riwayat Transaksi Saya</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Daftar Riwayat Transaksi Kasir</h3>
                    <span class="text-sm text-gray-500">Kasir: {{ auth()->user()->name }}</span>
                </div>
                <p class="text-gray-600 mb-6">
                    Berikut adalah catatan riwayat transaksi penjualan yang telah diproses oleh akun kasir Anda.
                </p>

                <div class="overflow-x-auto border border-gray-200 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-gray-700">No. Nota</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700">Waktu</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700">Total Item</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700">Total Belanja</th>
                                <th class="px-4 py-3 text-center font-medium text-gray-700">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr>
                                <td class="px-4 py-3 font-mono font-medium text-indigo-600">TRX-20260919-001</td>
                                <td class="px-4 py-3 text-gray-600">19 Sep 2026 14:20</td>
                                <td class="px-4 py-3 text-gray-600">3 pcs</td>
                                <td class="px-4 py-3 font-medium text-gray-900">Rp45.000</td>
                                <td class="px-4 py-3 text-center">
                                    <x-badge status="aman">Selesai</x-badge>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-mono font-medium text-indigo-600">TRX-20260919-002</td>
                                <td class="px-4 py-3 text-gray-600">19 Sep 2026 15:05</td>
                                <td class="px-4 py-3 text-gray-600">7 pcs</td>
                                <td class="px-4 py-3 font-medium text-gray-900">Rp112.500</td>
                                <td class="px-4 py-3 text-center">
                                    <x-badge status="aman">Selesai</x-badge>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
