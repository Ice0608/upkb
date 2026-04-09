<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'nama_event',
        'lokasi',
        'tarikh_event',
        'masa_event',
        'PIC',
    ];

    protected $dates = [
        'tarikh_event',
    ];
}
