<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'nama', 'alamat', 'phone', 'gener', 'kecamatan'
    ];

    public function kuitansis(){
        return $this->hasMany(Kuitansi::class);
    }

}
