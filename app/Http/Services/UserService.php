<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;


class UserService
{
    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function getAll()
    {
        return $this->UserRepository->getAllUser();
    }

    public function getById($id)
    {
        return $this->UserRepository->getById($id);
    }

    public function create(array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        return $this->UserRepository->create($data);
    }

    public function update($id, array $data)
    {
        if (array_key_exists('password', $data)) {
            if ($data['password']) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }
        }
        return $this->UserRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->UserRepository->delete($id);
    }
}
