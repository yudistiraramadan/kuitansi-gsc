<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kuitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingpageController extends Controller
{
    public function index(){
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $kuitansis = Kuitansi::select(
            DB::raw('SUM(nominal) as total_nominal'),
            DB::raw('MONTH(tanggal) as month'),
            'jenis_donasi'
        )
        ->whereIn('jenis_donasi', ['Tabung Kebaikan', 'Kotak Infaq'])
        ->groupBy('month', 'jenis_donasi')
        ->get();
    
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    
        // Initialize nominal arrays for each donation type
        $nominalsTabungKebaikan = array_fill(0, 12, 0);
        $nominalsKotakInfaq = array_fill(0, 12, 0);
    
        // Map data from database to respective arrays
        foreach ($kuitansis as $kuitansi) {
            $index = $kuitansi->month - 1;
            if ($kuitansi->jenis_donasi == 'Tabung Kebaikan') {
                $nominalsTabungKebaikan[$index] = $kuitansi->total_nominal;
            } else if ($kuitansi->jenis_donasi == 'Kotak Infaq') {
                $nominalsKotakInfaq[$index] = $kuitansi->total_nominal;
            }
        }
    
        $chartData = [
            'months' => $months,
            'nominalsTabungKebaikan' => $nominalsTabungKebaikan,
            'nominalsKotakInfaq' => $nominalsKotakInfaq
        ];

        $kuitansis = Kuitansi::join('users', 'kuitansis.user_id', '=', 'users.id')
        ->orderBy('kuitansis.tanggal', 'desc')
        ->get(['kuitansis.id', 'kuitansis.nominal', 'kuitansis.tanggal', 'kuitansis.jenis_donasi', 'users.nama'])
        ->whereIn('jenis_donasi', ['Tabung Kebaikan', 'Kotak Infaq']);
        // dd($kuitansis);

        // ============================================================================================================================

        $currentYear = Carbon::now()->year;

        // Total nominal untuk Tabung Kebaikan
        $tabung = Kuitansi::whereYear('tanggal', $currentYear)
        ->where('jenis_donasi', 'Tabung Kebaikan')
        ->sum('nominal');

        // Total nominal untuk Kotak Infaq
        $kotak = Kuitansi::whereYear('tanggal', $currentYear)
        ->where('jenis_donasi', 'Kotak Infaq')
        ->sum('nominal');

        // ============================================================================================================================
        
        // Top donasi kecamatan tertinggi bulan ini
        $currentMonth = Carbon::now()->month;
        $monthlyTabung = DB::table('kuitansis')
        ->join('donaturs', 'kuitansis.donatur_id', '=', 'donaturs.id')
        ->select('donaturs.kecamatan', DB::raw('SUM(kuitansis.nominal) as total_nominal'))
        ->whereIn('jenis_donasi', ['Tabung Kebaikan'])
        ->whereMonth('kuitansis.tanggal', $currentMonth)
        ->groupBy('donaturs.kecamatan')
        ->orderBy('total_nominal', 'desc')
        ->limit(5)
        ->get();

        $monthlyKotak = DB::table('kuitansis')
        ->join('donaturs', 'kuitansis.donatur_id', '=', 'donaturs.id')
        ->select('donaturs.kecamatan', DB::raw('SUM(kuitansis.nominal) as total_nominal'))
        ->whereIn('jenis_donasi', ['Kotak Infaq'])
        ->whereMonth('kuitansis.tanggal', $currentMonth)
        ->groupBy('donaturs.kecamatan')
        ->orderBy('total_nominal', 'desc')
        ->limit(5)
        ->get();
        // dd($topKecamatan);
    
        return view('landingpage.index', compact('bulan', 'chartData', 'kuitansis', 'tabung', 'kotak', 'monthlyTabung', 'monthlyKotak'));
    }
}
