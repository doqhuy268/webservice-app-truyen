<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategoriesSeeder::class,
            AuthorsSeeder::class,
            StoriesSeeder::class,
            CommentsSeeder::class,
            ChaptersSeeder::class,
            CategoryStorySeeder::class,
            FavouritesSeeder::class,
            HistoriesSeeder::class,
        ]);
    }
}