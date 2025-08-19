<?php

namespace App\Http\Services;

use App\Http\Repositories\WorkTypeRepository;

class WorkTypeService
{
    protected $WorkTypeRepository;

    public function __construct(WorkTypeRepository $WorkTypeRepository)
    {
        $this->WorkTypeRepository = $WorkTypeRepository;
    }

    public function getAll()
    {
        return $this->WorkTypeRepository->getAll();
    }

    public function getById($id)
    {
        return $this->WorkTypeRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->WorkTypeRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->WorkTypeRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->WorkTypeRepository->delete($id);
    }
}
