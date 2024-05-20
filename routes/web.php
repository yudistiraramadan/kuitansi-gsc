<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'loginpage'])->name('loginpage');

Route::get('/dashboard', function (){
    return view('dashboard', ['title'=> 'Dashboard']);
});
