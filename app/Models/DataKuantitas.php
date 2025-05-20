<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKuantitas extends Model
{
    use HasFactory;

    protected $table = 'rd_kuantitas';

    protected $fillable = [
        // Alat Kontrasepsi
        'iud',
        'mow',
        'mop',
        'implant',
        'suntik',
        'pil',
        'kondom',

        // Jenis Akseptor
        'ias',
        'iat',
        'tial',

        // Data Umum
        'jumlah_ibu_hamil',
        'jumlah_pasangan_usia_subur',
        'jumlah_wanita_usia_subur',

        // Opsional
        'periode',
        'sumber',
        'wilayah_id',
    ];

    // public function wilayah()
    // {
    //     return $this->belongsTo(Wilayah::class);
    // }
}
