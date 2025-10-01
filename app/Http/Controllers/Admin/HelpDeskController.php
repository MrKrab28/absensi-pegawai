<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\HelpDeskService;
use App\Models\HelpDesk;
use Illuminate\Http\Request;

class HelpDeskController extends Controller
{
    protected $HelpDeskService;

    public function __construct(HelpDeskService $HelpDeskService)
    {
        $this->HelpDeskService = $HelpDeskService;
    }

    public function index()
    {
        return view('pages.admin.helpDesk', [
            'helpDesks' => $this->HelpDeskService->getAll()
        ]);
    }

    public function edit(HelpDesk $helpDesk)
    {
        $data = $this->HelpDeskService->getById($helpDesk->id);
        return view('pages.admin.helpDesk-edit', ['helpDesk' => $data]);
    }
    public function update(Request $request, HelpDesk $helpDesk)
    {
        $data = $request->all();
        $this->HelpDeskService->update($helpDesk->id, $data);
        return back()->with('success', 'Berhasil Mengubah Data');
    }

    public function destroy(HelpDesk $helpDesk)
    {
     return $this->HelpDeskService->delete($helpDesk->id);
    }
}
