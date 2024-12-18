<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Fantasy', 'description' => 'Stories that contain magical elements.'],
            ['name' => 'Romance', 'description' => 'Stories focused on romantic relationships.'],
            ['name' => 'Science Fiction', 'description' => 'Fiction based on futuristic science and technology.'],
            ['name' => 'Horror', 'description' => 'Stories meant to scare or unsettle.'],
            ['name' => 'Adventure', 'description' => 'Exciting and risky journeys.'],
            ['name' => 'Mystery', 'description' => 'Stories about solving puzzles or crimes.'],
            ['name' => 'Thriller', 'description' => 'Stories full of suspense and excitement.'],
            ['name' => 'Drama', 'description' => 'Stories with intense character development.'],
            ['name' => 'Comedy', 'description' => 'Stories meant to amuse and entertain.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}