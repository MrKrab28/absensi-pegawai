<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\JabatanService;
use App\Http\Controllers\Controller;
use App\Http\Repositories\JabatanRepository;

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

    public function create(){

        return view('pages.admin.jabatan-create');
    }

    public function edit()
    {
        return view('pages.admin.jabatan-edit');
    }

    public function update(){
        return view('pages.admin.jabatan-update');
    }

    public function destroy(){
        return view('pages.admin.jabatan-destroy');
    }
}
