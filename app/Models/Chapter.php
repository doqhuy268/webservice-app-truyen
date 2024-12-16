<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'id_story',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class, 'id_story');
    }
}
