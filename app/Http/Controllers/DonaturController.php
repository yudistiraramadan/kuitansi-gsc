<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Donatur;
use App\Models\Kuitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonaturController extends Controller
{
    public function index(){
        $donaturs = Donatur::orderBy('created_at', 'desc')->get();
        // dd($donaturs);
        return view('donatur.lists', ['title' => 'Daftar Donatur'], compact('donaturs'));
    }

    public function create(){
        return view('donatur.tambah', ['title' => 'Tambah Donatur']);
    }

    public function store(Request $request){
        $request->validate(
            [
                'nama' => 'required|unique:donaturs,nama',
                'phone' => 'required|numeric',
                'alamat' => 'required',
                'gender' => 'required',
                'kecamatan' => 'required',
            ],
            [
                'nama.required' => 'Nama donatur masih kosong',
                'nama.unique' => 'Donatur sudah ada',
                'phone.required' => 'Nomor WhatsApp masih kosong',
                'alamat.required' => 'Alamat masih kosong',
                'gender.required' => 'Jenis kelamin masih kosong',
                'kecamatan.required' => 'Kecamatan masih kosong',
            ]
        );

        Donatur::create([
            'nama' => $request->nama,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'kecamatan' => $request->kecamatan,
        ]);

        return redirect()->route('daftar.donatur')->with('success', 'Donatur berhasil ditambahkan');
    }

    public function edit($id){
        $donatur = Donatur::findOrFail($id);
        return view('donatur.edit', ['title' => 'Edit Donatur'], compact('donatur'));
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'nama' => 'required',
                'phone' => 'required|numeric',
                'alamat' => 'required',
                'gender' => 'required',
                'kecamatan' => 'required',
            ],
            [
                'nama.required' => 'Nama donatur masih kosong',
                'phone.required' => 'Nomor WhatsApp masih kosong',
                'alamat.required' => 'Alamat masih kosong',
                'gender.required' => 'Jenis kelamin masih kosong',
                'kecamatan.required' => 'Kecamatan masih kosong',
            ]
        );

        $donatur = Donatur::findOrFail($id);
        $donatur->update([
            'nama' => $request->nama,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'kecamatan' => $request->kecamatan,
        ]);
        return redirect()->route('daftar.donatur')->with('success', 'Donatur berhasil diedit');
    }

    public function delete(Request $request, $id){
        $donatur = Donatur::find($request->$id);
        $donatur->delete();
        return redirect()->route('daftar.donatur')->with('success', 'Donatur berhasil dihapus');
    }

    public function detail($id){
        $donatur = Donatur::findOrFail($id);

        $kuitansis = Kuitansi::join('users', 'kuitansis.user_id', '=', 'users.id')
        ->where('kuitansis.donatur_id', $id)
        ->orderBy('tanggal', 'desc')
        ->get(['kuitansis.*', 'users.nama']);

        // Mengambil data nominal per bulan untuk user
        $chartData = Kuitansi::where('donatur_id', $id)
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

        return view('donatur.detail', ['title'=>'Detail Donatur'], compact('donatur','kuitansis', 'data'));
    }

}
