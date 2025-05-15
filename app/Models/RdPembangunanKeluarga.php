<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdPembangunanKeluarga extends Model
{
    use HasFactory;

    protected $table = 'rd_pembangunan_keluarga';

    protected $fillable = [
        'dusun',
        'bkb_mengikuti',
        'bkb_tidak_mengikuti',
        'bkr_mengikuti',
        'bkr_tidak_mengikuti',
        'bkl_mengikuti',
        'bkl_tidak_mengikuti',
        'uppka_mengikuti',
        'uppka_tidak_mengikuti',
        'pik_r_mengikuti',
        'pik_r_tidak_mengikuti',
    ];
}
