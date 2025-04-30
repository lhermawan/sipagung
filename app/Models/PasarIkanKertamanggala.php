<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasarIkanKertamanggala extends Model
{
    use HasFactory;
    protected $table = 'kampungnila_sfv_kertamanggala';
    protected $guarded = ['id'];
}
