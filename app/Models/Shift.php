<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{

    protected $table = 'shift';
    protected $fillable = ['code', 'nama', 'start_time', 'end_time'];
   protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->code) {
                $lastCode = self::latest('id')->first()?->code; // ambil code terakhir
                $number = $lastCode ? intval(substr($lastCode, 2)) + 1 : 1; // ambil angka setelah "D-"
                $model->code = 'P-' . $number;
            }
        });
    }

    public function pegawai_shifts()
    {
        return $this->hasMany(PegawaiShift::class);
    }
}
