<?php

namespace App\Repositories;

use App\Models\Jabatan;

class JabatanRepository
{
    public function getAll()
    {
        return Jabatan::all();
    }

    public function getById($id)
    {
        return Jabatan::findOrFail($id);
    }

    public function create(array $data)
    {
        return Jabatan::create($data);
    }

    public function update($id, array $data)
    {
        $item = Jabatan::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return Jabatan::destroy($id);
    }
}