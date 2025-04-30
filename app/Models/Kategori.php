<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'category';

    public function post()
    {
    	return $this->hasMany('App\Models\Berita', 'category_id');
    }
}
