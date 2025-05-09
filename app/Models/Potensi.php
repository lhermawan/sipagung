<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    use HasFactory;
    protected $table = 'potensi';
    protected $primaryKey='potensi_id';
    protected $fillable = ['category_id', 'title_slug','author','title'];



    public function category()
    {
    	return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
