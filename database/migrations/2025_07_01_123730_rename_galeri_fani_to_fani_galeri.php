<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::rename('galeri_fani','fani_galeri');
            //
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('fani_galeri','galeri_fani');
    }
};
