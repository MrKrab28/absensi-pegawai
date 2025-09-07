<?php

namespace App\Http\Repositories;

use App\Models\Absensi;

class AbsensiRepository
{
    public function getAll()
    {
        return Absensi::all();
    }

    public function getById($id)
    {
        return Absensi::findOrFail($id);
    }

    public function create(array $data)
    {
        return Absensi::create($data);
    }

    public function update($id, array $data)
    {
        $item = Absensi::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return Absensi::destroy($id);
    }
}
