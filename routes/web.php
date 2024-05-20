<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'loginpage'])->name('loginpage');
Route::post('/post-login', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');   

Route::get('/dashboard', [DashboardController::class, 'dashboard', 'title'=>'Dashboard Manajemen'])->name('dashboard.manajemen');
Route::get('/dashboard-petugas', [DashboardController::class, 'dashboard_petugas', 'title' => 'Dashboard Petugas'])->name('dashboard.petugas');
