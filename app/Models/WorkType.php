<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    protected $table = 'work_type';
    protected $fillable = [
        'code',
        'nama',
        'deskripsi',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->code) {
                $lastCode = self::latest('id')->first()?->code; // ambil code terakhir
                $number = $lastCode ? intval(substr($lastCode, 2)) + 1 : 1; // ambil angka setelah "D-"
                $model->code = 'WT-' . $number;
            }
        });
    }

    // public function pegawais()
    // {
    //     return $this->hasMany(Pegawai::class);
    // }
}
