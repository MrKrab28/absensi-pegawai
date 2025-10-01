<?php

namespace App\Http\Repositories;

use App\Models\HelpDesk;

class HelpDeskRepository
{
    public function getAll()
    {
        return HelpDesk::all();
    }

    public function getById($id)
    {
        return HelpDesk::findOrFail($id);
    }

    public function create(array $data)
    {
        return HelpDesk::create($data);
    }

    public function update($id, array $data)
    {
        $item = HelpDesk::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return HelpDesk::destroy($id);
    }
}