<?php

// database/seeders/RdIndividuSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RdIndividu;

class RdIndividuSeeder extends Seeder
{
    public function run(): void
    {
        $pekerjaanList = [
            'Petani', 'Nelayan', 'Pedagang', 'Guru', 'PNS',
            'TNI/POLRI', 'Buruh', 'Wiraswasta', 'Pelajar/Mahasiswa', 'Lainnya'
        ];

        foreach ($pekerjaanList as $job) {
            RdIndividu::create([
                'pekerjaan' => $job,
                'jml_laki' => rand(5, 100),
                'jml_perempuan' => rand(5, 100),
            ]);
        }
    }
}

