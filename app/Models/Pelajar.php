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
        'event_id',
        'noreff',
        'program',
        'status_perkahwinan',
        'nama_pelajar',
        'ic_pelajar',
        'spm_credit',
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
        'pekerjaan_bapa',
        'pendapatan_bapa',
        'nama_ibu',
        'ic_ibu',
        'no_tel_ibu',
        'pekerjaan_ibu',
        'pendapatan_ibu',
        'jumlah_tanggungan',
        'event_id',
        'pilihan_pertama',
        'pilihan_kedua',
        'pilihan_ketiga',
    ];

    protected $casts = [
        'tarikh_pendaftaran' => 'date',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
