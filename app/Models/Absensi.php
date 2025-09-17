<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = [
        'pegawai_id',
        'shift_id',
        'waktu_masuk',
        'waktu_keluar',
        'foto',
        'longitude',
        'latitude',
        'status',
    ];

     public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
