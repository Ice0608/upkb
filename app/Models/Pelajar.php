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
        'email_bapa',
        'nama_ibu',
        'ic_ibu',
        'no_tel_ibu',
        'email_ibu',
        'jumlah_tanggungan',
        'str',
        'pilihan_pertama',
        'pilihan_kedua',
        'pilihan_ketiga',
    ];

    protected $casts = [
        'tarikh_pendaftaran' => 'date',
        'str' => 'boolean',
    ];

    public function setAttribute($key, $value)
    {
        if (is_string($value) && in_array($key, $this->fillable, true) && ! in_array($key, ['program', 'email', 'email_bapa', 'email_ibu'], true)) {
            $value = strtoupper(trim($value));
        }

        return parent::setAttribute($key, $value);
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
