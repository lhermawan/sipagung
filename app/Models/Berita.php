<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey='post_id';
    protected $fillable = ['category_id', 'title_slug','author','title'];


    public function category()
    {
    	return $this->belongsTo('App\Models\Category', 'category_id');
    }

}
