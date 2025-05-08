<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demografi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'demografi';

    protected $guarded = ['id'];
}
