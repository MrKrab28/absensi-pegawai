<?php

namespace App\Http\Repositories;

use App\Models\PegawaiShift;

class PegawaiShiftRepository
{
    public function getAll()
    {
        return PegawaiShift::all();
    }

    public function getById($id)
    {
        return PegawaiShift::findOrFail($id);
    }

    public function create(array $data)
    {
        return PegawaiShift::create($data);
    }

    public function update($id, array $data)
    {
        $item = PegawaiShift::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return PegawaiShift::destroy($id);
    }
   
}
