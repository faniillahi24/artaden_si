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
        Schema::create('fani_reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengunjung');
            $table->string('email');
            $table->string('no_hp');
            $table->date('tanggal_kunjungan');
            $table->integer('jumlah_orang')->unsigned();
            $table->integer('total_biaya')->default(0);
            $table->enum('status', ['pending', 'disetujui', 'ditolak', 'selesai'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fani_reservasis');
    }
};
