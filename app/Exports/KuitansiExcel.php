<?php

namespace App\Exports;

use App\Models\Kuitansi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class KuitansiExcel implements FromCollection
class KuitansiExcel implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {      
        $kuitansis = Kuitansi::all();
        return view('kuitansi.excel', compact('kuitansis'));
    }
    
}
