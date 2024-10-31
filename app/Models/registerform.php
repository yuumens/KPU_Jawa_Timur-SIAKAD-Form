<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterForm extends Model
{
    use HasFactory;

    protected $table = 'users_form'; // Tentukan nama tabel secara eksplisit jika berbeda dari default Laravel

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'nomor_hp',
        'email',
        'tingkat_satker',
        'jabatan',
        'photo',
    ];
}
