<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $table = 'lamaran';
    protected $autoincrement = 'id';
    protected $fillable = [
        'nama', 'jenis_kelamin', 'email', 'nik', 'telepon', 'kota', 'alamat', 'agama', 'tgl_lahir', 'usia', 'tb', 'bb', 'vaksin', 'sekolah', 'thn_lulus', 'pengalaman', 'jurusan', 'cv'
    ];
}

