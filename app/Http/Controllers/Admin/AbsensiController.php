<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        return view('pages.admin.absensi');
    }
    public function absenMasuk(Request $request)
    {
        $request->validate([
            'shift_id'  => 'required|exists:shift,id',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'longitude' => 'nullable|numeric',
            'latitude'  => 'nullable|numeric',
        ]);

        $data = [
            'pegawai_id' => Auth::id(),
            'shift_id'   => $request->shift_id,
            'foto'       => $request->file('foto'),
            'longitude'  => $request->longitude,
            'latitude'   => $request->latitude,
        ];

        $absensi = $this->absensiService->absenMasuk($data);

        return response()->json([
            'message' => 'Absensi masuk berhasil dicatat',
            'data'    => $absensi,
        ]);
    }

    public function absenKeluar(Request $request)
    {
        $request->validate([
            'shift_id' => 'required|exists:shift,id',
        ]);

        $absensi = $this->absensiService->absenKeluar(Auth::id(), $request->shift_id);

        if (!$absensi) {
            return response()->json(['message' => 'Absensi masuk belum ada'], 404);
        }

        return response()->json([
            'message' => 'Absensi keluar berhasil dicatat',
            'data'    => $absensi,
        ]);
    }
}
