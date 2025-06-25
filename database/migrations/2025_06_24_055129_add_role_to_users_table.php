<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        /*
         |--------------------------------------------------------------
         | Ubah kolom role menjadi ENUM
         |--------------------------------------------------------------
         | 1. composer require doctrine/dbal   <-- WAJIB agar method change() bisa dipakai
         | 2. Nilai yang diizinkan: 'admin' atau 'staff'
         | 3. Default tetap 'staff'
         */
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'staff'])
                  ->default('staff')
                  ->after('password')
                  ->change();
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kembalikan ke string(255) bila dibatalkan
            $table->string('role')
                  ->default('staff')
                  ->after('password')
                  ->change();
        });
    }
};
