<?php

namespace App\Services;

use App\Repositories\StatusPegawaiRepository;

class StatusPegawaiService
{
    protected $StatusPegawaiRepository;

    public function __construct(StatusPegawaiRepository $StatusPegawaiRepository)
    {
        $this->StatusPegawaiRepository = $StatusPegawaiRepository;
    }

    public function getAll()
    {
        return $this->StatusPegawaiRepository->getAll();
    }

    public function getById($id)
    {
        return $this->StatusPegawaiRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->StatusPegawaiRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->StatusPegawaiRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->StatusPegawaiRepository->delete($id);
    }
}