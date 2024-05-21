<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kuitansi;
use App\Models\UserKuitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuitansiController extends Controller
{
    public function index(){
        // $kuitansis = Kuitansi::orderBy('tanggal', 'desc')->get();
        // $kuitansis = Kuitansi::with('users')->get();
        $kuitansis = Kuitansi::join('users', 'kuitansis.user_id', 'users.id')
        ->orderBy('kuitansis.tanggal', 'desc')
        ->get(['kuitansis.donatur', 'kuitansis.nominal', 'kuitansis.keperluan', 'kuitansis.tanggal', 'users.nama']);
        // dd($kuitansis);
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
        
            $kuitansi = Kuitansi::create([
                'user_id' => Auth::user()->id,
                'donatur' => $request -> donatur,
                'nominal' => $nominal,
                'terbilang' => $request -> terbilang,
                'keperluan' => $request -> keperluan,
                'jenis_donasi' => $request -> jenis_donasi,
                'pembayaran' => $request -> pembayaran,
                'tanggal' => $request -> tanggal,
            ]);
            // dd($kuitansi);
            return redirect()->route('daftar.kuitansi')->with('success','Kuitansi berhasil ditambahkan');
    }
}
