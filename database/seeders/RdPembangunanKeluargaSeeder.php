<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RdPembangunanKeluarga;

class RdPembangunanKeluargaSeeder extends Seeder
{
    public function run()
    {
        $dusuns = ['Pamekaran', 'Cimanglid', 'Cimaja', 'Limusagung', 'Mangun Jaya', 'Darawati', 'Nanggelen'];

        foreach ($dusuns as $dusun) {
            RdPembangunanKeluarga::create([
                'dusun' => $dusun,
                'bkb_mengikuti' => rand(5, 50),
                'bkb_tidak_mengikuti' => rand(0, 10),
                'bkr_mengikuti' => rand(3, 45),
                'bkr_tidak_mengikuti' => rand(0, 8),
                'bkl_mengikuti' => rand(2, 40),
                'bkl_tidak_mengikuti' => rand(0, 6),
                'uppka_mengikuti' => rand(1, 30),
                'uppka_tidak_mengikuti' => rand(0, 5),
                'pik_r_mengikuti' => rand(1, 20),
                'pik_r_tidak_mengikuti' => rand(0, 4),
            ]);
        }
    }
}

