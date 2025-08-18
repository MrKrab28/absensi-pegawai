<?php

namespace App\Services;

use App\Repositories\JabatanRepository;

class JabatanService
{
    protected $JabatanRepository;

    public function __construct(JabatanRepository $JabatanRepository)
    {
        $this->JabatanRepository = $JabatanRepository;
    }

    public function getAll()
    {
        return $this->JabatanRepository->getAll();
    }

    public function getById($id)
    {
        return $this->JabatanRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->JabatanRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->JabatanRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->JabatanRepository->delete($id);
    }
}