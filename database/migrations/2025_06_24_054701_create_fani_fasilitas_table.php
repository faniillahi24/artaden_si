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
        Schema::create('fani_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable(); // Simpan path gambar
            $table->integer('harga')->nullable(); // Harga jika bisa disewa (tipe sewa)
            $table->enum('tipe_fasilitas', ['umum', 'sewa']); // 'umum' = fasilitas publik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fani_fasilitas');
    }
};
