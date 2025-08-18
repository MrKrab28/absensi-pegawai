<?php

namespace App\Http\Repositories;

use App\Models\Department;

class DepartmentRepository
{
    public function getAll()
    {
        return Department::all();
    }

    public function getById($id)
    {
        return Department::findOrFail($id);
    }

    public function create(array $data)
    {
        return Department::create($data);
    }

    public function update($id, array $data)
    {
        $item = Department::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return Department::destroy($id);
    }
}
