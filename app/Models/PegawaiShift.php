<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PegawaiShift extends Model
{
    protected $table = 'pegawai_shift';

    protected $fillable = [
        'pegawai_id',
        'shift_id',

        'tgl'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }

}
