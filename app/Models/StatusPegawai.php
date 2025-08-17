<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPegawai extends Model
{
    protected $table = 'status_pegawai';

    public $timestamps = false;

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }
}
