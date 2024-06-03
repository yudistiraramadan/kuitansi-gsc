<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kuitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingpageController extends Controller
{
    public function index(){
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
    
        return view('landingpage.index', compact('chartData'));
        dd($chartData);
    }
}
