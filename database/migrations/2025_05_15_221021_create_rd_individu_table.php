<?php

// database/migrations/xxxx_xx_xx_create_rd_individu_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdIndividuTable extends Migration
{
    public function up(): void
    {
        Schema::create('rd_individu', function (Blueprint $table) {
            $table->id();
            $table->string('pekerjaan');
            $table->integer('jml_laki');
            $table->integer('jml_perempuan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rd_individu');
    }
}

