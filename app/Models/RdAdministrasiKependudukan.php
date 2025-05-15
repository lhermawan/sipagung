<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RdAdministrasiKependudukan extends Model
{
    protected $table = 'rd_administrasi_kependudukan';

    protected $fillable = [
        't_memiliki_kk',
        't_memiliki_akte_lahir',
        't_memiliki_akte_nikah'
    ];
}
