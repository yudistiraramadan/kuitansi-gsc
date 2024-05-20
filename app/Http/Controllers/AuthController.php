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

    if(Auth::attempt($request->only('username', 'password'))){
        if(Auth::user()->role_id == '1'){
            return redirect()->route('dashboard.manajemen');
        }elseif(Auth::user()->role_id == '2'){
            return redirect()->route('dashboard.petugas');
        }
    }
    return redirect('/')->withErrors('Username/Password yang dimasukan salah')->withInput();
}

    public function logout(){
        Auth::logout();
        return redirect('/');
    }



}
