<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use Illuminate\Http\Request;

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
        return view('pages.admin.aset-update');
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
