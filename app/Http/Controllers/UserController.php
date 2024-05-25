<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::join('detail_users', 'users.id', '=', 'detail_users.user_id')
        ->get(['users.role_id', 'users.nama', 'detail_users.alamat', 'detail_users.phone']);
        // dd($users);
        return view('user.lists', compact('users'), ['title'=>'Daftar User']); 
    }
}
