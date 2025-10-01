<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpDesk extends Model
{
    protected $table = 'help_desk';
    protected $fillable = [
        'pegawai_id',
        'keterangan',
        'status',
    ];

    public function pegawai()  {

        return $this->belongsTo(Pegawai::class);
    }

}
