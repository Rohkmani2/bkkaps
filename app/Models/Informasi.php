<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';
    protected $autoincrement = 'id';
    protected $fillable = [
        'judul','foto', 'detail', 'file', 'tgl_post', 
    ];
}
