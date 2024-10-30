<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registerform extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'nomor_hp',
        'email',
        'tingkat_satker',
        'jabatan',
    ];
}
