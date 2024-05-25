<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::join('detail_users', 'users.id', '=', 'detail_users.user_id')
        ->orderBy('users.created_at','desc')
        ->get(['users.role_id', 'users.nama', 'detail_users.alamat', 'detail_users.phone']);
        // dd($users);
        return view('user.lists', compact('users'), ['title'=>'Daftar User']); 
    }

    public function create(){
        return view('user.tambah', ['title'=>'Tambah User']);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'role_id' => 'required',
                'nama' => 'required|unique:users,nama',
                'username' => 'required|unique:users,username',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
                'phone' => 'required|numeric',
                'foto' => 'mimes:png,jpg,JPEG|max:2048',
                'alamat' => 'required',
                'gender' => 'required',
            ],
            [
                'role_id.required' => 'Tipe user masih kosong',
                'nama.required' => 'Nama user masih kosong',
                'nama.unique' => 'User sudah ada',
                'username.required' => 'Username masih kosong',
                'username.unique' => 'Username sudah ada',
                'password.required' => 'Password masih kosong',
                'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
                'password_confirmation.required' => 'Konfirmasi password masih kosong.',
                'password_confirmation.same' => 'Password tidak sama',
                'phone.required' => 'No WhatsApp masih kosong',
                'foto.mimes' => 'Format foto harus bertipe: png,jpg,JPEG. Dan ukuran maksimal 2MB',
                'alamat.required' => 'Alamat masih kosong',
                'gender.required' => 'Jenis kelamin masih kosong',
            ]
            );

            $data = $request->all();
            $users = new User;
            $users->role_id = $data['role_id'];
            $users->nama = $data['nama'];
            $users->username = $data['username'];
            $users->password =  Hash::make($data['password']);
            $users->save();

            $detail_users = new DetailUser;
            $detail_users->user_id = $users->id;
            $detail_users->alamat = $request['alamat'];
            $detail_users->phone = $request['phone'];
            $detail_users->gender = $request['gender'];
            $detail_users->save();

            return redirect()->route('daftar.user')->with('success', 'User berhasil ditambahkan');
    }
}
