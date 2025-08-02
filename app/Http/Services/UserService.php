<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function getAll()
    {
        return $this->UserRepository->getAll();
    }

    public function find($id)
    {
        return $this->UserRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->UserRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->UserRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->UserRepository->delete($id);
    }
}