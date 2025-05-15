<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdPotensiDesa extends Model
{
    use HasFactory;

    protected $table = 'rd_potensi_desa';

    protected $fillable = [
        'dusun',
        'posyandu',
        'tk_ra',
        'sd',
        'smp_sederajat',
        'sma',
        'pkbm',
        'fasilitas_olahraga',
        'fasilitas_kesehatan',
        'fasilitas_ibadah',
        'pasar',
        'bkb',
        'bkr',
        'bkl',
        'uppka',
        'pik_r',
        'stunting_gizi_buruk',
        'produk_unggulan',
        'luas_jalan',
        'j_rw_dusun',
        'j_rt',
        'luas_wilayah',
        'ketinggian',
        'j_penduduk_laki',
        'j_penduduk_perempuan',
    ];
}
