<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RdKualitas;

class RdKualitasSeeder extends Seeder
{
    public function run(): void
    {
        $dusuns = ['Pamekaran', 'Cimanglid', 'Cimaja', 'Limusagung', 'Mangun Jaya', 'Darawati', 'Nanggelen', 'Payungagung'];

        foreach ($dusuns as $dusun) {
            RdKualitas::create([
                'wilayah' => $dusun,

                // PUS & Usia
                'jumlah_pus' => rand(30, 100),
                'perempuan_total' => rand(100, 200),
                'perempuan_19_keatas' => rand(80, 150),
                'laki_total' => rand(90, 180),
                'laki_25_keatas' => rand(70, 140),

                // Pekerjaan
                'jumlah_individu' => rand(200, 500),
                'pekerjaan_petani' => rand(10, 50),
                'pekerjaan_nelayan' => rand(0, 10),
                'pekerjaan_pedagang' => rand(10, 40),
                'pekerjaan_pejabat' => rand(1, 5),
                'pekerjaan_pns_tni_polri' => rand(5, 20),
                'pekerjaan_swasta' => rand(30, 80),
                'pekerjaan_wiraswasta' => rand(20, 60),
                'pekerjaan_pensiunan' => rand(1, 10),
                'pekerjaan_pekerja_lepas' => rand(10, 40),
                'pekerjaan_bekerja_total' => rand(100, 300),
                'pekerjaan_tidak_bekerja' => rand(50, 150),

                // Pendidikan
                'pendidikan_tidak_sekolah' => rand(5, 20),
                'pendidikan_tidak_tamat_sd' => rand(10, 30),
                'pendidikan_tamat_sd' => rand(20, 50),
                'pendidikan_sltp' => rand(30, 60),
                'pendidikan_slta' => rand(40, 70),
                'pendidikan_pt' => rand(10, 40),

                // Umur Anak
                'anak_usia_7_12' => rand(20, 50),
                'anak_usia_13_15' => rand(15, 40),
                'anak_usia_16_18' => rand(10, 30),
                'anak_usia_19_24' => rand(10, 30),

                // Risiko Stunting
                'sasaran_stunting' => $dusun === 'Payungagung' ? rand(50, 100) : null,
                'berisiko_stunting' => $dusun === 'Payungagung' ? rand(10, 40) : null,
                'tidak_berisiko_stunting' => $dusun === 'Payungagung' ? rand(30, 60) : null,
            ]);
        }
    }
}
