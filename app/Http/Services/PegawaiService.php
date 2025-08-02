<?php

namespace App\Services;

use App\Repositories\PegawaiRepository;

class PegawaiService
{
    protected $PegawaiRepository;

    public function __construct(PegawaiRepository $PegawaiRepository)
    {
        $this->PegawaiRepository = $PegawaiRepository;
    }

    public function getAll()
    {
        return $this->PegawaiRepository->getAll();
    }

    public function find($id)
    {
        return $this->PegawaiRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->PegawaiRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->PegawaiRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->PegawaiRepository->delete($id);
    }
}