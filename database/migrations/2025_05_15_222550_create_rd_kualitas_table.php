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
        Schema::create('rd_kualitas', function (Blueprint $table) {
            $table->id();
            $table->string('wilayah');

            // PUS & Usia
            $table->unsignedInteger('jumlah_pus')->nullable();
            $table->unsignedInteger('perempuan_total')->nullable();
            $table->unsignedInteger('perempuan_19_keatas')->nullable();
            $table->unsignedInteger('laki_total')->nullable();
            $table->unsignedInteger('laki_25_keatas')->nullable();

            // Pekerjaan
            $table->unsignedInteger('jumlah_individu')->nullable();
            $table->unsignedInteger('pekerjaan_petani')->nullable();
            $table->unsignedInteger('pekerjaan_nelayan')->nullable();
            $table->unsignedInteger('pekerjaan_pedagang')->nullable();
            $table->unsignedInteger('pekerjaan_pejabat')->nullable();
            $table->unsignedInteger('pekerjaan_pns_tni_polri')->nullable();
            $table->unsignedInteger('pekerjaan_swasta')->nullable();
            $table->unsignedInteger('pekerjaan_wiraswasta')->nullable();
            $table->unsignedInteger('pekerjaan_pensiunan')->nullable();
            $table->unsignedInteger('pekerjaan_pekerja_lepas')->nullable();
            $table->unsignedInteger('pekerjaan_bekerja_total')->nullable();
            $table->unsignedInteger('pekerjaan_tidak_bekerja')->nullable();

            // Pendidikan
            $table->unsignedInteger('pendidikan_tidak_sekolah')->nullable();
            $table->unsignedInteger('pendidikan_tidak_tamat_sd')->nullable();
            $table->unsignedInteger('pendidikan_tamat_sd')->nullable();
            $table->unsignedInteger('pendidikan_sltp')->nullable();
            $table->unsignedInteger('pendidikan_slta')->nullable();
            $table->unsignedInteger('pendidikan_pt')->nullable();

            // Umur Anak
            $table->unsignedInteger('anak_usia_7_12')->nullable();
            $table->unsignedInteger('anak_usia_13_15')->nullable();
            $table->unsignedInteger('anak_usia_16_18')->nullable();
            $table->unsignedInteger('anak_usia_19_24')->nullable();

            // Risiko Stunting
            $table->unsignedInteger('sasaran_stunting')->nullable();
            $table->unsignedInteger('berisiko_stunting')->nullable();
            $table->unsignedInteger('tidak_berisiko_stunting')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rd_kualitas');
    }
};
