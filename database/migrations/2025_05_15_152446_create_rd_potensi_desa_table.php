<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdPotensiDesaTable extends Migration
{
    public function up(): void
    {
        Schema::create('rd_potensi_desa', function (Blueprint $table) {
            $table->id();
            $table->string('dusun');
            $table->integer('posyandu')->default(0);

            // Sekolah
            $table->integer('tk_ra')->default(0);
            $table->integer('sd')->default(0);
            $table->integer('smp_sederajat')->default(0);
            $table->integer('sma')->default(0);
            $table->integer('pkbm')->default(0);

            // Fasilitas
            $table->integer('fasilitas_olahraga')->default(0);
            $table->integer('fasilitas_kesehatan')->default(0);
            $table->integer('fasilitas_ibadah')->default(0);
            $table->integer('pasar')->default(0);

            // Poktan
            $table->integer('bkb')->default(0);
            $table->integer('bkr')->default(0);
            $table->integer('bkl')->default(0);
            $table->integer('uppka')->default(0);
            $table->integer('pik_r')->default(0);

            // Lain-lain
            $table->integer('stunting_gizi_buruk')->default(0);
            $table->integer('produk_unggulan')->default(0);
            $table->integer('luas_jalan')->default(0); // dalam meter

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rd_potensi_desa');
    }
}

