<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YuranPilihan extends Model
{
    protected $fillable = [
        'kod_institusi',
        'kod_khusus',
        'pilihan',
        'item',
        'amount',
    ];
}
