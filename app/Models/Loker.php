<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;

    protected $table = 'loker';
    protected $autoincrement = 'id';
    protected $fillable = [
        'id_perusahaan', 'posisi', 'usia','pendidikan','lokasi','detail', 'foto', 'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }
}
