<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKesehatanReproduksiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_kuantitas', function (Blueprint $table) {
            $table->id();

            // Alat Kontrasepsi
            $table->unsignedInteger('iud')->default(0);
            $table->unsignedInteger('mow')->default(0); // Metode Operasi Wanita
            $table->unsignedInteger('mop')->default(0); // Metode Operasi Pria
            $table->unsignedInteger('implant')->default(0);
            $table->unsignedInteger('suntik')->default(0);
            $table->unsignedInteger('pil')->default(0);
            $table->unsignedInteger('kondom')->default(0);

            // Jenis Akseptor
            $table->unsignedInteger('ias')->default(0); // Akseptor Suntik
            $table->unsignedInteger('iat')->default(0); // Akseptor Implant
            $table->unsignedInteger('tial')->default(0); // Total MOW + MOP

            // Data Umum
            $table->unsignedInteger('jumlah_ibu_hamil')->default(0);
            $table->unsignedInteger('jumlah_pasangan_usia_subur')->default(0);
            $table->unsignedInteger('jumlah_wanita_usia_subur')->default(0);

            // Opsional untuk pengelompokan data
            $table->date('periode')->nullable(); // periode data
            $table->unsignedBigInteger('wilayah_id')->nullable(); // foreign key ke tabel wilayah (jika ada)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kesehatan_reproduksi');
    }
}
