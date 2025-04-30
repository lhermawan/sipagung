<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKampungNila extends Model
{
    use HasFactory;
    protected $table = 'kampungnila_tentang';
    protected $guarded = ['id'];
}
