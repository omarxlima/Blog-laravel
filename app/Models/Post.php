<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'yt_iframe',
        'meta_title',
        'meta_keyword',
        'navbar_status',
        'status',
        'created_by',

    ];

    public function categoria() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
