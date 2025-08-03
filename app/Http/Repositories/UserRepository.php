<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllUser()
    {
        return User::select('id', 'nama', 'email')->get();
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function create($data)
    {

        return User::create($data);
    }

    public function update($id, $data)
    {

        return User::find($id)->update($data);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}
