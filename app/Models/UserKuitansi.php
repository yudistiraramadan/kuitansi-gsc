<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKuitansi extends Model
{
    use HasFactory;
    protected $table = 'user_kuitansi';
    protected $fillable = [
        'user_id', 'kuitansi_id',
    ];
}
