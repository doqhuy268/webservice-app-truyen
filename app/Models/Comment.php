<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_story',
        'id_user',
        'text',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class, 'id_story');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
