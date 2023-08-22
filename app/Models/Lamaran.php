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
        'id_user','id_perusahaan', 'jenis_kelamin', 'email', 'nik', 'telepon', 'ttl', 'alamat', 'agama', 'tgl_lahir', 'usia', 'tb', 'bb', 'vaksin', 'sekolah', 'thn_lulus', 'pengalaman', 'jurusan', 'cv', 'status'
    ];
    public function loker()
    {
        return $this->belongsTo(Loker::class, 'id_loker');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }
}

