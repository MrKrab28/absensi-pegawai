<?php

namespace App\Http\Services;

use App\Http\Repositories\PegawaiShiftRepository;

class PegawaiShiftService
{
    protected $PegawaiShiftRepository;

    public function __construct(PegawaiShiftRepository $PegawaiShiftRepository)
    {
        $this->PegawaiShiftRepository = $PegawaiShiftRepository;
    }

    public function getAll()
    {
        return $this->PegawaiShiftRepository->getAll();
    }

    public function getById($id)
    {
        return $this->PegawaiShiftRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->PegawaiShiftRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->PegawaiShiftRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->PegawaiShiftRepository->delete($id);
    }
}
