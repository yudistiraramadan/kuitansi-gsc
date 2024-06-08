<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kuitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        // Line chart pendapatan tiap bulan
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

        // ==============================================================================================

        // Donut akumulasi pendapatan per bulan
        $currentMonth = Carbon::now()->month;
        $donationMonth = DB::table('kuitansis')
        ->select('jenis_donasi', DB::raw('SUM(nominal) as total_nominal'))
        ->whereMonth('tanggal', $currentMonth)
        ->groupBy('jenis_donasi')
        ->get();

        // ==============================================================================================

        // Donut akumulasi pendapatan per tahun
        $currentYear = Carbon::now()->year;
        $donationYear = DB::table('kuitansis')
        ->select('jenis_donasi', DB::raw('SUM(nominal) as total_nominal'))
        ->whereYear('tanggal', $currentYear)
        ->groupBy('jenis_donasi')
        ->get();
        // dd($donationYear);

        // ==============================================================================================

        // Top 5 donasi donatur tertinggi bulan ini
        $currentMonth = Carbon::now()->month;
        $topDonations = DB::table('kuitansis')
        ->join('donaturs', 'kuitansis.donatur_id', '=', 'donaturs.id')
        ->select('donaturs.nama', DB::raw('SUM(kuitansis.nominal) as total_nominal'))
        ->whereMonth('kuitansis.tanggal', $currentMonth)
        ->groupBy('donaturs.nama')
        ->orderBy('total_nominal', 'desc')
        ->limit(5)
        ->get();

        // ==============================================================================================

        // Top 5 donasi kecamatan tertinggi bulan ini
        $currentMonth = Carbon::now()->month;
        $topKecamatan = DB::table('kuitansis')
        ->join('donaturs', 'kuitansis.donatur_id', '=', 'donaturs.id')
        ->select('donaturs.kecamatan', DB::raw('SUM(kuitansis.nominal) as total_nominal'))
        ->whereMonth('kuitansis.tanggal', $currentMonth)
        ->groupBy('donaturs.kecamatan')
        ->orderBy('total_nominal', 'desc')
        ->limit(5)
        ->get();



        return view('dashboard.manajemen', ['title' => 'Dashboard Manajemen'], compact('chartData', 'donationMonth', 'donationYear', 'topDonations', 'topKecamatan'));
    }


    public function dashboard_petugas(){
        $user = User::join('detail_users', 'users.id', '=', 'detail_users.user_id')
        ->get(['users.id', 'users.role_id', 'users.nama', 'users.username', 'users.photo', 'detail_users.user_id', 'detail_users.alamat', 'detail_users.phone', 'detail_users.gender'])
        ->find(Auth::user()->id);

        $kuitansis = Kuitansi::where('user_id', Auth::user()->id)
        ->orderBy('tanggal', 'desc')
        ->get();

        // $id_user = User::findOrFail($id);
        // Mengambil data nominal per bulan untuk user
        $chartData = Kuitansi::where('user_id', Auth::user()->id)
            ->select(
                DB::raw('MONTH(tanggal) as month'),
                DB::raw('SUM(nominal) as total_nominal')
            )
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->pluck('total_nominal', 'month')
            ->toArray();
        
        // Menyiapkan data untuk semua bulan
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $data = [];
        foreach ($months as $month => $name) {
            $data[] = [
                'month' => $name,
                'total_nominal' => isset($chartData[$month]) ? $chartData[$month] : 0
            ];
        }

        // Menghitung jumlah kuitansi yang dibuat oleh user secara keseluruhan
        $totalKuitansi = Kuitansi::where('user_id', Auth::user()->id)->count();

        // Menghitung jumlah kuitansi yang dibuat oleh user di bulan ini
        $totalKuitansiBulan = Kuitansi::where('user_id', Auth::user()->id)
            ->whereMonth('tanggal', Carbon::now()->month)
            ->count();
            
        // dd($chartData);
        return view('dashboard.petugas', ['title' => 'Dashboard Petugas'], compact('chartData', 'data'));
    }
}
