<?php

// app/Models/RdIndividu.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RdIndividu extends Model
{
    protected $table = 'rd_individu';

    protected $fillable = [
        'pekerjaan',
        'jml_laki',
        'jml_perempuan'
    ];
}

