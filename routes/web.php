<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuitansiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'loginpage'])->name('login');
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


    // User
    Route::get('/user', [UserController::class, 'index'])->name('daftar.user');
    Route::get('/user/tambah', [UserController::class, 'create'])->name(('create.user'));
    Route::post('/user/store', [UserController::class, 'store'])->name('store.user');
});

Route::group(['middleware' => ['auth' => 'cekrole:1,2']], function(){
    Route::get('/kuitansi/tambah', [KuitansiController::class, 'create'])->name('create.kuitansi');
    Route::post('/kuitansi/store', [KuitansiController::class, 'store'])->name('store.kuitansi');
});

Route::group(['middleware' => ['auth' => 'cekrole:2']], function(){
    Route::get('/dashboard-petugas', [DashboardController::class, 'dashboard_petugas'])->name('dashboard.petugas');
    Route::get('/kuitansi/petugas', [KuitansiController::class, 'kuitansi_petugas'])->name('kuitansi.petugas');
    
});
