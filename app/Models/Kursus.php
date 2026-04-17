<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Institusi;
use App\Models\Galeri;
use App\Models\SyaratKelayakan;
use App\Models\Silibus;
use App\Models\Kerjaya;
use App\Models\YuranPendaftaran;
use App\Models\YuranPilihan;
use App\Models\YuranAsrama;
use App\Models\YuranPengajian;
use App\Models\Elaun;

class Kursus extends Model
{
    protected $table = 'kursuses';

    protected $fillable = [
        'kod_kursus',
        'kod_institusi',
        'nama_kursus',
        'jenis_kursus',
        'mod_pengajian',
        'tempoh',
        'kuota',
        'tarikh_pendaftaran',
        'penerangan',
    ];

    protected $casts = [
        'tarikh_pendaftaran' => 'date',
    ];

    public function getKodKursusAttribute($value)
    {
        return is_string($value) ? trim($value) : $value;
    }

    public function setKodKursusAttribute($value): void
    {
        $this->attributes['kod_kursus'] = is_string($value) ? trim($value) : $value;
    }

    public function getKodInstitusiAttribute($value)
    {
        return is_string($value) ? trim($value) : $value;
    }

    public function setKodInstitusiAttribute($value): void
    {
        $this->attributes['kod_institusi'] = is_string($value) ? trim($value) : $value;
    }

    public function institusi()
    {
        return $this->belongsTo(Institusi::class, 'kod_institusi', 'kod_institusi');
    }

    public function galeris()
    {
        return $this->hasMany(Galeri::class, 'kod_kursus', 'kod_kursus');
    }

    public function syaratKelayakans()
    {
        return $this->hasMany(SyaratKelayakan::class, 'kod_kursus', 'kod_kursus');
    }

    public function silibuses()
    {
        return $this->hasMany(Silibus::class, 'kod_kursus', 'kod_kursus');
    }

    public function kerjayas()
    {
        return $this->hasMany(Kerjaya::class, 'kod_kursus', 'kod_kursus');
    }

    public function yuranPendaftarans()
    {
        return $this->hasMany(YuranPendaftaran::class, 'kod_kursus', 'kod_kursus');
    }

    public function yuranPilihans()
    {
        return $this->hasMany(YuranPilihan::class, 'kod_kursus', 'kod_kursus');
    }

    public function yuranAsramas()
    {
        return $this->hasMany(YuranAsrama::class, 'kod_kursus', 'kod_kursus');
    }

    public function yuranPengajians()
    {
        return $this->hasMany(YuranPengajian::class, 'kod_kursus', 'kod_kursus');
    }

    public function elauns()
    {
        return $this->hasMany(Elaun::class, 'kod_kursus', 'kod_kursus');
    }
}
