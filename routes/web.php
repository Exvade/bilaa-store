<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;

// Route Tamu (Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [BusinessController::class, 'loginForm'])->name('login');
    Route::post('/login', [BusinessController::class, 'login']);
});

// Route Admin (Harus Login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [BusinessController::class, 'logout'])->name('logout');

    Route::get('/', [BusinessController::class, 'index'])->name('dashboard');
    Route::post('/months', [BusinessController::class, 'storeMonth'])->name('months.store');
    Route::delete('/months/{id}', [BusinessController::class, 'destroyMonth'])->name('months.delete');

    Route::get('/months/{id}', [BusinessController::class, 'show'])->name('months.show');
    Route::post('/months/{id}/transaction', [BusinessController::class, 'storeTransaction'])->name('trx.store');
    Route::delete('/transaction/{id}', [BusinessController::class, 'destroyTransaction'])->name('trx.delete');
});
