@extends('layout')
@section('content')

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-pink-600 flex items-center gap-2">
                {{ $month->name }}
            </h1>
            <p class="text-xs md:text-sm text-gray-400">Kelola keuangan dengan mudah</p>
        </div>
        <div class="flex gap-2 w-full md:w-auto">
            <a href="{{ route('dashboard') }}"
                class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2 border border-pink-200 text-pink-500 rounded-xl font-medium hover:bg-pink-50 transition text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Kembali
            </a>
            <button onclick="toggleModal()"
                class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-pink-400 to-rose-400 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-pink-200 transition text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Transaksi
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-pink-50">
            <div class="flex items-center gap-3 mb-1">
                <div class="p-2 bg-green-100 rounded-lg text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                </div>
                <h3 class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Profit</h3>
            </div>
            <p class="text-2xl font-bold text-gray-700">Rp {{ number_format($totalProfit) }}</p>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-pink-50">
            <div class="flex items-center gap-3 mb-1">
                <div class="p-2 bg-blue-100 rounded-lg text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <h3 class="text-gray-400 text-xs font-bold uppercase tracking-wider">Deft (40%)</h3>
            </div>
            <p class="text-2xl font-bold text-blue-500">Rp {{ number_format($totalDeft) }}</p>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-pink-50">
            <div class="flex items-center gap-3 mb-1">
                <div class="p-2 bg-pink-100 rounded-lg text-pink-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </div>
                <h3 class="text-gray-400 text-xs font-bold uppercase tracking-wider">Nabila (60%)</h3>
            </div>
            <p class="text-2xl font-bold text-pink-500">Rp {{ number_format($totalNabila) }}</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-pink-100 overflow-hidden">
        <div class="overflow-x-auto pb-4 md:pb-0">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="bg-pink-50 text-xs uppercase text-pink-500 font-bold tracking-wider">
                    <tr>
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">Aplikasi</th>
                        <th class="p-4">Durasi</th>
                        <th class="p-4">Status (Expired)</th>
                        <th class="p-4 text-right">Modal</th>
                        <th class="p-4 text-right">Jual</th>
                        <th class="p-4 text-right text-green-600">Profit</th>
                        <th class="p-4 text-right text-blue-500">Deft</th>
                        <th class="p-4 text-right text-pink-500">Nabila</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-600 divide-y divide-pink-50">
                    @forelse($month->transactions as $t)
                        <tr class="hover:bg-pink-50/50 transition duration-150">
                            <td class="p-4">{{ \Carbon\Carbon::parse($t->purchase_date)->format('d/m/y') }}</td>
                            <td class="p-4 font-semibold text-gray-700">{{ $t->application }}</td>
                            <td class="p-4">{{ $t->duration_value }} {{ ucfirst($t->duration_unit) }}</td>

                            <td class="p-4">
                                @if ($t->duration_unit == 'lifetime')
                                    <span
                                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Selamanya
                                    </span>
                                @else
                                    <div class="flex flex-col">
                                        <span class="{{ $t->is_warning ? 'text-red-500 font-bold' : '' }}">
                                            {{ $t->expired_at->format('d M Y') }}
                                        </span>
                                        @if ($t->is_warning)
                                            <span
                                                class="flex items-center gap-1 text-[10px] text-red-500 font-bold animate-pulse">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                                EXPIRED
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </td>

                            <td class="p-4 text-right">Rp {{ number_format($t->modal) }}</td>
                            <td class="p-4 text-right">Rp {{ number_format($t->price) }}</td>
                            <td class="p-4 text-right font-bold text-green-600 bg-green-50/30">Rp
                                {{ number_format($t->profit) }}</td>
                            <td class="p-4 text-right text-blue-500">Rp {{ number_format($t->deft_share) }}</td>
                            <td class="p-4 text-right text-pink-500 font-medium bg-pink-50/30">Rp
                                {{ number_format($t->nabila_share) }}</td>
                            <td class="p-4 text-center">
                                <form action="{{ route('trx.delete', $t->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button
                                        class="p-2 text-gray-300 hover:text-red-400 transition rounded-full hover:bg-red-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10"
                                class="p-8 text-center text-gray-400 italic flex flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2 text-gray-300"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Belum ada transaksi di bulan ini
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="transactionModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-pink-900/20 backdrop-blur-sm transition-opacity" onclick="toggleModal()"></div>
        <div
            class="relative bg-white rounded-3xl shadow-2xl w-[95%] max-w-lg mx-auto mt-10 md:mt-20 p-6 md:p-8 animate-fade-in-down border border-pink-100 overflow-y-auto max-h-[90vh]">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Tambah Transaksi</h3>
                <button onclick="toggleModal()" class="text-gray-400 hover:text-pink-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('trx.store', $month->id) }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase ml-1">Tanggal</label>
                        <input type="date" name="purchase_date"
                            class="w-full bg-gray-50 border border-gray-200 p-3 rounded-xl focus:ring-pink-400 focus:border-pink-400 outline-none text-sm"
                            required>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase ml-1">Aplikasi</label>
                        <input type="text" name="application" placeholder="Netflix, Spotify..."
                            class="w-full bg-gray-50 border border-gray-200 p-3 rounded-xl focus:ring-pink-400 focus:border-pink-400 outline-none text-sm"
                            required>
                    </div>
                </div>

                <div>
                    <label class="text-xs font-bold text-gray-500 uppercase ml-1">Durasi</label>
                    <div class="flex gap-2">
                        <input type="number" name="duration_value" placeholder="1"
                            class="w-1/3 bg-gray-50 border border-gray-200 p-3 rounded-xl outline-none text-sm" required>
                        <select name="duration_unit"
                            class="w-2/3 bg-gray-50 border border-gray-200 p-3 rounded-xl outline-none text-sm">
                            <option value="bulan">Bulan</option>
                            <option value="hari">Hari</option>
                            <option value="jam">Jam</option>
                            <option value="lifetime">Lifetime</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase ml-1">Modal</label>
                        <input type="number" name="modal" placeholder="0"
                            class="w-full bg-gray-50 border border-gray-200 p-3 rounded-xl focus:ring-pink-400 focus:border-pink-400 outline-none text-sm"
                            required>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase ml-1">Harga Jual</label>
                        <input type="number" name="price" placeholder="0"
                            class="w-full bg-gray-50 border border-gray-200 p-3 rounded-xl focus:ring-pink-400 focus:border-pink-400 outline-none text-sm"
                            required>
                    </div>
                </div>

                <div class="mt-4 flex gap-3">
                    <button type="button" onclick="toggleModal()"
                        class="flex-1 px-4 py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 text-sm">Batal</button>
                    <button type="submit"
                        class="flex-1 px-4 py-3 bg-gradient-to-r from-pink-400 to-rose-400 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-pink-200 text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById('transactionModal');
            modal.classList.toggle('hidden');
        }
    </script>

@endsection
