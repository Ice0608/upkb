<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elaun extends Model
{
    protected $fillable = [
        'kod_institusi',
        'kod_khusus',
        'elaun_bulanan',
        'tempoh',
        'jumlah',
    ];
}
