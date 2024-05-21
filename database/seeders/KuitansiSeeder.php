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
            'donatur' => 'Dimas Chandra Efansa', 
            'nominal' => 12000000,
            'terbilang' => 'DUA BELAS JUTA RUPIAH',
            'keperluan' => 'Bantuan Banjir Nusawungu',
            'jenis_donasi' => 'Sedekah',
            'pembayaran' => 'Transfer',
            'tanggal' => '2024-5-21',
        ]);
        Kuitansi::create([
            'donatur' => 'Dimas Lahay Cihuy', 
            'nominal' => 50000000,
            'terbilang' => 'LIMA PULUH JUTA RUPIAH',
            'keperluan' => 'Pembangunan Rumah Sholeh',
            'jenis_donasi' => 'Wakaf',
            'pembayaran' => 'Transfer',
            'tanggal' => '2024-5-22',
        ]);
    }
}
