<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Institusi;
use App\Models\SyaratKelayakan;
use App\Models\Silibus;
use App\Models\Kerjaya;
use App\Models\YuranPendaftaran;
use App\Models\YuranPilihan;
use App\Models\YuranAsrama;
use App\Models\YuranPengajian;
use App\Models\Elaun;

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

    protected $casts = [
        'tarikh_pendaftaran' => 'date',
    ];

    public function institusi()
    {
        return $this->belongsTo(Institusi::class, 'kod_institusi', 'kod_institusi');
    }

    public function syaratKelayakans()
    {
        return $this->hasMany(SyaratKelayakan::class, 'kod_khusus', 'kod_khusus');
    }

    public function silibuses()
    {
        return $this->hasMany(Silibus::class, 'kod_khusus', 'kod_khusus');
    }

    public function kerjayas()
    {
        return $this->hasMany(Kerjaya::class, 'kod_khusus', 'kod_khusus');
    }

    public function yuranPendaftarans()
    {
        return $this->hasMany(YuranPendaftaran::class, 'kod_khusus', 'kod_khusus');
    }

    public function yuranPilihans()
    {
        return $this->hasMany(YuranPilihan::class, 'kod_khusus', 'kod_khusus');
    }

    public function yuranAsramas()
    {
        return $this->hasMany(YuranAsrama::class, 'kod_khusus', 'kod_khusus');
    }

    public function yuranPengajians()
    {
        return $this->hasMany(YuranPengajian::class, 'kod_khusus', 'kod_khusus');
    }

    public function elauns()
    {
        return $this->hasMany(Elaun::class, 'kod_khusus', 'kod_khusus');
    }
}
