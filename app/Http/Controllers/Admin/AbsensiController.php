<?php

namespace App\Http\Controllers\Admin;

use user;
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
            'foto' => 'required|image|max:2048',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // ambil setting dari config
        $officeLat = -5.103468;
        $officeLng = 119.527957;
        $radiusAllowed = 100;


        $userLat = $request->latitude;
        $userLng = $request->longitude;

        $distance = $this->haversineGreatCircleDistance($officeLat, $officeLng, $userLat, $userLng);

        if ($distance > $radiusAllowed) {
            return back()->withErrors(['lokasi' => 'Anda berada di luar radius absensi (' . round($distance) . ' m)']);
        }

        // simpan foto
        $filename = 'absensi-' . date('Ymd-His') . '.' . $request->file('foto')->extension();
        $path = $request->file('foto')->storeAs('absensi', $filename, 'public');

        Absensi::create([
            'pegawai_id' => Auth::id(),
            'shift_id'   => $request->shift_id,
            'foto'       => $path,
            'latitude'   => $userLat,
            'longitude'  => $userLng,
            'status'     => 'hadir',
            'waktu_masuk' => now(),
        ]);

        return back()->with('success', 'Absensi berhasil!');
    }

    private function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
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
