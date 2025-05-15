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
        Schema::create('rd_administrasi_kependudukan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('t_memiliki_kk')->default(0);
            $table->unsignedInteger('t_memiliki_akte_lahir')->default(0);
            $table->unsignedInteger('t_memiliki_akte_nikah')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rd_administrasi_kependudukan');
    }
};
