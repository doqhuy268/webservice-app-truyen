<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;

class StoriesSeeder extends Seeder
{
    public function run()
    {
        $stories = [
            ['title' => 'The Magical Forest', 'story_image' => 'forest.jpg', 'view_count' => 0, 'like_count' => 0, 'id_author' => 1],
            ['title' => 'Love in the Stars', 'story_image' => 'stars.jpg', 'view_count' => 0, 'like_count' => 0, 'id_author' => 2],
            ['title' => 'Haunted Manor', 'story_image' => 'haunted_manor.jpg', 'view_count' => 0, 'like_count' => 0, 'id_author' => 3],
            ['title' => 'Treasure Hunt', 'story_image' => 'treasure.jpg', 'view_count' => 0, 'like_count' => 0, 'id_author' => 4],
            ['title' => 'The Time Machine', 'story_image' => 'time_machine.jpg', 'view_count' => 0, 'like_count' => 0, 'id_author' => 5],
            ['title' => 'The Silent Witness', 'story_image' => 'witness.jpg', 'view_count' => 0, 'like_count' => 0, 'id_author' => 6],
            ['title' => 'The Final Act', 'story_image' => 'final_act.jpg', 'view_count' => 0, 'like_count' => 0, 'id_author' => 7],
            ['title' => 'Laughing Through Life', 'story_image' => 'laughs.jpg', 'view_count' => 0, 'like_count' => 0, 'id_author' => 8],
        ];

        foreach ($stories as $story) {
            Story::create($story);
        }
    }
}