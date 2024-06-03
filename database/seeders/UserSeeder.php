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
            'username' => 'manajer',
            'password' => bcrypt('tes'),
            'photo' => 'yudis.jpg',
        ]);
        User::create([
            'role_id' => '2',
            'nama' => 'Yudistira Ramadan Kalimasada',
            'username' => 'petugas',
            'password' => bcrypt('tes'),
            'photo' => 'yudis.jpg',
        ]);
        User::create([
            'role_id' => '2',
            'nama' => 'Catur Fajar Nugroho',
            'username' => 'catur',
            'password' => bcrypt('tes'),
            'photo' => 'yudis.jpg',
        ]);
    }
}
