<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RdPotensiDesaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['dusun' => 'PAMEKARAN', 'j_penduduk_laki' => 459, 'j_penduduk_perempuan' => 366],
            ['dusun' => 'CIMANGLID', 'j_penduduk_laki' => 372, 'j_penduduk_perempuan' => 420],
            ['dusun' => 'CIMAJA', 'j_penduduk_laki' => 348, 'j_penduduk_perempuan' => 383],
            ['dusun' => 'LIMUSAGUNG', 'j_penduduk_laki' => 474, 'j_penduduk_perempuan' => 410],
            ['dusun' => 'MANGUNJAYA', 'j_penduduk_laki' => 329, 'j_penduduk_perempuan' => 310],
            ['dusun' => 'DARAWATI', 'j_penduduk_laki' => 349, 'j_penduduk_perempuan' => 409],
            ['dusun' => 'NANGGELENG', 'j_penduduk_laki' => 367, 'j_penduduk_perempuan' => 390],
        ];

        foreach ($data as &$row) {
            $row['posyandu'] = rand(1, 3);
            $row['tk_ra'] = rand(0, 2);
            $row['sd'] = rand(0, 2);
            $row['smp_sederajat'] = rand(0, 2);
            $row['sma'] = rand(0, 2);
            $row['pkbm'] = rand(0, 1);
            $row['fasilitas_olahraga'] = rand(0, 2);
            $row['fasilitas_kesehatan'] = rand(0, 2);
            $row['fasilitas_ibadah'] = rand(1, 3);
            $row['pasar'] = rand(0, 1);
            $row['bkb'] = rand(0, 1);
            $row['bkr'] = rand(0, 1);
            $row['bkl'] = rand(0, 1);
            $row['uppka'] = rand(0, 1);
            $row['pik_r'] = rand(0, 1);
            $row['stunting_gizi_buruk'] = rand(0, 1);
            $row['produk_unggulan'] = rand(0, 1);
            $row['luas_jalan'] = rand(100, 300); // meter
            $row['j_rw_dusun'] = rand(1, 3);
            $row['j_rt'] = rand(1, 5);
            $row['luas_wilayah'] = rand(10, 25); // hektar atau sesuai satuan
            $row['ketinggian'] = rand(50, 300); // meter
            $row['created_at'] = now();
            $row['updated_at'] = now();
        }

        DB::table('rd_potensi_desa')->insert($data);
    }
}
