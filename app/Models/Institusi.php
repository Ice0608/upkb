<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kursus;

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

    public function kursuses()
    {
        return $this->hasMany(Kursus::class, 'kod_institusi', 'kod_institusi');
    }
}
