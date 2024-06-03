<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => '1',
            'nama' => 'Jaka Mentari',
            'username' => 'jaka',
            'password' => bcrypt('Bismillah2024'),
            'photo' => 'jaka.png',
        ]);
        User::create([
            'role_id' => '2',
            'nama' => 'Ananda Sarlyn',
            'username' => 'nanda',
            'password' => bcrypt('Bismillah2024'),
            'photo' => 'default.png',
        ]);
        User::create([
            'role_id' => '2',
            'nama' => 'Yudistira Ramadan Kalimasada',
            'username' => 'yudis',
            'password' => bcrypt('Bismillah2024'),
            'photo' => 'yudis.jpg',
        ]);
    }
}
