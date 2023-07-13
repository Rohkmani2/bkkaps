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
        'nama', 'posisi', 'detail', 'foto'
    ];
}
