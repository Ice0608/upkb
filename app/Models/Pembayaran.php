<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'ic_pelajar',
        'username',
        'kaedah_pembayaran',
        'jumlah_bayaran',
        'bayaran_semasa',
        'status',
        'resit',
        'tarikh_pembayaran',
        'masa_pembayaran',
    ];

    protected $casts = [
        'tarikh_pembayaran' => 'date',
    ];
}
