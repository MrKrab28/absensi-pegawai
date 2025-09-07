<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\AbsensiService;

class AbsensiController extends Controller
{
    protected $absensiService;
    public function __construct(AbsensiService $absensiService)
    {
        $this->absensiService = $absensiService;
    }

    public function index()
    {

        return view('pages.admin.absensi', [
            'absensis' => $this->absensiService->getAll()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pegawai_id' => 'required',
            'shift_id' => 'required',
            'tanggal' => 'required',
            'foto' => 'required',
            'status' => 'required',
        ]);

        $this->absensiService->create($data);
        return back()->with('success', 'Berhasil menambah Data');
    }

public function edit(Absensi $absensi)
    {
        return view('pages.admin.absensi.edit', [
            'absensi' => $absensi
        ]);
    }

    public function update(Request $request, Absensi $absensi)
    {
        $data = $request->validate([
            'pegawai_id' => 'required',
            'shift_id' => 'required',
            'tanggal' => 'required',
            'foto' => 'required',
            'status' => 'required',
        ]);
        $this->absensiService->update($absensi->id, $data);
        return back()->with('success', 'Berhasil mengupdate Data');
    }

    public function destroy(Absensi $absensi)
    {
        $this->absensiService->delete($absensi->id);
        return back()->with('success', 'Berhasil menghapus Data');
    }
}
