<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
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

    private const COURSE_GROUPS = [
        'kulinari' => [
            'label' => 'KULINARI',
            'patterns' => ['kulinari', 'penyediaan & pengeluaran makanan', 'operasi seni kulinari', 'operasi servis makanan'],
        ],
        'kimpalan' => [
            'label' => 'KIMPALAN',
            'patterns' => ['kimpalan', 'proses kimpalan', 'arka kepingan logam'],
        ],
        'komputer' => [
            'label' => 'KOMPUTER',
            'patterns' => ['operasi sistem komputer', 'rangkaian komputer'],
        ],
        'pendidikan-awal-kanak-kanak' => [
            'label' => 'PENDIDIKAN AWAL KANAK KANAK',
            'patterns' => [
                'pendidikan awal kanak',
                'pendidikan awal kanak-kanak',
                'pendidikan kanak-kanak awal',
                'guru pendidikan awal kanak',
                'pengurusan awal kanak',
                'pengurusan penjagaan dan pendidikan kanak',
            ],
        ],
        'pengurusan-pejabat' => [
            'label' => 'PENGURUSAN PEJABAT',
            'patterns' => ['pengurusan pejabat', 'pengurusan & pentadbiran pejabat', 'pentadbiran pejabat'],
        ],
        'kecantikan' => [
            'label' => 'KECANTIKAN',
            'patterns' => ['kecantikan', 'estetik'],
        ],
        'automotif' => [
            'label' => 'AUTOMOTIF',
            'patterns' => ['automotif', 'teknologi automotif', 'servis kenderaan ringan', 'perkhidmatan pembaikan', 'kenderaan ringan'],
        ],
        'automasi-industri' => [
            'label' => 'AUTOMASI INDUSTRI',
            'patterns' => ['automasi industri', 'perkhidmatan kejuruteraan automasi industri'],
        ],
    ];

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
        return strtoupper(self::canonicalCourseName($this->nama_kursus, $this->kod_kursus));
    }

    public function getKumpulanKursusKeyAttribute(): string
    {
        return self::courseGroupKey($this->nama_kursus, $this->kod_kursus);
    }

    public static function canonicalCourseName(?string $namaKursus, ?string $kodKursus = null): string
    {
        $namaKursus = self::normalizeCourseName($namaKursus);

        if ($groupName = self::canonicalCourseGroupName($namaKursus, $kodKursus)) {
            return $groupName;
        }

        if (self::isElectricalInstallationCourse($namaKursus, $kodKursus)) {
            return self::ELECTRICAL_COURSE_GROUP_NAME;
        }

        $namaKursus = str_replace(['–', '—'], '-', (string) $namaKursus);
        $namaKursus = trim($namaKursus);
        $parts = preg_split('/(?:\s+-\s+|\s+-|-\s+)/', $namaKursus);

        if (count($parts) > 1) {
            return trim($parts[0]);
        }

        return $namaKursus;
    }

    public static function courseGroupKey(?string $namaKursus, ?string $kodKursus = null): string
    {
        if ($groupName = self::canonicalCourseGroupName($namaKursus, $kodKursus)) {
            return Str::slug($groupName, '-');
        }

        if (self::isElectricalInstallationCourse($namaKursus, $kodKursus)) {
            return 'f432-005-elektrik';
        }

        $namaKursus = str_replace(['–', '—'], '-', (string) $namaKursus);
        $namaKursus = trim($namaKursus);
        $parts = preg_split('/(?:\s+-\s+|\s+-|-\s+)/', $namaKursus);

        if (count($parts) > 1) {
            $namaKursus = trim($parts[0]);
        }

        return Str::slug($namaKursus, '-');
    }

    public function scopeEquivalentToCourse($query, ?string $namaKursus)
    {
        $canonicalName = self::canonicalCourseName($namaKursus);

        if ($canonicalName === self::ELECTRICAL_COURSE_GROUP_NAME) {
            return $query->where('kod_kursus', 'LIKE', '%F432-005%');
        }

        if ($canonicalName === 'KULINARI') {
            return $query->where(function ($subQuery) {
                $subQuery->where('nama_kursus', 'LIKE', '%kulinari%')
                    ->orWhere('nama_kursus', 'LIKE', '%penyediaan & pengeluaran makanan%')
                    ->orWhere('nama_kursus', 'LIKE', '%operasi seni kulinari%')
                    ->orWhere('nama_kursus', 'LIKE', '%operasi servis makanan%');
            });
        }

        if ($canonicalName === 'KIMPALAN') {
            return $query->where(function ($subQuery) {
                $subQuery->where('nama_kursus', 'LIKE', '%kimpalan%')
                    ->orWhere('nama_kursus', 'LIKE', '%proses kimpalan%')
                    ->orWhere('nama_kursus', 'LIKE', '%arka kepingan logam%');
            });
        }

        if ($canonicalName === 'KOMPUTER') {
            return $query->where(function ($subQuery) {
                $subQuery->where('nama_kursus', 'LIKE', '%operasi sistem komputer%')
                    ->orWhere('nama_kursus', 'LIKE', '%rangkaian komputer%');
            });
        }

        if ($canonicalName === 'PENDIDIKAN AWAL KANAK KANAK') {
            return $query->where(function ($subQuery) {
                $subQuery->where('nama_kursus', 'LIKE', '%pendidikan awal kanak%')
                    ->orWhere('nama_kursus', 'LIKE', '%pendidikan kanak-kanak awal%')
                    ->orWhere('nama_kursus', 'LIKE', '%guru pendidikan awal kanak%')
                    ->orWhere('nama_kursus', 'LIKE', '%pengurusan awal kanak%')
                    ->orWhere('nama_kursus', 'LIKE', '%pengurusan penjagaan dan pendidikan kanak%')
                    ->orWhere('nama_kursus', 'LIKE', '%pengurusan awal kanak%');
            });
        }

        if ($canonicalName === 'PENGURUSAN PEJABAT') {
            return $query->where('nama_kursus', 'LIKE', '%pengurusan pejabat%');
        }

        if ($canonicalName === 'KECANTIKAN') {
            return $query->where(function ($subQuery) {
                $subQuery->where('nama_kursus', 'LIKE', '%kecantikan%')
                    ->orWhere('nama_kursus', 'LIKE', '%estetik%');
            });
        }

        if ($canonicalName === 'AUTOMOTIF') {
            return $query->where(function ($subQuery) {
                $subQuery->where('nama_kursus', 'LIKE', '%automotif%')
                    ->orWhere('nama_kursus', 'LIKE', '%teknologi automotif%')
                    ->orWhere('nama_kursus', 'LIKE', '%servis kenderaan ringan%')
                    ->orWhere('nama_kursus', 'LIKE', '%perkhidmatan pembaikan%');
            });
        }

        if ($canonicalName === 'AUTOMASI INDUSTRI') {
            return $query->where(function ($subQuery) {
                $subQuery->where('nama_kursus', 'LIKE', '%automasi industri%')
                    ->orWhere('nama_kursus', 'LIKE', '%perkhidmatan kejuruteraan automasi industri%');
            });
        }

        return $query->where('nama_kursus', trim((string) $namaKursus));
    }

    private static function canonicalCourseGroupName(?string $namaKursus, ?string $kodKursus = null): ?string
    {
        $normalized = self::normalizeCourseName($namaKursus);
        $normalized = strtolower(trim($normalized));
        $parts = preg_split('/(?:\s+-\s+|\s+-|-\s+)/', $normalized);

        if (count($parts) > 1) {
            $normalized = trim($parts[0]);
        }

        foreach (self::COURSE_GROUPS as $group) {
            foreach ($group['patterns'] as $pattern) {
                if (str_contains($normalized, strtolower($pattern))) {
                    return $group['label'];
                }
            }
        }

        return null;
    }

    private static function normalizeCourseName(?string $namaKursus): string
    {
        $namaKursus = str_replace(['–', '—'], '-', (string) $namaKursus);
        $namaKursus = preg_replace('/\s*\(\s*single[\s-]*tier\s*\)\s*/i', '', $namaKursus);

        return trim($namaKursus);
    }

    private static function isElectricalInstallationCourse(?string $namaKursus, ?string $kodKursus = null): bool
    {
        $normalizedCode = strtoupper((string) $kodKursus);
        $normalizedName = strtolower(self::normalizeCourseName($namaKursus));

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
