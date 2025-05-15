<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdPembangunanKeluargaTable extends Migration
{
    public function up()
    {
        Schema::create('rd_pembangunan_keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('dusun');
            $table->integer('bkb_mengikuti')->default(0);
            $table->integer('bkb_tidak_mengikuti')->default(0);
            $table->integer('bkr_mengikuti')->default(0);
            $table->integer('bkr_tidak_mengikuti')->default(0);
            $table->integer('bkl_mengikuti')->default(0);
            $table->integer('bkl_tidak_mengikuti')->default(0);
            $table->integer('uppka_mengikuti')->default(0);
            $table->integer('uppka_tidak_mengikuti')->default(0);
            $table->integer('pik_r_mengikuti')->default(0);
            $table->integer('pik_r_tidak_mengikuti')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rd_pembangunan_keluarga');
    }
}
