<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $table = 'keahlian';
    protected $fillable = ['biodata_id', 'nama'];
}
