<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'story_image',
        'view_count',
        'like_count',
        'id_author',
    ];

    protected $casts = [
        'view_count' => 'integer',
        'like_count' => 'integer',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_story', 'id_story', 'id_category');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'id_story');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_story');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'id_author');
    }
}
