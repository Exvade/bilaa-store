<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    // Tambahkan baris ini agar kolom 'name' bisa diisi
    protected $fillable = ['name'];

    // Relasi ke transaksi (agar bisa dipanggil di controller nanti)
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
