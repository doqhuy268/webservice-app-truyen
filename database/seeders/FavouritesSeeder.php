<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favourite;

class FavouritesSeeder extends Seeder
{
    public function run()
    {
        $favourites = [
            ['id_user' => 1, 'id_story' => 1],
            ['id_user' => 2, 'id_story' => 2],
            ['id_user' => 2, 'id_story' => 3],
            ['id_user' => 3, 'id_story' => 4],
            ['id_user' => 1, 'id_story' => 5],
            ['id_user' => 4, 'id_story' => 6],
            ['id_user' => 5, 'id_story' => 7],
            ['id_user' => 3, 'id_story' => 8],
        ];

        foreach ($favourites as $favourite) {
            Favourite::create($favourite);
        }
    }
}