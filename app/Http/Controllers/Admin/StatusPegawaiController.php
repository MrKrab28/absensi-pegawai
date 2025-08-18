<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\StatusPegawai;
use App\Http\Controllers\Controller;
use App\Http\Services\StatusPegawaiService;

class StatusPegawaiController extends Controller
{
    protected $statusPegawaiService;
    public function __construct(StatusPegawaiService $statusPegawaiService)
    {
        $this->statusPegawaiService =  $statusPegawaiService;
    }

    public function index()
    {
        return view('pages.admin.status-pegawai',[
            'statuspegawais' => $this->statusPegawaiService->getAll()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
        ]);
        $this->statusPegawaiService->create($data);
        return back()->with('success', 'Berhasil menambah Data');
    }

    public function edit(StatusPegawai $status)
    {
        $data = $this->statusPegawaiService->getById($status->id);
        return view('pages.admin.status-pegawai-edit', [
            'status' => $data
        ]);
    }

    public function update(Request $request, StatusPegawai $status)
    {
        $data = $request->all();
        $this->statusPegawaiService->update($status->id, $data);
        return back()->with('success', 'Berhasil mengupdate Data');
    }

    public function destroy(StatusPegawai $status)
    {
        $this->statusPegawaiService->delete($status->id);
        return back()->with('success', 'Berhasil menghapus Data');
    }
}
