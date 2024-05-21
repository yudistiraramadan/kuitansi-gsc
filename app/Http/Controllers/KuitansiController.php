<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kuitansi;
use App\Models\UserKuitansi;
use Illuminate\Http\Request;

class KuitansiController extends Controller
{
    public function index(){
        $kuitansis = Kuitansi::with('users:nama')->get();
        return view('kuitansi.lists', compact('kuitansis'));
    }
}
