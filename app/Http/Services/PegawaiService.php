<?php

namespace App\Http\Services;

use App\Http\Repositories\PegawaiRepository;

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

    public function getById($id)
    {
        return $this->PegawaiRepository->getById($id);
    }

    public function create( array $data)
    {
         if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        return $this->PegawaiRepository->create($data);
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
        return $this->PegawaiRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->PegawaiRepository->delete($id);
    }
}
