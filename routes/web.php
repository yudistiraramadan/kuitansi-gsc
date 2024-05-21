<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuitansiController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'loginpage'])->name('login');
Route::post('/post-login', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');   

Route::group(['middleware' => ['auth' => 'cekrole:1']], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.manajemen');
    
    //Kuitansi 
    Route::get('/kuitansi', [KuitansiController::class, 'index'])->name('daftar.kuitansi');
    Route::get('/kuitansi/tambah', [KuitansiController::class, 'create'])->name('tambah.kuitansi');
});

Route::group(['middleware' => ['auth' => 'cekrole:2']], function(){
    Route::get('/dashboard-petugas', [DashboardController::class, 'dashboard_petugas'])->name('dashboard.petugas');
});
