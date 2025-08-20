<?php

namespace App\Http\Controllers\Admin;

use App\Models\PegawaiShift;
use Illuminate\Http\Request;
use App\Http\Services\ShiftService;
use App\Http\Controllers\Controller;
use App\Http\Services\PegawaiService;
use App\Http\Services\PegawaiShiftService;

class PegawaiShiftController extends Controller
{
    protected $pegawaiShiftService;
    protected $pegawaiService;
    protected $shiftService;

    public function __construct(PegawaiShiftService $pegawaiShiftService, PegawaiService $pegawaiService, ShiftService $shiftService)
    {
        $this->pegawaiShiftService = $pegawaiShiftService;
        $this->pegawaiService = $pegawaiService;
        $this->shiftService = $shiftService;
    }

    public function index()
    {
        return view('pages.admin.shift-pegawai', [
            'pegawaiShifts' => $this->pegawaiShiftService->getAll(),
            'pegawais' => $this->pegawaiService->allSelect(),
            'shifts' => $this->shiftService->allSelect()

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pegawai_id' => 'required',
            'shift_id' => 'required',
            'tgl' => 'required'
        ]);
        $this->pegawaiShiftService->create($data);
        return back()->with('success', 'Berhasil menambah Data');
    }

    public function edit(PegawaiShift $pegawaiShift)
    {
        $data = $this->pegawaiShiftService->getById($pegawaiShift->id);
        return view('pages.admin.shift-pegawai-edit', [
            'pegawaiShift' => $data,
            'pegawais' => $this->pegawaiService->allSelect(),
            'shifts' => $this->shiftService->allSelect()
        ]);
    }

    public function update(Request $request, PegawaiShift $pegawaiShift)
    {
        $data = $request->validate([
            'pegawai_id' => 'required',
            'shift_id' => 'required',
            'tgl' => 'required'
        ]);
        $this->pegawaiShiftService->update($pegawaiShift->id, $data);
        return back()->with('success', 'Berhasil mengupdate Data');
    }

    public function destroy(PegawaiShift $pegawaiShift)
    {
        $this->pegawaiShiftService->delete($pegawaiShift->id);
        return back()->with('success', 'Berhasil menghapus Data');
    }


}
