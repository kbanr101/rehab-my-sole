<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'user_id',
        'seo_title',
        'seo_description',
        'short_description',
        'seo_keywords',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Likes::class, 'post_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
