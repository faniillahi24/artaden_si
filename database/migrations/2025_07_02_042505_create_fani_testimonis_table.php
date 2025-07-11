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
        Schema::create('fani_testimonis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             $table->string('nama');
        $table->string('kota')->nullable();
        $table->text('pesan');
        $table->string('foto')->nullable(); // opsional, bisa upload foto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fani_testimonis');
    }
};
