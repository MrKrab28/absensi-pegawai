<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aset;
use App\Exports\AssetsExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AsetController extends Controller
{
    public function index()
    {
        $asets = Aset::all();
        return view('pages.admin.aset', [
            'asets' => $asets
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'no_seri' => 'required',
            'lokasi' => 'required',
            'status' => 'required',
            'waktu_kalibrasi' => 'required',

        ]);

        Aset::create($data);
        return back()->with('success', 'Berhasil menambah Data');
    }

    public function export(Request $request)
    {
        $query = Aset::query();

        // Terapkan filter dari query string
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Ambil data hasil filter
        $filteredAssets = $query->get();

        // Ekspor ke Excel dengan data hasil filter
        return Excel::download(new AssetsExport($filteredAssets), 'data_aset.xlsx');
    }

    public function edit(Aset $aset)
    {
        return view('pages.admin.aset-edit', [
            'aset' => $aset
        ]);
    }

    public function update(Request $request, Aset $aset)
    {
        $data = $request->all();
        $aset = Aset::find($aset->id);
        $aset->update($data);
        return redirect()->back()->with('success', 'Berhasil mengupdate Data');
    }

    public function destroy(Aset $aset)
    {
        $aset->delete();
        return response()->json([
            'message' => 'Aset berhasil dihapus',
            'success' => true
        ]);
    }
}
