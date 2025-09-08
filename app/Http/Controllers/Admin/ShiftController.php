<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\ShiftService;
use App\Http\Controllers\Controller;
use App\Models\Shift;

class ShiftController extends Controller
{
    protected $shiftService;

    public function __construct(ShiftService $shiftService)
    {
        $this->shiftService = $shiftService;
    }

    public function index()
    {
        return view('pages.admin.shift', [
            'shifts' => $this->shiftService->getAll()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $this->shiftService->create($data);
        return back()->with('success', 'Berhasil menambah Data');
    }

    public function edit(Shift $shift)
    {
        $data = $this->shiftService->getById($shift->id);
        return view('pages.admin.shift-edit', [
            'shift' => $data
        ]);
    }

    public function update(Request $request, Shift $shift)
    {
        $data = $request->validate([
            'nama' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $this->shiftService->update($shift->id, $data);
        return back()->with('success', 'Berhasil mengupdate Data');
    }

    public function destroy(Shift $shift)
    {
        $this->shiftService->delete($shift->id);
        return response()->json(['message' => 'Data berhasil dihapus', 'success' => true]);
    }
}
