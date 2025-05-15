<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RdPerlindunganSosial extends Model
{
    protected $table = 'rd_perlindungan_sosial';

    protected $fillable = [
        'j_individu',
        'j_pus',
        'j_pus_kb',
        'j_pus_pkh',
    ];
}
