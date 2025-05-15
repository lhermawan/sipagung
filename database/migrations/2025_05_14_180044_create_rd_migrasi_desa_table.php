<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdMigrasiDesaTable extends Migration
{
    public function up()
    {
        Schema::create('rd_migrasi_desa', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->integer('masuk')->default(0);
            $table->integer('keluar')->default(0);
            $table->integer('komuter')->default(0);
            $table->integer('musiman')->default(0);
            $table->string('jenis'); // misalnya: internal, eksternal, dll
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rd_migrasi_desa');
    }
}
