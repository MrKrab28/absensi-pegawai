<?php

namespace App\http\Services;

use App\Http\Repositories\AbsensiRepository;
use Illuminate\Support\Facades\Storage;

class AbsensiService
{
    protected $repository;

    public function __construct(AbsensiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function absenMasuk(array $data)
    {
        $filename = null;
        $dayDate = now()->translatedFormat('l-Y-m-d');
        if (isset($data['foto'])) {
            $file = $data['foto'];
            $filename = 'absensi-' . $data['pegawai_id'] . '-' . $dayDate . '-' . time() . '.' . $file->extension();
            $file->move(public_path('img/absensi'), $filename);
        }



        return $this->repository->create([
            'pegawai_id'  => $data['pegawai_id'],
            'shift_id'    => $data['shift_id'],
            'waktu_masuk' => now(),
            'foto'        => $filename ?? null,
            'longitude'   => $data['longitude'] ?? null,
            'latitude'    => $data['latitude'] ?? null,
            'status'      => 'hadir',
        ]);
    }

    public function absenKeluar($pegawaiId, $shiftId)
    {
        $absensi = $this->repository->findByPegawaiAndShift($pegawaiId, $shiftId);

        if (!$absensi) {
            return null;
        }

        return $this->repository->update($absensi, [
            'waktu_keluar' => now(),
        ]);
    }
}
