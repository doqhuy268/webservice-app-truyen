<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\History;

class HistoriesSeeder extends Seeder
{
    public function run()
    {
        $histories = [
            ['id_user' => 1, 'id_story' => 1, 'id_chapter' => 1],
            ['id_user' => 2, 'id_story' => 2, 'id_chapter' => 1],
            ['id_user' => 2, 'id_story' => 3, 'id_chapter' => 1],
            ['id_user' => 3, 'id_story' => 4, 'id_chapter' => 1],
            ['id_user' => 1, 'id_story' => 5, 'id_chapter' => 1],
            ['id_user' => 4, 'id_story' => 6, 'id_chapter' => 1],
            ['id_user' => 5, 'id_story' => 7, 'id_chapter' => 1],
            ['id_user' => 2, 'id_story' => 8, 'id_chapter' => 1],
        ];

        foreach ($histories as $history) {
            History::create($history);
        }
    }
}