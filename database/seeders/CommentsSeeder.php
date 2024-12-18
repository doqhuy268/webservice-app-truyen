<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        $comments = [
            ['id_story' => 1, 'id_user' => 1, 'text' => 'Great story! Looking forward to more.'],
            ['id_story' => 2, 'id_user' => 2, 'text' => 'I loved this chapter!'],
            ['id_story' => 3, 'id_user' => 2, 'text' => 'This gave me chills! Amazing work.'],
            ['id_story' => 4, 'id_user' => 3, 'text' => 'I can’t wait to see what happens next!'],
            ['id_story' => 5, 'id_user' => 1, 'text' => 'Interesting concept, very creative.'],
            ['id_story' => 6, 'id_user' => 4, 'text' => 'This kept me on the edge of my seat!'],
            ['id_story' => 7, 'id_user' => 5, 'text' => 'A touching story with deep emotions.'],
            ['id_story' => 8, 'id_user' => 2, 'text' => 'So funny! I couldn’t stop laughing.'],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}