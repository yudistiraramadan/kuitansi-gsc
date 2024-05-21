<?php

namespace Database\Seeders;

use App\Models\UserKuitansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserKuitansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserKuitansi::create([
            'user_id' => '2',
            'kuitansi_id' => '1',
        ]);
        UserKuitansi::create([
            'user_id' => '1',
            'kuitansi_id' => '2',
        ]);
    }
}
