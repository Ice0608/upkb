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

    public function getKodInstitusiAttribute($value)
    {
        return is_string($value) ? trim($value) : $value;
    }

    public function setKodInstitusiAttribute($value): void
    {
        $this->attributes['kod_institusi'] = is_string($value) ? trim($value) : $value;
    }

    public function kursuses()
    {
        return $this->hasMany(Kursus::class, 'kod_institusi', 'kod_institusi');
    }
}
