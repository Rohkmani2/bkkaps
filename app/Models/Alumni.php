<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';
    protected $autoincrement = 'id';
    protected $fillable = [
        'nama', 'email', 'telepon', 'nik', 'password','jenis_kelamin', 'alamat', 'kota', 'agama', 'sekolah', 'jurusan', 'thn_lulus', 'usia', 'tt', 'tb'
    ];
}
