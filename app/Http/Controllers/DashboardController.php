<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('dashboard.manajemen');
    }
    public function dashboard_petugas(){
        return view('dashboard.petugas');
    }
}
