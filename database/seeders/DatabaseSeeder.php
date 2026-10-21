<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'nama' => 'Admin Super',
            'email' => 'superadmin@test.com',
            'role' => 'superadmin',
            'password' => Hash::make('12345678'),
            'jenis_kelamin' => 'lk'
        ]);

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@test.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'jenis_kelamin' => 'lk'
        ]); 
    }
}
