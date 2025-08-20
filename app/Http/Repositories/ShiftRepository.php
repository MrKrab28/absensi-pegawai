<?php

namespace App\Http\Repositories;

use App\Models\Shift;

class ShiftRepository
{
    public function getAll()
    {
        return Shift::all();
    }

    public function getById($id)
    {
        return Shift::findOrFail($id);
    }

    public function create(array $data)
    {
        return Shift::create($data);
    }

    public function update($id, array $data)
    {
        $item = Shift::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return Shift::destroy($id);
    }
}