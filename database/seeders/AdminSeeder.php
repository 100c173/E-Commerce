<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin1',
            'password' => Hash::make('password'),
            'email' => 'admin1@gmail.com',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'admin2',
            'password' => Hash::make('password'),
            'email' => 'admin2@gmail.com',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'admin3',
            'password' => Hash::make('password'),
            'email' => 'admin3@gmail.com',
            'role' => 'admin'
        ]);
    }
}
