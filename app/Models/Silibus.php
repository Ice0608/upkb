<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Silibus extends Model
{
    protected $fillable = [
        'kod_institusi',
        'kod_khusus',
        'topik',
        'isi_kandungan',
    ];
}
