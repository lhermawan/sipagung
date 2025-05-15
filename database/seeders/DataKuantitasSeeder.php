<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataKuantitasSeeder extends Seeder
{
    public function run()
    {
        DB::table('data_kuantitas')->insert([
            'iud' => 100,
            'mow' => 50,
            'mop' => 30,
            'implant' => 40,
            'suntik' => 120,
            'pil' => 90,
            'kondom' => 150,
            'ias' => 200,
            'iat' => 80,
            'tial' => 100,
            'jumlah_ibu_hamil' => 250,
            'jumlah_pasangan_usia_subur' => 300,
            'jumlah_wanita_usia_subur' => 350,
        ]);
    }
}
