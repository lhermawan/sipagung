<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahdatakuPotensi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'rumahdataku_potensi';

    protected $guarded = ['id'];
}
