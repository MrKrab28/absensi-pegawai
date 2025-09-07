<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\JabatanService;
use App\Http\Controllers\Controller;
use App\Http\Repositories\JabatanRepository;
use App\Models\Jabatan;
use App\Models\User;

class JabatanController extends Controller
{
    protected $jabatanService;
    protected $jabatanRepository;

    public function __construct(JabatanService $jabatanService, JabatanRepository $jabatanRepository)

    {
        $this->jabatanService = $jabatanService;
        $this->jabatanRepository = $jabatanRepository;
    }

    public function index(){

        return view('pages.admin.jabatan',[
            'jabatans' => $this->jabatanService->getAll()
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        $this->jabatanService->create($data);
        return back()->with('success', 'Berhasil menambah Data');
    }

    public function edit(Jabatan $jabatan)
    {
        $data = $this->jabatanService->getById($jabatan->id);
        return view('pages.admin.jabatan-edit', [
            'jabatan' => $data
        ]);
    }

    public function update(Jabatan $jabatan){

        $data = request()->all();
        $this->jabatanService->update($jabatan->id, $data);
        return back()->with('success', 'Berhasil mengupdate Data');
    }

    public function destroy(Jabatan $jabatan){
        $this->jabatanService->delete($jabatan->id);
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
