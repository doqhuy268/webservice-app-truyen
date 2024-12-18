<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class ChaptersSeeder extends Seeder
{
    public function run()
    {
        $chapters = [
            ['name' => 'Chapter 1 - The Beginning', 'content' => 'Content of chapter 1 of The Magical Forest...', 'id_story' => 1],
            ['name' => 'Chapter 1 - A New Love', 'content' => 'Content of chapter 1 of Love in the Stars...', 'id_story' => 2],
            ['name' => 'Chapter 1 - The Haunted Arrival', 'content' => 'Content of chapter 1 of Haunted Manor...', 'id_story' => 3],
            ['name' => 'Chapter 1 - The Map Discovery', 'content' => 'Content of chapter 1 of Treasure Hunt...', 'id_story' => 4],
            ['name' => 'Chapter 1 - The Experiment', 'content' => 'Content of chapter 1 of The Time Machine...', 'id_story' => 5],
            ['name' => 'Chapter 1 - The Mysterious Figure', 'content' => 'Content of chapter 1 of The Silent Witness...', 'id_story' => 6],
            ['name' => 'Chapter 1 - The Final Performance', 'content' => 'Content of chapter 1 of The Final Act...', 'id_story' => 7],
            ['name' => 'Chapter 1 - A Day of Laughs', 'content' => 'Content of chapter 1 of Laughing Through Life...', 'id_story' => 8],
        ];

        foreach ($chapters as $chapter) {
            Chapter::create($chapter);
        }
    }
}