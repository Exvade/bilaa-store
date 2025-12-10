<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    // --- AUTH MANUAL ---
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['username' => 'Login gagal!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // --- LOGIC BISNIS ---

    // Halaman Dashboard (List Bulan)
    public function index()
    {
        $months = Month::orderBy('id', 'desc')->get();
        return view('dashboard', compact('months'));
    }

    public function storeMonth(Request $request)
    {
        Month::create(['name' => $request->name]);
        return back();
    }

    public function destroyMonth($id)
    {
        Month::destroy($id);
        return back();
    }

    // Halaman Detail Transaksi
    public function show($id)
    {
        $month = Month::with('transactions')->findOrFail($id);

        // Hitung Total Keuntungan (karena ini appended attribute, kita sum pakai closure)
        $totalDeft = $month->transactions->sum(fn($t) => $t->deft_share);
        $totalNabila = $month->transactions->sum(fn($t) => $t->nabila_share);
        $totalProfit = $month->transactions->sum(fn($t) => $t->profit);

        return view('detail', compact('month', 'totalDeft', 'totalNabila', 'totalProfit'));
    }

    public function storeTransaction(Request $request, $month_id)
    {
        Transaction::create([
            'month_id' => $month_id,
            'purchase_date' => $request->purchase_date,
            'application' => $request->application,
            'duration_value' => $request->duration_value,
            'duration_unit' => $request->duration_unit,
            'modal' => $request->modal,
            'price' => $request->price,
        ]);
        return back();
    }

    public function destroyTransaction($id)
    {
        Transaction::destroy($id);
        return back();
    }
}
