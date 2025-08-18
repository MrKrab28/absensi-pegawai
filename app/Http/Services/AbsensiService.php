<?php

namespace App\Services;

use App\Repositories\AbsensiRepository;

class AbsensiService
{
    protected $AbsensiRepository;

    public function __construct(AbsensiRepository $AbsensiRepository)
    {
        $this->AbsensiRepository = $AbsensiRepository;
    }

    public function getAll()
    {
        return $this->AbsensiRepository->getAll();
    }

    public function getById($id)
    {
        return $this->AbsensiRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->AbsensiRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->AbsensiRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->AbsensiRepository->delete($id);
    }
}