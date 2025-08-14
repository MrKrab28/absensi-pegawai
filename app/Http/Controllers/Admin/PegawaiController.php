<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\PegawaiService;
use App\Models\User;

class PegawaiController extends Controller
{
    protected $pegawaiService;

    public function __construct(PegawaiService $pegawaiService)
    {
        $this->pegawaiService = $pegawaiService;
    }
    public function index(){

        return view('pages.admin.pegawai', [
            'pegawais' => $this->pegawaiService->getAll()
        ]);
    }

    public function store(Request $request){
        $data = $request->all();
        $this->pegawaiService->create($data);
        return redirect()->back()->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit(User $user){
        $data = $this->pegawaiService->getById($user);
        return view('pages.admin.pegawai-edit');
    }

    public function update(){
        return view('pages.admin.pegawai-update');
    }

    public function destroy(){
        return view('pages.admin.pegawai-destroy');
    }
}
