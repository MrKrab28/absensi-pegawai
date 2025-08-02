<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAll()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $item = User::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}