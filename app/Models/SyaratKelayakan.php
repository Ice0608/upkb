<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SyaratKelayakan extends Model
{
    protected $fillable = [
        'kod_institusi',
        'kod_khusus',
        'syarat_kelayakan',
    ];
}
