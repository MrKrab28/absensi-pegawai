<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{

    protected $table = 'jabatan';
    protected $fillable = ['code', 'nama', 'deskripsi'];

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
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }
}
