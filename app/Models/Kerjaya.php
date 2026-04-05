<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerjaya extends Model
{
    protected $fillable = [
        'kod_institusi',
        'kod_khusus',
        'bidang_kerjaya',
    ];
}
