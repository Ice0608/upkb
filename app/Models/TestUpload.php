<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestUpload extends Model
{
    protected $table = 'test_uploads';

    protected $fillable = [
        'original_name',
        'file_name',
        'file_path',
        'mime_type',
        'file_size',
    ];
}
