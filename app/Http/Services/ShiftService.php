<?php

namespace App\Http\Services;

use App\Http\Repositories\ShiftRepository;

class ShiftService
{
    protected $ShiftRepository;

    public function __construct(ShiftRepository $ShiftRepository)
    {
        $this->ShiftRepository = $ShiftRepository;
    }

    public function getAll()
    {
        return $this->ShiftRepository->getAll();
    }

    public function getById($id)
    {
        return $this->ShiftRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->ShiftRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->ShiftRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->ShiftRepository->delete($id);
    }

    public function allSelect()
    {
        return $this->ShiftRepository->allSelect();
    }
}
