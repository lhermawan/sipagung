<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RdPerlindunganSosialSeeder extends Seeder
{
    public function run()
    {
        DB::table('rd_perlindungan_sosial')->insert([
            'j_individu'    => 4721,
            'j_pus'         => 978,
            'j_pus_kb'      => 812,
            'j_pus_pkh'     => 321,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
