<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'mobile_number' => '+639178172281',
            'password' => Hash::make('Test1234!'),
            'birthday' => '2000-01-01'
        ]);
    }
}
