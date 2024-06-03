<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailUser::create([
            'user_id' => '1',
            'alamat' => 'Jalan Laban No.32 Rt 04 Rw 10, Cilacap Tengah 52366',
            'phone' => '085264589656',
            'gender' => 'Laki-laki',
        ]);
        DetailUser::create([
            'user_id' => '2',
            'alamat' => 'Jalan Sulawesi Perum Puri Tanjung Intan Cilacap Tengah',
            'phone' => '089674035882',
            'gender' => 'Perempuan',
        ]);
        DetailUser::create([
            'user_id' => '3',
            'alamat' => 'Jalan Sulawesi Perum Puri Tanjung Intan Cilacap Tengah',
            'phone' => '085228409840',
            'gender' => 'Laki-laki',
        ]);
    }
}
