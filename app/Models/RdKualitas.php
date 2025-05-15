<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdKualitas extends Model
{
    use HasFactory;

    protected $table = 'rd_kualitas';

    protected $fillable = [
        'wilayah',
        'jumlah_pus',
        'perempuan_total',
        'perempuan_19_keatas',
        'laki_total',
        'laki_25_keatas',
        'jumlah_individu',
        'pekerjaan_petani',
        'pekerjaan_nelayan',
        'pekerjaan_pedagang',
        'pekerjaan_pejabat',
        'pekerjaan_pns_tni_polri',
        'pekerjaan_swasta',
        'pekerjaan_wiraswasta',
        'pekerjaan_pensiunan',
        'pekerjaan_pekerja_lepas',
        'pekerjaan_bekerja_total',
        'pekerjaan_tidak_bekerja',
        'pendidikan_tidak_sekolah',
        'pendidikan_tidak_tamat_sd',
        'pendidikan_tamat_sd',
        'pendidikan_sltp',
        'pendidikan_slta',
        'pendidikan_pt',
        'anak_usia_7_12',
        'anak_usia_13_15',
        'anak_usia_16_18',
        'anak_usia_19_24',
        'sasaran_stunting',
        'berisiko_stunting',
        'tidak_berisiko_stunting',
    ];
}
