<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kuitansi;
use App\Models\UserKuitansi;
use Illuminate\Http\Request;
use App\Exports\KuitansiExcel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class KuitansiController extends Controller
{
    public function index(){
        $kuitansis = Kuitansi::join('users', 'kuitansis.user_id', 'users.id')
        ->orderBy('kuitansis.tanggal', 'desc')
        ->get(['kuitansis.id', 'kuitansis.donatur', 'kuitansis.nominal', 'kuitansis.keperluan', 'kuitansis.tanggal', 'users.nama']);
        return view('kuitansi.lists', compact('kuitansis'), ['title' => 'Daftar Kuitansi']);
    }

    public function kuitansi_petugas(){
        $id = Auth::user()->id;
        $kuitansis = Kuitansi::join('users', 'kuitansis.user_id', 'users.id')
        ->where('kuitansis.user_id', $id)
        ->orderBy('kuitansis.tanggal', 'desc')
        ->get(['kuitansis.id', 'kuitansis.user_id', 'kuitansis.donatur', 'kuitansis.nominal', 'kuitansis.keperluan', 'kuitansis.tanggal', 'users.nama']);
        return view('kuitansi.lists', compact('kuitansis'), ['title' => 'Daftar Kuitansi']);
    }

    public function create(){
        return view('kuitansi.tambah', ['title'=>'Tambah Kuitansi']);
    }

    public function store(Request $request){
        $request->validate(
            [
                'donatur'=>'required',
                'nominal'=>'required',
                'terbilang'=>'required',
                'keperluan'=>'required',
                'jenis_donasi'=>'required',
                'pembayaran'=>'required',
                'tanggal'=>'required',
            ],
            [
                'donatur.required' => 'data tidak boleh kosong',
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
                'donatur' => $request -> donatur,
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
            // return redirect()->route('daftar.kuitansi')->with('success','Kuitansi berhasil ditambahkan');
    }

    public function edit($id){
        $kuitansi = Kuitansi::findOrFail($id);
        return view('kuitansi.edit', compact('kuitansi'), ['title' => 'Edit Kuitansi']);
    }

    public function update(Request $request, $id){
        $kuitansi = Kuitansi::findOrFail($id);
        $request->validate(
            [
                'donatur'=>'required',
                'nominal'=>'required',
                'terbilang'=>'required',
                'keperluan'=>'required',
                'jenis_donasi'=>'required',
                'pembayaran'=>'required',
                'tanggal'=>'required',
            ],
            [
                'donatur.required' => 'data tidak boleh kosong',
                'nominal.required' => 'data tidak boleh kosong',
                'terbilang.required' => 'data tidak boleh kosong',
                'keperluan.required' => 'data tidak boleh kosong',
                'jenis_donasi.required' => 'data tidak boleh kosong',
                'pembayaran.required' => 'data tidak boleh kosong',
                'tanggal.required' => 'data tidak boleh kosong',
            ]
            );

            $nominal = str_replace('.', '', $request->nominal);
        
            $kuitansi->update([
                'donatur' => $request -> donatur,
                'nominal' => $nominal,
                'terbilang' => $request -> terbilang,
                'keperluan' => $request -> keperluan,
                'jenis_donasi' => $request -> jenis_donasi,
                'pembayaran' => $request -> pembayaran,
                'tanggal' => $request -> tanggal,
            ]);
            return redirect()->route('daftar.kuitansi')->with('success','Kuitansi berhasil diedit');
    }

    public function delete(Request $request, $id){
        $kuitansi = Kuitansi::find($request->$id);
        $kuitansi->delete();
        return redirect()->route('daftar.kuitansi');
    }

    public function print(Request $request){
        $kuitansi = Kuitansi::find($request->id);
        $pdf = Pdf::loadView('kuitansi.print', compact('kuitansi'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('e-kuitansi.pdf');
    }

    public function excel(){
        return Excel::download(new KuitansiExcel, 'kuitansi.xlsx');
    }

    public function print_thermal($id){
        $kuitansi = Kuitansi::findOrFail($id);
        // $pdf = PDF::loadView('kuitansi.thermal', compact('kuitansi'))->setPaper([0, 0, 226.77, 841.89]); // 58mm x 297mm
        $pdf = PDF::loadView('kuitansi.thermal', compact('kuitansi'))->setPaper([0, 0, 453.54, 1683.78]); // 116mm x 594mm
        return $pdf->stream('kuitansi.pdf');
    }

}
