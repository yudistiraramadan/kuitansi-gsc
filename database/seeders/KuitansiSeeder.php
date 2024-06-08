<?php

namespace Database\Seeders;

use App\Models\Kuitansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KuitansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kuitansi::create([
            'user_id' => 2,
            'donatur' => 'Dimas Chandra Efansa', 
            'nominal' => 500000,
            'terbilang' => 'LIMA RATUS RIBU RUPIAH',
            'keperluan' => 'Bantuan Banjir Nusawungu',
            'jenis_donasi' => 'Sedekah',
            'pembayaran' => 'Transfer',
            'tanggal' => '2024-6-1',
        ]);
        Kuitansi::create([
            'user_id' => 2,
            'nominal' => 1000000,
            'terbilang' => 'SATU JUTA RUPIAH',
            'keperluan' => 'Tabung Kebaikan',
            'jenis_donasi' => 'Tabung Kebaikan',
            'pembayaran' => 'Transfer',
            'tanggal' => '2024-6-1',
        ]);
        Kuitansi::create([
            'user_id' => 3,
            'nominal' => 250000,
            'terbilang' => 'DUA RATUS LIMA PULUH RIBU RUPIAH',
            'keperluan' => 'Kotak Infaq',
            'jenis_donasi' => 'Kotak Infaq',
            'pembayaran' => 'Transfer',
            'tanggal' => '2024-6-1',
        ]);
    }
}
