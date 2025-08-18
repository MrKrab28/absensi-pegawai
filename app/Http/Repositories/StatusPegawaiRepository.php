<?php

namespace App\Http\Repositories;

use App\Models\StatusPegawai;

class StatusPegawaiRepository
{
    public function getAll()
    {
        return StatusPegawai::all();
    }

    public function getById($id)
    {
        return StatusPegawai::findOrFail($id);
    }

    public function create(array $data)
    {
        return StatusPegawai::create($data);
    }

    public function update($id, array $data)
    {
        $item = StatusPegawai::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return StatusPegawai::destroy($id);
    }
}
