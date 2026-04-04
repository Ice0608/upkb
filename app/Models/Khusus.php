<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khusus extends Model
{
    protected $fillable = [
        'kod_khusus',
        'kod_institusi',
        'nama_khusus',
        'jenis_khusus',
        'mod_pengajian',
        'tempoh',
        'kuota',
        'tarikh_pendaftaran',
        'penerangan',
    ];
}
