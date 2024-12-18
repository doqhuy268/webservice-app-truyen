<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorsSeeder extends Seeder
{
    public function run()
    {
        $authors = [
            ['name' => 'Author One'],
            ['name' => 'Author Two'],
            ['name' => 'Author Three'],
            ['name' => 'Author Four'],
            ['name' => 'Author Five'],
            ['name' => 'Author Six'],
            ['name' => 'Author Seven'],
            ['name' => 'Author Eight'],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}