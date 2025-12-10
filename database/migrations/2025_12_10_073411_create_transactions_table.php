<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('month_id')->constrained()->onDelete('cascade');
            $table->date('purchase_date'); // Tanggal Beli
            $table->string('application'); // Nama Aplikasi
            $table->integer('duration_value'); // Angka durasi (misal: 1)
            $table->string('duration_unit'); // Satuan (bulan, hari, jam, lifetime)
            $table->decimal('modal', 15, 0); // Modal
            $table->decimal('price', 15, 0); // Harga Jual
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
