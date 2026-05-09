<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Staf Toko',
            'email' => 'staff@mail.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        Category::create(['name' => 'Teknologi']);
        Category::create(['name' => 'Sains']);
        Category::create(['name' => 'Fiksi']);
    }
}
