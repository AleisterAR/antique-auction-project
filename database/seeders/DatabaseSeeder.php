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

        $user  = new User();
        $user->user_name = 'jhondoe';
        $user->email = 'jhondoe@gmail.com';
        $user->full_name = 'jhondoe@gmail.com';
        $user->address = "address";
        $user->phone_number = '123456789';
        $user->password = bcrypt('password');
        $user->save();

    }
}
