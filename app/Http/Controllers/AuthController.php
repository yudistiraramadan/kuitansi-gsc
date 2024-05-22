<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginpage(){
        return view('authentication.login');
    }

    public function postlogin(Request $request){
        $request->validate(
        [
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' => 'username masih kosong',
            'password.required' => 'password masih kosong',
        ],
    );

    $login = [
        'username' => $request->username,
        'password' => $request->password
    ];
    if(Auth::attempt($login)){
        if(Auth::check()){
            if(Auth::user()->role_id == 1){
                $nama = Auth::user()->nama;
                return redirect()->route('dashboard.manajemen')->with('success', 'Selamat Datang \n'. $nama);
            }
            elseif(Auth::user()->role_id == 2){
                $nama = Auth::user()->nama;
                return redirect()->route('dashboard.petugas')->with('success','Selamat Datang \n'. $nama);
            }
        }
    }
    return redirect('/')->with('error', 'Username/password yang dimasukan salah!');
}

    public function logout(){
        Auth::logout();
        return redirect('/');
    }



}
