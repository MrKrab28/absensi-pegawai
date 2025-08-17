<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    protected $table = 'work_type';

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }
}
