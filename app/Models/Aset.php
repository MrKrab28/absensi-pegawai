<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aset extends Model
{
    use HasFactory;
    protected $table = 'aset';
    protected $fillable = [
        'kode',
        'nama',
        'merk',
        'type',
        'no_seri',
        'lokasi',
        'status',
        'waktu_kalibrasi',
    ];

    // public function getHariSejakKalibrasiAttribute()
    // {
    //     if (empty($this->waktu_kalibrasi)) {
    //         return null;
    //     }

    //     // Pastikan hasil integer, bukan pecahan
    //     return (int) Carbon::parse($this->waktu_kalibrasi)->diffInDays(Carbon::now());
    // }

    /**
     * Mutator: menyimpan waktu_kalibrasi dengan format Y-m-d
     */
    public function setWaktuKalibrasiAttribute($value)
    {
        $this->attributes['waktu_kalibrasi'] = Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Hitung jumlah hari menuju atau sejak kalibrasi berikutnya (tiap tahun)
     */
    public function getHariSejakKalibrasiAttribute()
    {
        if (!$this->waktu_kalibrasi) {
            return null;
        }

        $kalibrasiTerakhir = Carbon::parse($this->waktu_kalibrasi);
        $kalibrasiBerikutnya = $kalibrasiTerakhir->copy()->addYear(); // tiap tahun

        // Selisih hari (bisa negatif jika sudah lewat)
        $selisihHari = Carbon::now()->diffInDays($kalibrasiBerikutnya, false);

        // Pastikan hasil integer bersih
        return (int) $selisihHari;
    }

    /**
     * Badge warna untuk status kalibrasi
     */
    public function getKalibrasiBadgeAttribute()
    {
        $hari = $this->hari_sejak_kalibrasi;

        if (is_null($hari)) return '<span class="badge bg-secondary">-</span>';

        if ($hari > 180) {
            return '<span class="badge bg-success">' . $hari . ' Hari</span>'; // < 6 bulan
        } elseif ($hari > 90) {
            return '<span class="badge bg-warning text-dark">' . $hari . ' Hari</span>'; // 6-9 bulan
        } else {
            return '<span class="badge bg-danger">' . $hari . ' Hari</span>'; // > 9 bulan
        }
    }
}
