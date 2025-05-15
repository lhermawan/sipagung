<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RdAdministrasiKependudukan;

class RdAdministrasiKependudukanSeeder extends Seeder
{
    public function run()
    {
        RdAdministrasiKependudukan::create([
            't_memiliki_kk' => rand(50, 200),
            't_memiliki_akte_lahir' => rand(50, 200),
            't_memiliki_akte_nikah' => rand(50, 200),
        ]);
    }
}

