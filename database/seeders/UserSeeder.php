<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'password' => 'admin',
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'image' => 'admin_image.jpg',
                'role' => 'admin',
            ],
            [
                'username' => 'user1',
                'password' => 'user1',
                'name' => 'User One',
                'email' => 'user1@example.com',
                'image' => 'user1_image.jpg',
                'role' => 'member',
            ],
            [
                'username' => 'user2',
                'password' => 'user2',
                'name' => 'User Two',
                'email' => 'user2@example.com',
                'image' => 'user2_image.jpg',
                'role' => 'member',
            ],
            [
                'username' => 'user3',
                'password' => 'user3',
                'name' => 'User Three',
                'email' => 'user3@example.com',
                'image' => 'user3_image.jpg',
                'role' => 'member',
            ],
            [
                'username' => 'editor',
                'password' => 'editor',
                'name' => 'Editor User',
                'email' => 'editor@example.com',
                'image' => 'editor_image.jpg',
                'role' => 'editor',
            ],
            [
                'username' => 'user4',
                'password' => 'user4',
                'name' => 'User Four',
                'email' => 'user4@example.com',
                'image' => 'user4_image.jpg',
                'role' => 'member',
            ],
            [
                'username' => 'user5',
                'password' => 'user5',
                'name' => 'User Five',
                'email' => 'user5@example.com',
                'image' => 'user5_image.jpg',
                'role' => 'member',
            ],
            [
                'username' => 'moderator',
                'password' => 'moderator',
                'name' => 'Moderator User',
                'email' => 'moderator@example.com',
                'image' => 'moderator_image.jpg',
                'role' => 'moderator',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'username' => $user['username'],
                'password' => Hash::make($user['password']), // Mã hóa mật khẩu
                'name' => $user['name'],
                'email' => $user['email'],
                'image' => $user['image'],
                'role' => $user['role'],
            ]);
        }
    }
}