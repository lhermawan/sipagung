<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;
    protected $table = 'visitor';
    protected $primaryKey='id';
    protected $fillable = ['id_desa_skpd', 'jumlah'];
}
