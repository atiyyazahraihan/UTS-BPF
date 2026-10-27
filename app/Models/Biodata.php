<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'Biodata_1234';   // GANTI 1234 dengan NIM Anda

    protected $fillable = [
        'nama', 'jabatan', 'email', 'telepon', 'alamat', 'tentang', 'foto',
    ];

    public function pengalaman()
    {
        return $this->hasMany(Pengalaman::class, 'biodata_id');
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'biodata_id');
    }

    public function keahlian()
    {
        return $this->hasMany(Keahlian::class, 'biodata_id');
    }
}
