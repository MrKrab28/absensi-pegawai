<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\WorkTypeService;
use App\Http\Controllers\Controller;
use App\Models\WorkType;

class WorkTypeController extends Controller
{
    protected $workTypeService;
     public function __construct(WorkTypeService $workTypeService)
     {
         $this->workTypeService = $workTypeService;
     }

     public function index(){
         $workTypes = $this->workTypeService->getAll();
         return view('pages.admin.work-type', ['workTypes' => $workTypes]);
     }

     public function store(Request $request){
        $data = $request->all();
        $this->workTypeService->create($data);
        return back()->with('success', 'Berhasil menambahkan Data');
     }

     public function edit(WorkType $workType){
         $workType = $this->workTypeService->getById($workType->id);
         return view('pages.admin.work-type-edit', ['workType' => $workType]);
     }

     public function update(WorkType $workType, Request $request){
         $data = $request->validate([
            'nama' => 'required',
         ]);
         $this->workTypeService->update($workType->id, $data);
         return back()->with('success', 'Berhasil mengubah Data');
     }

     public function destroy(WorkType $workType){
         $this->workTypeService->delete($workType->id);
         return back()->with('success', 'Berhasil menghapus Data');
     }

}
