<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kuitansi;
use App\Models\UserKuitansi;
use Illuminate\Http\Request;

class KuitansiController extends Controller
{
    public function index(){
        // $kuitansis = Kuitansi::orderBy('tanggal', 'desc')->get();
        // $kuitansis = Kuitansi::with('users')->get();
        $kuitansis = Kuitansi::join('users', 'kuitansis.user_id', 'users.id')
        ->get(['kuitansis.donatur', 'kuitansis.nominal', 'kuitansis.keperluan', 'kuitansis.tanggal', 'users.nama']);
        // dd($kuitansis);
        return view('kuitansi.lists', compact('kuitansis'), ['title' => 'Daftar Kuitansi']);
    }

    public function create(){
        return view('kuitansi.tambah', ['title'=>'Tambah Kuitansi']);
    }
}
