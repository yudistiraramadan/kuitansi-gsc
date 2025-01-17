<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\KuitansiController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');
Route::get('/login', [AuthController::class, 'loginpage'])->name('login');
Route::post('/post-login', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');   

Route::group(['middleware' => ['auth' => 'cekrole:1']], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.manajemen');
    
    //Kuitansi 
    Route::get('/kuitansi', [KuitansiController::class, 'index'])->name('daftar.kuitansi');
    Route::get('/kuitansi/edit/{id}', [KuitansiController::class, 'edit'])->name('edit.kuitansi');
    Route::post('/kuitansi/update/{id}', [KuitansiController::class, 'update'])->name('update.kuitansi');
    Route::post('/kuitansi/delete/{id}', [KuitansiController::class, 'delete'])->name('delete.kuitansi');
    Route::get('/kuitansi/print/{id}', [KuitansiController::class, 'print'])->name('print.kuitansi');
    Route::get('/kuitansi/excel', [KuitansiController::class, 'excel'])->name('excel.kuitansi');
    Route::get('/kuitansi/tes', function(){
        return view('kuitansi.sample');
    });

    // Donatur
    Route::get('/donatur/tambah', [DonaturController::class, 'create'])->name('create.donatur');
    Route::post('donatur/store', [DonaturController::class, 'store'])->name('store.donatur');
    Route::get('/donatur/edit/{id}', [DonaturController::class, 'edit'])->name('edit.donatur');
    Route::post('/donatur/update/{id}', [DonaturController::class, 'update'])->name('update.donatur');
    Route::post('/donatur/delete/{id}', [DonaturController::class, 'delete'])->name('delete.donatur');
    
    // User
    Route::get('/user', [UserController::class, 'index'])->name('daftar.user');
    Route::get('/user/tambah', [UserController::class, 'create'])->name(('create.user'));
    Route::post('/user/store', [UserController::class, 'store'])->name('store.user');
    Route::post('user/delete/{id}', [UserController::class, 'delete'])->name('delete.user');
    });
    
    Route::group(['middleware' => ['auth' => 'cekrole:1,2']], function(){
    
    // Kuitansi
    Route::get('/kuitansi/tambah', [KuitansiController::class, 'create'])->name('create.kuitansi');
    Route::post('/kuitansi/store', [KuitansiController::class, 'store'])->name('store.kuitansi');
    Route::get('/kuitansi/search-donatur', [KuitansiController::class, 'searchDonatur'])->name('search-donatur.kuitansi');
    
    // User
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('update.user');
    Route::get('/user/detail/{id}', [UserController::class, 'detail'])->name('detail.user');
    Route::post('user/update/password/{id}', [UserController::class, 'update_password'])->name('update.password');

    // Donatur
    Route::get('/donatur', [DonaturController::class, 'index'])->name('daftar.donatur');
    route::get('/donatur/detail/{id}', [DonaturController::class, 'detail'])->name('detail.donatur');
});

Route::group(['middleware' => ['auth' => 'cekrole:2']], function(){
    Route::get('/dashboard-petugas', [DashboardController::class, 'dashboard_petugas'])->name('dashboard.petugas');
    Route::get('/kuitansi/petugas', [KuitansiController::class, 'kuitansi_petugas'])->name('kuitansi.petugas');
    Route::get('/kuitansi/petugas/print/{id}', [KuitansiController::class, 'print_thermal'])->name('print.thermal');
    Route::get('/petugas-tes', function(){
        return view('kuitansi.thermal');
    });
    
});
