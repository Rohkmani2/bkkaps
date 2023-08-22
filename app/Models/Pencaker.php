<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencaker extends Model
{
    use HasFactory;

    protected $table = 'pencaker';
    protected $autoincrement = 'id';

    protected $hidden = [
        'password',
    ];
    protected $fillable = [
        'id_user','nama', 'jenis_kelamin', 'email', 'password', 'nik', 'telepon', 'tempat_lhr', 'alamat', 'agama', 'tgl_lahir', 'usia', 'tb', 'bb', 'vaksin', 'sekolah', 'thn_lulus', 'pengalaman', 'jurusan', 'cv', 'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
