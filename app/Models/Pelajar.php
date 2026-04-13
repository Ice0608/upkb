<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajar extends Model
{
    use HasFactory;

    protected $table = 'pelajar';

    protected $fillable = [
        'tarikh_pendaftaran',
        'nama_pelajar',
        'ic_pelajar',
        'no_tel',
        'email',
        'address_line1',
        'address_line2',
        'city',
        'region',
        'postcode',
        'kod_institusi',
        'kod_kursus',
        'nama_bapa',
        'ic_bapa',
        'no_tel_bapa',
        'pendapatan_bapa',
        'nama_ibu',
        'ic_ibu',
        'no_tel_ibu',
        'pendapatan_ibu',
        'jumlah_tanggungan',
    ];

    protected $casts = [
        'tarikh_pendaftaran' => 'date',
    ];
}
