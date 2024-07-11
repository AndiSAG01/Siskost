<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'phone' => '0895421041898',
                'gender' => 'male',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'isAdmin' => 1
            ],
            [
                'name' => 'User',
                'phone' => '0895421041898',
                'gender' => 'male',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'isAdmin' => 0
            ],
        ]);
    }
}
