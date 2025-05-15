<?php

namespace Database\Seeders;

use App\Models\RdMigrasiDesa;
use Illuminate\Database\Seeder;

class RdMigrasiDesaSeeder extends Seeder
{
    public function run()
    {
        // Membuat 20 data dummy untuk tabel rd_migrasi_desa
        RdMigrasiDesa::factory()->count(20)->create();
    }
}
