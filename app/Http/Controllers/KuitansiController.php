<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Donatur;
use App\Models\Kuitansi;
use Illuminate\Http\Request;
use App\Exports\KuitansiExcel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class KuitansiController extends Controller
{
    public function index(){
        $kuitansis = Kuitansi::join('users', 'kuitansis.user_id', '=', 'users.id')
        ->join('donaturs', 'kuitansis.donatur_id', '=', 'donaturs.id')
        ->orderBy('kuitansis.tanggal', 'desc')
        ->get(['kuitansis.id', 'kuitansis.nominal', 'kuitansis.keperluan', 'kuitansis.tanggal', 'users.nama as nama_user', 'donaturs.nama as nama_donatur']);
        return view('kuitansi.lists', compact('kuitansis'), ['title' => 'Daftar Kuitansi']);
    }

    public function kuitansi_petugas(){
        $id = Auth::user()->id;
        $kuitansis = Kuitansi::join('users', 'kuitansis.user_id', '=', 'users.id')
        ->join('donaturs', 'kuitansis.donatur_id', '=', 'donaturs.id')
        ->where('kuitansis.user_id', $id)
        ->orderBy('kuitansis.tanggal', 'desc')
        ->get(['kuitansis.id', 'kuitansis.user_id', 'kuitansis.nominal', 'kuitansis.keperluan', 'kuitansis.tanggal', 'users.nama as nama_user', 'donaturs.nama as nama_donatur']);
        return view('kuitansi.lists', compact('kuitansis'), ['title' => 'Daftar Kuitansi']);
    }

    public function create(){ 
        return view('kuitansi.tambah', ['title'=>'Tambah Kuitansi']);
    }

    public function store(Request $request){
        $request->validate(
            [
                'nominal'=>'required',
                'terbilang'=>'required',
                'keperluan'=>'required',
                'jenis_donasi'=>'required',
                'pembayaran'=>'required',
                'tanggal'=>'required',
            ],
            [
                'nominal.required' => 'data tidak boleh kosong',
                'terbilang.required' => 'data tidak boleh kosong',
                'keperluan.required' => 'data tidak boleh kosong',
                'jenis_donasi.required' => 'data tidak boleh kosong',
                'pembayaran.required' => 'data tidak boleh kosong',
                'tanggal.required' => 'data tidak boleh kosong',
            ]
            );

            $nominal = str_replace('.', '', $request->nominal);
        
            Kuitansi::create([
                'user_id' => Auth::user()->id,
                'donatur_id' => $request -> donatur_id,
                'nominal' => $nominal,
                'terbilang' => $request -> terbilang,
                'keperluan' => $request -> keperluan,
                'jenis_donasi' => $request -> jenis_donasi,
                'pembayaran' => $request -> pembayaran,
                'tanggal' => $request -> tanggal,
            ]);
            if (Auth::user()->role_id == 1) {
                return redirect()->route('daftar.kuitansi')->with('success','Kuitansi berhasil ditambahkan');
            }else{
                return redirect()->route('kuitansi.petugas')->with('success','Kuitansi berhasil ditambahkan');
            }
    }

    public function searchDonatur(Request $request){
        $query = $request->get('query');
        $donaturs = Donatur::where('nama', 'LIKE', "%{$query}%")->get();
        return response()->json($donaturs);
    }

    public function edit($id){
        $kuitansi = Kuitansi::findOrFail($id);
        $donatur = Donatur::find($kuitansi->donatur_id);
        return view('kuitansi.edit', ['title' => 'Edit Kuitansi'], compact('kuitansi', 'donatur'));
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'donatur_id' => 'required|exists:donaturs,id',
                'nominal'=>'required',
                'terbilang'=>'required',
                'keperluan'=>'required',
                'jenis_donasi'=>'required',
                'pembayaran'=>'required',
                'tanggal'=>'required',
            ],
            [
                'nominal.required' => 'data tidak boleh kosong',
                'terbilang.required' => 'data tidak boleh kosong',
                'keperluan.required' => 'data tidak boleh kosong',
                'jenis_donasi.required' => 'data tidak boleh kosong',
                'pembayaran.required' => 'data tidak boleh kosong',
                'tanggal.required' => 'data tidak boleh kosong',
                ]
            );
            
            $nominal = str_replace('.', '', $request->nominal);
            
            $kuitansi = Kuitansi::findOrFail($id);
            $kuitansi->update([
                'donatur_id' => $request->donatur_id,
                'nominal' => $nominal,
                'terbilang' => $request->terbilang,
                'keperluan' => $request->keperluan,
                'jenis_donasi' => $request->jenis_donasi,
                'pembayaran' => $request->pembayaran,
                'tanggal' => $request->tanggal,
            ]);
            return redirect()->route('daftar.kuitansi')->with('success','Kuitansi berhasil diedit');
    }

    public function delete(Request $request, $id){
        $kuitansi = Kuitansi::find($request->$id);
        $kuitansi->delete();
        return redirect()->route('daftar.kuitansi');
    }

    public function print(Request $request){
        $kuitansi = Kuitansi::join('donaturs', 'kuitansis.donatur_id', '=', 'donaturs.id')
        ->get(['kuitansis.*', 'donaturs.nama'])
        ->find($request->id);
        $pdf = Pdf::loadView('kuitansi.print', compact('kuitansi'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('e-kuitansi.pdf');
    }

    public function excel(){
        return Excel::download(new KuitansiExcel, 'kuitansi.xlsx');
    }

    public function print_thermal($id) {
        $petugas = Auth::user()->nama;
        $kuitansi = Kuitansi::join('donaturs', 'kuitansis.donatur_id', '=', 'donaturs.id')
        ->get(['kuitansis.*', 'donaturs.nama', 'donaturs.phone'])
        ->find($id);
        $tanggal = Carbon::parse($kuitansi->tanggal)->locale('id')->isoFormat('dddd, D MMMM Y');
        
        $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => "$kuitansi->phone",
            'message' => "Assalamualaikum Warahmatullahi Wabarakatuh,
                \nKami ucapkan :
                \nآجَرَكَ اللهُ فِيْمَا اَعْطَيْتَ، وَبَارَكَ فِيْمَا اَبْقَيْتَ وَجَعَلَهُ لَكَ طَهُوْرًا
                \nTerimakasih atas kotak infaq dari Saudara/i :
                \nNama : $kuitansi->nama
                \nNominal : Rp. *". number_format ($kuitansi->nominal,0,',','.') . "*
                \nTerbilang : $kuitansi->terbilang
                \nKeperluan : $kuitansi->keperluan
                \nDitarik oleh : $petugas
                \nTanggal : $tanggal
                \nKami Ucapkan jazakumullah khairan katsiran atas donasinya, semoga Allah membalas kebaikan saudara/i dengan balasan yang terbaik
                \nAminnn...
                ",
            'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: 611hGB#gKWFMymS8PRvN' //change TOKEN to your actual token
        ),
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
    ));

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }
    curl_close($curl);

    if (isset($error_msg)) {
        echo $error_msg;
    }
    echo $response;
       
    
    // $pdf = PDF::loadView('kuitansi.thermal', compact('kuitansi'))->setPaper([0, 0, 328.8, 1683.6]); // 116mm x 594mm
    // return $pdf->stream('kuitansi.pdf');
    }

}
