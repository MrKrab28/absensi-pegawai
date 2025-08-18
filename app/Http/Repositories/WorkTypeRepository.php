<?php

namespace App\Repositories;

use App\Models\WorkType;

class WorkTypeRepository
{
    public function getAll()
    {
        return WorkType::all();
    }

    public function getById($id)
    {
        return WorkType::findOrFail($id);
    }

    public function create(array $data)
    {
        return WorkType::create($data);
    }

    public function update($id, array $data)
    {
        $item = WorkType::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return WorkType::destroy($id);
    }
}