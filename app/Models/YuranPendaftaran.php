<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YuranPendaftaran extends Model
{
    protected $fillable = [
        'kod_institusi',
        'kod_khusus',
        'item',
        'amount',
    ];
}
