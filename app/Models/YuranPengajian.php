<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YuranPengajian extends Model
{
    protected $fillable = [
        'kod_institusi',
        'kod_khusus',
        'peringkat',
        'tempoh',
        'amount',
    ];
}
