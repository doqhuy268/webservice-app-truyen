<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryStory extends Pivot
{
    protected $table = 'category_story';
    public $incrementing = true;
    protected $fillable = ['id_category', 'id_story'];
}