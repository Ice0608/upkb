<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    protected $fillable = [
        'kod_institusi',
        'nama_institusi',
        'jenis_institusi',
        'gambar_institusi',
        'alamat',
        'mengenai_institusi',
    ];
}
