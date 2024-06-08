<?php

namespace Database\Seeders;

use App\Models\Donatur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donatur::create([
                'id' => 1,
                'nama' => 'Dimas Chandra',
                'alamat' => 'Jalan Rinjani',
                'phone' => '085228409840',
                'gender' => 'Laki-laki',
                'kecamatan' => 'Cilacap Tengah', 
            ]);
        Donatur::create([
                'id' => 2,
                'nama' => 'Dimas Lahay',
                'alamat' => 'Jalan Rinjani',
                'phone' => '085228409840',
                'gender' => 'Laki-laki',
                'kecamatan' => 'Cilacap Tengah', 
            ]);
        Donatur::create([
                'id' => 3,
                'nama' => 'Dimas Nguyen',
                'alamat' => 'Jalan Rinjani',
                'phone' => '085228409840',
                'gender' => 'Laki-laki',
                'kecamatan' => 'Cilacap Tengah', 
            ]);
        Donatur::create([
                'id' => 4,
                'nama' => 'Yudis Tampan',
                'alamat' => 'Jalan Rinjani',
                'phone' => '085228409840',
                'gender' => 'Laki-laki',
                'kecamatan' => 'Cilacap Tengah', 
            ]);
    }
}
