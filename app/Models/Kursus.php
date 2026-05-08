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

    private const ELECTRICAL_COURSE_GROUP_NAME = 'PEMASANGAN & PENYELENGGARAAN ELEKTRIK';

    private const SCOPED_DETAIL_RELATIONS = [
        'galeris' => Galeri::class,
        'syaratKelayakans' => SyaratKelayakan::class,
        'silibuses' => Silibus::class,
        'kerjayas' => Kerjaya::class,
        'yuranPendaftarans' => YuranPendaftaran::class,
        'yuranPilihans' => YuranPilihan::class,
        'yuranAsramas' => YuranAsrama::class,
        'yuranPengajians' => YuranPengajian::class,
        'elauns' => Elaun::class,
    ];

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

    public function getNamaKursusPaparanAttribute(): string
    {
        return self::canonicalCourseName($this->nama_kursus, $this->kod_kursus);
    }

    public function getKumpulanKursusKeyAttribute(): string
    {
        return self::courseGroupKey($this->nama_kursus, $this->kod_kursus);
    }

    public static function canonicalCourseName(?string $namaKursus, ?string $kodKursus = null): string
    {
        if (self::isElectricalInstallationCourse($namaKursus, $kodKursus)) {
            return self::ELECTRICAL_COURSE_GROUP_NAME;
        }

        return trim((string) $namaKursus);
    }

    public static function courseGroupKey(?string $namaKursus, ?string $kodKursus = null): string
    {
        if (self::isElectricalInstallationCourse($namaKursus, $kodKursus)) {
            return 'f432-005-elektrik';
        }

        return strtolower(trim((string) $namaKursus));
    }

    public function scopeEquivalentToCourse($query, ?string $namaKursus)
    {
        $canonicalName = self::canonicalCourseName($namaKursus);

        if ($canonicalName === self::ELECTRICAL_COURSE_GROUP_NAME) {
            return $query->where('kod_kursus', 'LIKE', '%F432-005%');
        }

        return $query->where('nama_kursus', trim((string) $namaKursus));
    }

    private static function isElectricalInstallationCourse(?string $namaKursus, ?string $kodKursus = null): bool
    {
        $normalizedCode = strtoupper((string) $kodKursus);
        $normalizedName = strtolower(trim((string) $namaKursus));

        if (str_contains($normalizedCode, 'F432-005')) {
            return true;
        }

        return in_array($normalizedName, [
            'elektrik',
            'elektrik & elektronik',
            'pemasangan & penyelenggaraan elektrik',
            'pemasangan & penyelenggaraan elektrik (single tier)',
        ], true);
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

    public function loadScopedCourseDetails(array|string|null $relations = null): self
    {
        $relations = $relations === null
            ? array_keys(self::SCOPED_DETAIL_RELATIONS)
            : (array) $relations;

        foreach ($relations as $relation) {
            if (! isset(self::SCOPED_DETAIL_RELATIONS[$relation])) {
                continue;
            }

            $modelClass = self::SCOPED_DETAIL_RELATIONS[$relation];

            $this->setRelation($relation, $modelClass::where('kod_kursus', $this->kod_kursus)
                ->where('kod_institusi', $this->kod_institusi)
                ->get());
        }

        return $this;
    }
}
