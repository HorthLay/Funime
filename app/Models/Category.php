<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_kh',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_category');
    }
}
