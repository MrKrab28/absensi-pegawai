<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Authenticatable
{
    protected $table = 'pegawai';

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'no_hp',
        'tgl_lahir',
        'jk',
        'alamat',
        'department_id',
        'jabatan_id',
        'work_type_id',
        'status_pegawai_id',
        'foto',
        'password'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function work_type()
    {
        return $this->belongsTo(WorkType::class);
    }

    public function status_pegawai()
    {
        return $this->belongsTo(StatusPegawai::class);
    }

    public function pegawai_shifts()
    {
        return $this->hasMany(PegawaiShift::class);
    }

}
