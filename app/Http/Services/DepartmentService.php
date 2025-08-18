<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService
{
    protected $DepartmentRepository;

    public function __construct(DepartmentRepository $DepartmentRepository)
    {
        $this->DepartmentRepository = $DepartmentRepository;
    }

    public function getAll()
    {
        return $this->DepartmentRepository->getAll();
    }

    public function getById($id)
    {
        return $this->DepartmentRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->DepartmentRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->DepartmentRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->DepartmentRepository->delete($id);
    }
}
