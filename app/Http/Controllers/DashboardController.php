<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kuitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){

        // Ambil data kuitansi dan grupkan berdasarkan bulan
        $kuitansis = Kuitansi::select(
            DB::raw('SUM(nominal) as total_nominal'),
            DB::raw('MONTH(tanggal) as month')
        )
        ->groupBy('month')
        ->get();
        // dd($kuitansis);

        // Inisialisasi data bulan dan nominal
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $nominals = array_fill(0, 12, 0); // Set semua nominal ke 0

        // Map data dari database ke array bulan dan nominal
        foreach ($kuitansis as $kuitansi) {
            $index = $kuitansi->month - 1;
            $nominals[$index] = $kuitansi->total_nominal;
        }

        $chartData = [
            'months' => $months,
            'nominals' => $nominals
        ];

        return view('dashboard.manajemen', ['title' => 'Dashboard Manajemen'], compact('chartData'));
    }


    public function dashboard_petugas(){
        return view('dashboard.petugas', ['title' => 'Dashboard Petugas']);
    }
}
