<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            [
                'user_name' => 'admin',
                'email' => 'admin@test.com',
                'full_name' => 'admin',
                'address' => 'address',
                'phone_number' => '123456789',
                'password' =>   bcrypt('password')
            ],
            [
                'user_name' => 'user',
                'email' => 'user@test.com',
                'full_name' => 'user',
                'address' => 'address',
                'phone_number' => '123456789',
                'password' =>   bcrypt('password')
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
