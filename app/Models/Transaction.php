<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{
    protected $guarded = [];

    // Relasi ke Bulan
    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    // 1. Hitung Tanggal Kadaluarsa
    public function getExpiredAtAttribute()
    {
        $date = Carbon::parse($this->purchase_date);

        if ($this->duration_unit == 'lifetime') return null;
        if ($this->duration_unit == 'jam') return $date->addHours($this->duration_value);
        if ($this->duration_unit == 'hari') return $date->addDays($this->duration_value);
        if ($this->duration_unit == 'bulan') return $date->addMonths($this->duration_value);

        return $date;
    }

    // 2. Logic Warning (Jika sisa <= 5 hari)
    public function getIsWarningAttribute()
    {
        if ($this->duration_unit == 'lifetime') return false;

        $expired = $this->expired_at;
        $now = Carbon::now();

        // Jika belum expired TAPI sisa hari <= 5
        return $now->lte($expired) && $now->diffInDays($expired) <= 5;
    }

    // 3. Hitung Keuntungan
    public function getProfitAttribute()
    {
        return $this->price - $this->modal;
    }

    // 4. Pembagian Hasil
    public function getDeftShareAttribute()
    {
        return $this->profit * 0.40;
    } // 40%
    public function getNabilaShareAttribute()
    {
        return $this->profit * 0.60;
    } // 60%
}
