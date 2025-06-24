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
        Schema::create('fani_reservasi_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservasi_id')
                  ->constrained('fani_reservasis')
                  ->onDelete('cascade');
            $table->foreignId('fasilitas_id')
                  ->constrained('fani_fasilitas')
                  ->onDelete('cascade');
            $table->integer('jumlah')->default(1);
            $table->integer('subtotal')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fani_reservasi_fasilitas');
    }
};
