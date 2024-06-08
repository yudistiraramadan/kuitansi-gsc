<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuitansi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'donatur_id',
        'nominal', 'terbilang', 'keperluan',
        'jenis_donasi', 'pembayaran', 'tanggal'
    ];

    public function users(){
        // return $this->belongsToMany(User::class, 'user_kuitansi');
        return $this->belongsTo(User::class);
    }

    public function donaturs(){
        return $this->belongsTo(Donatur::class);
    }
}
