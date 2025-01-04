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
        // User::factory(10)->create();

        User::create([
            'nama' => 'Admin Super',
            'email' => 'superadmin@example.com',
            'role' => 'superadmin',
            'password' => Hash::make('1234'),
            'jenis_kelamin' => 'lk'
        ]);

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('1234'),
            'jenis_kelamin' => 'lk'
        ]);

        User::create([
            'nama' => 'Arman Umar S.Kom',
            'email' => 'arman@example.com',
            'role' => 'anggota',
            'password' => Hash::make('1234'),
            'jenis_kelamin' => 'lk'
        ]);
    }
}
