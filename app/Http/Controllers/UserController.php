<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kuitansi;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

            if (Auth::user()->role_id == 1) {
                return redirect()->route('daftar.user')->with('success', 'Data user berhasil diedit!');        
            } elseif(Auth::user()->role_id == 2){
                return redirect()->route('dashboard.petugas')->with('success', 'Data user berhasil diedit!');        
            }
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

        if (Auth::user()->role_id == 1) {
            return redirect()->route('daftar.user')->with('success', 'Password user berhasil diubah!');        
        } elseif(Auth::user()->role_id == 2){
            return redirect()->route('dashboard.petugas')->with('success', 'Password user berhasil diubah!');        
        }
    }

    public function delete(Request $request, $id){
        $user = User::find($request->$id);
        $user->delete();
        return redirect()->route('daftar.user');
    }

    public function detail($id){
        $user = User::join('detail_users', 'users.id', '=', 'detail_users.user_id')
        ->get(['users.id', 'users.role_id', 'users.nama', 'users.username', 'users.photo', 'detail_users.user_id', 'detail_users.alamat', 'detail_users.phone', 'detail_users.gender'])
        ->find($id);
        // dd($users); 

        $kuitansis = Kuitansi::join('donaturs', 'kuitansis.donatur_id', '=', 'donaturs.id')
        ->where('user_id', $id)
        ->orderBy('tanggal', 'desc')
        ->get();
        // dd($kuitansis);

        // Mengambil data nominal per bulan untuk user
        $chartData = Kuitansi::where('user_id', $id)
            ->select(
                DB::raw('MONTH(tanggal) as month'),
                DB::raw('SUM(nominal) as total_nominal')
            )
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->pluck('total_nominal', 'month')
            ->toArray();
        
        // Menyiapkan data untuk semua bulan
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $data = [];
        foreach ($months as $month => $name) {
            $data[] = [
                'month' => $name,
                'total_nominal' => isset($chartData[$month]) ? $chartData[$month] : 0
            ];
        }

        // Menghitung jumlah kuitansi yang dibuat oleh user secara keseluruhan
        $totalKuitansi = Kuitansi::where('user_id', $id)->count();

        // Menghitung jumlah kuitansi yang dibuat oleh user di bulan ini
        $totalKuitansiBulan = Kuitansi::where('user_id', $id)
            ->whereMonth('tanggal', Carbon::now()->month)
            ->count();
            
        // dd($totalKuitansiBulan);

        return view('user.detail', compact('user', 'kuitansis',  'data', 'totalKuitansi', 'totalKuitansiBulan'), ['title'=>'Detail User']);
    }
}
