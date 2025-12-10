@extends('layout')
@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-6 text-center md:text-left">
            <h2 class="text-2xl font-bold text-gray-700">Daftar Bulan</h2>
            <p class="text-gray-400 text-sm">Pilih bulan untuk melihat transaksi</p>
        </div>

        <div class="bg-white p-2 rounded-2xl shadow-sm border border-pink-100 mb-8 flex items-center p-2">
            <form action="{{ route('months.store') }}" method="POST" class="flex w-full gap-2">
                @csrf
                <input type="text" name="name" placeholder="Nama Bulan (cth: Desember 2025)"
                    class="flex-1 bg-transparent border-none text-sm px-4 focus:ring-0 outline-none text-gray-600 placeholder-gray-300"
                    required>
                <button
                    class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-xl font-semibold text-sm transition shadow-md shadow-pink-200 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Buat
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($months as $m)
                <div
                    class="group bg-white p-5 rounded-2xl shadow-sm hover:shadow-md hover:shadow-pink-100 border border-transparent hover:border-pink-200 transition duration-300 relative">

                    <a href="{{ route('months.show', $m->id) }}" class="block">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-pink-50 text-pink-500 p-2.5 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-700 group-hover:text-pink-500 transition">{{ $m->name }}
                            </h3>
                        </div>
                        <p class="text-xs text-gray-400 pl-14">Klik untuk detail</p>
                    </a>

                    <form action="{{ route('months.delete', $m->id) }}" method="POST"
                        onsubmit="return confirm('Hapus bulan ini?')" class="absolute top-5 right-5">
                        @csrf @method('DELETE')
                        <button class="text-gray-300 hover:text-red-400 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
