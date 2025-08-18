<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\DepartmentService;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        return view(
            'pages.admin.department',
            [
                'departments' => $this->departmentService->getAll()
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $this->departmentService->create($data);
        return back()->with('success', 'Berhasil menambah Data');
    }

    public function edit(Department $department)
    {
        $data = $this->departmentService->getById($department->id);
        return view('pages.admin.department-edit', [
            'department' => $data
        ]);
    }

    public function update(Request $request, Department $department)
    {
        $data = $request->all();
        $this->departmentService->update($department->id, $data);
        return back()->with('success', 'Berhasil mengupdate Data');
    }

    public function destroy(Department $department)
    {
        $this->departmentService->delete($department->id);
        return back()->with('success', 'Berhasil menghapus Data');
    }
}
