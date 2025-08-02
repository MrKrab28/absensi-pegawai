<?php

namespace App\Repositories;

use App\Models\Pegawai;

class PegawaiRepository
{
    public function getAll()
    {
        return Pegawai::all();
    }

    public function find($id)
    {
        return Pegawai::findOrFail($id);
    }

    public function create(array $data)
    {
        return Pegawai::create($data);
    }

    public function update($id, array $data)
    {
        $item = Pegawai::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return Pegawai::destroy($id);
    }
}