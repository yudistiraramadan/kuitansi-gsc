<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuitansi extends Model
{
    use HasFactory;
    protected $fillable = [
        'donatur', 'nominal', 'terbilang', 'keperluan',
        'jenis_kuitansi', 'pembayaran', 'tanggal'
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'user_kuitansi');
    }
}
