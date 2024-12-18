<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryStory;

class CategoryStorySeeder extends Seeder
{
    public function run()
    {
        $categoryStories = [
            ['id_category' => 1, 'id_story' => 1],
            ['id_category' => 2, 'id_story' => 2],
            ['id_category' => 3, 'id_story' => 1],
            ['id_category' => 4, 'id_story' => 3],
            ['id_category' => 5, 'id_story' => 4],
            ['id_category' => 3, 'id_story' => 5],
            ['id_category' => 6, 'id_story' => 6],
            ['id_category' => 7, 'id_story' => 7],
            ['id_category' => 8, 'id_story' => 8],
        ];

        foreach ($categoryStories as $categoryStory) {
            CategoryStory::create($categoryStory);
        }
    }
}