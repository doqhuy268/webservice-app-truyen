<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_story'];

    /**
     * Quan hệ với User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Quan hệ với Story.
     */
    public function story()
    {
        return $this->belongsTo(Story::class, 'id_story');
    }
}
