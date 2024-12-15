<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Akun extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Tia',
                'username' => 'Tia',
                'email' => 'email3@gmail.com',
                'password' => bcrypt('1234'),
                'profile_picture_link' => 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp',
                'task_count' => 3,
                'role' => 1,
            ],
            [
                'name' => 'Iqbaal',
                'username' => 'Iqbaal',
                'email' => 'email4@gmail.com',
                'password' => bcrypt('1234'),
                'profile_picture_link' => 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp',
                'task_count' => 6,
                'role' => 2,
            ],
            [
                'name' => 'Dhimas',
                'username' => 'Dhimas',
                'email' => 'email1@gmail.com',
                'password' => bcrypt('1234'),
                'profile_picture_link' => 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp',
                'task_count' => 9,
                'role' => 3,
            ],
            [
                'name' => 'Litha',
                'username' => 'Litha',
                'email' => 'email5@gmail.com',
                'password' => bcrypt('1234'),
                'profile_picture_link' => 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp',
                'task_count' => 4,
                'role' => 4,
            ],
        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
