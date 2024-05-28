<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\Kuitansi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::join('detail_users', 'users.id', '=', 'detail_users.user_id')
        ->orderBy('users.created_at','desc')
        ->get(['users.id', 'users.role_id', 'users.nama', 'detail_users.alamat', 'detail_users.phone']);
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
                'photo' => 'mimes:png,jpg,JPEG|max:2048',
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
                'photo.mimes' => 'Format foto harus bertipe: png,jpg,JPEG. Dan ukuran maksimal 2MB',
                'alamat.required' => 'Alamat masih kosong',
                'gender.required' => 'Jenis kelamin masih kosong',
            ]
            );

            $data = $request->all();
            $users = new User;
            $defaultPhoto = ('default.png');
            $users->role_id = $data['role_id'];
            $users->nama = $data['nama'];
            $users->username = $data['username'];
            $users->password =  Hash::make($data['password']);
            $users->photo = $defaultPhoto;

            if ($request->hasFile('photo')) {
                $request->file('photo')->move('foto-user/', $request->file('photo')->getClientOriginalName());
                $users->photo = $request->file('photo')->getClientOriginalName();
            }
            $users->save();

            $detail_users = new DetailUser;
            $detail_users->user_id = $users->id;
            $detail_users->alamat = $request['alamat'];
            $detail_users->phone = $request['phone'];
            $detail_users->gender = $request['gender'];
            $detail_users->save();

            return redirect()->route('daftar.user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::join('detail_users', 'users.id', '=', 'detail_users.user_id')
        ->get(['users.*', 'detail_users.*'])
        ->find($id);
        return view('user.edit', compact('user'), ['title'=>'Edit User']);
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'role_id' => 'required',
                'nama' => 'required',
                'username' => 'required',
                'phone' => 'required|numeric',
                'foto' => 'mimes:png,jpg,JPEG|max:2048',
                'alamat' => 'required',
                'gender' => 'required',
            ],
            [
                'role_id.required' => 'Tipe user masih kosong',
                'nama.required' => 'Nama user masih kosong',
                'username.required' => 'Username masih kosong',
                'foto.mimes' => 'Format foto harus bertipe: png,jpg,JPEG. Dan ukuran maksimal 2MB',
                'alamat.required' => 'Alamat masih kosong',
                'gender.required' => 'Jenis kelamin masih kosong',
            ]
            );
            $user = User::findOrFail($id);
            $user->role_id = $request->role_id;
            $user->nama = $request->nama;
            $user->username = $request->username;
            if ($request->hasFile('photo')) {
                $request->file('photo')->move('foto-user/', $request->file('photo')->getClientOriginalName());
                $user->photo = $request->file('photo')->getClientOriginalName();
            }
            $user->save();

            $detail_user = DetailUser::findOrFail($id);
            $detail_user->alamat = $request->alamat;
            $detail_user->phone = $request->phone;
            $detail_user->gender = $request->gender;
            $detail_user->save();

            return redirect()->route('daftar.user')->with('success', 'Data user berhasil diedit!');        
    }

    public function update_password(Request $request, $id){
        $request->validate(
            [
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'password.required' => 'Password masih kosong.',
                'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
                'password_confirmation.required' => 'Password konfirmasi masih kosong',
                'password_confirmation.same' => 'Password tidak sama',
            ]
        );
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('daftar.user')->with('success', 'Password user berhasil diubah!');
    }

    public function delete(Request $request, $id){
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('daftar.user');
    }

    public function detail($id){
        $user = User::join('detail_users', 'users.id', '=', 'detail_users.user_id')
        // ->join('kuitansis', 'users.id', '=', 'kuitansis.user_id')
        ->get(['users.id', 'users.role_id', 'users.nama', 'users.username', 'users.photo', 'detail_users.user_id', 'detail_users.alamat', 'detail_users.phone', 'detail_users.gender'])
        ->find($id);
        // dd($users); 
        $kuitansis = Kuitansi::where('user_id', $id)
        ->orderBy('tanggal', 'desc')
        ->get();
        return view('user.detail', compact('user', 'kuitansis'), ['title'=>'Detail User']);
    }
}
