<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdPerlindunganSosialTable extends Migration
{
    public function up(): void
    {
        Schema::create('rd_perlindungan_sosial', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('j_individu')->default(0);
            $table->unsignedInteger('j_pus')->default(0);
            $table->unsignedInteger('j_pus_kb')->default(0);
            $table->unsignedInteger('j_pus_pkh')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rd_perlindungan_sosial');
    }
}
