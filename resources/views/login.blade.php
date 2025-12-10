@extends('layout')
@section('content')
    <div class="min-h-[80vh] flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-pink-100 w-full max-w-sm border border-pink-100">
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-pink-500">Welcome Back! 🎀</h1>
                <p class="text-gray-400 text-sm mt-2">Masuk untuk kelola bisnis kamu</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1 ml-1">Username</label>
                    <input type="text" name="username"
                        class="w-full bg-pink-50 border border-pink-100 text-gray-700 text-sm rounded-xl focus:ring-pink-400 focus:border-pink-400 block p-3 outline-none transition"
                        placeholder="Username kamu" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1 ml-1">Password</label>
                    <input type="password" name="password"
                        class="w-full bg-pink-50 border border-pink-100 text-gray-700 text-sm rounded-xl focus:ring-pink-400 focus:border-pink-400 block p-3 outline-none transition"
                        placeholder="••••••••" required>
                </div>

                <button
                    class="w-full text-white bg-gradient-to-r from-pink-400 to-rose-400 hover:from-pink-500 hover:to-rose-500 font-bold rounded-xl text-sm px-5 py-3 text-center shadow-md shadow-pink-200 transition transform active:scale-95 mt-4">
                    Masuk Sekarang
                </button>
            </form>

            @if ($errors->any())
                <div class="mt-4 p-3 bg-red-50 text-red-500 text-xs rounded-xl text-center border border-red-100">
                    {{ $errors->first() }}
                </div>
            @endif
        </div>
    </div>
@endsection
