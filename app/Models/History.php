<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_story',
        'id_chapter',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function story()
    {
        return $this->belongsTo(Story::class, 'id_story');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'id_chapter');
    }
}
