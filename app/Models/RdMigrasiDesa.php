<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdMigrasiDesa extends Model
{
    use HasFactory;

    protected $table = 'rd_migrasi_desa';

    protected $fillable = [
        'tahun',
        'jenis',
        'masuk',
        'keluar',
        'komuter',
        'musiman',
    ];

    public $timestamps = false;
}
