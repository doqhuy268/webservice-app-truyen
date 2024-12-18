<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function stories()
    {
        return $this->belongsToMany(Story::class, 'category_story', 'id_category', 'id_story');
    }
}
