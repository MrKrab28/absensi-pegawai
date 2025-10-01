<?php

namespace App\Http\Services;

use App\Http\Repositories\HelpDeskRepository;

class HelpDeskService
{
    protected $HelpDeskRepository;

    public function __construct(HelpDeskRepository $HelpDeskRepository)
    {
        $this->HelpDeskRepository = $HelpDeskRepository;
    }

    public function getAll()
    {
        return $this->HelpDeskRepository->getAll();
    }

    public function getById($id)
    {
        return $this->HelpDeskRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->HelpDeskRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->HelpDeskRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->HelpDeskRepository->delete($id);
    }
}