<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kursus;

class SyaratKelayakan extends Model
{
    protected $fillable = [
        'kod_institusi',
        'kod_kursus',
        'syarat_kelayakan',
    ];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kod_kursus', 'kod_kursus');
    }
}
