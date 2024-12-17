<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    protected $with = ['author', 'categories'];

    // Relationship with Categories
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class, 
            'category_story', 
            'id_story', 
            'id_category'
        );
    }

    // Relationship with Chapters
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class, 'id_story');
    }

    // Relationship with Comments
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'id_story');
    }

    // Relationship with Author
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'id_author');
    }

    // Scope for searching
    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', "%{$searchTerm}%")
            ->orWhereHas('author', function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%");
            })
            ->orWhereHas('categories', function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%");
            });
    }

    // Mutator for story image
    public function getStoryImageAttribute($value)
    {
        return $value ? url('storage/' . $value) : null;
    }

    // Accessor to format view and like counts
    public function getFormattedViewCountAttribute()
    {
        return $this->formatNumber($this->view_count);
    }

    public function getFormattedLikeCountAttribute()
    {
        return $this->formatNumber($this->like_count);
    }

    // Utility method to format large numbers
    protected function formatNumber($number)
    {
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        }
        if ($number >= 1000) {
            return round($number / 1000, 1) . 'K';
        }
        return $number;
    }

    // Method to increment view count
    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    // Method to toggle like
    public function toggleLike()
    {
        $this->increment('like_count');
    }
}