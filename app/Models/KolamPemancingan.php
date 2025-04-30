<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KolamPemancingan extends Model
{
    use HasFactory;
    protected $table = 'kampungnila_kolam_pemancingan';
    protected $guarded = ['id'];
}
