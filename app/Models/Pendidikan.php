<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    protected $fillable = ['biodata_id', 'institusi', 'jurusan', 'periode'];
}
