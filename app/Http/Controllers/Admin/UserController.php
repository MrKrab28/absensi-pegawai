<?php

namespace App\Http\Controllers\Admin;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    protected $userRepository;
    protected $userService;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return view('pages.admin.user.index', [
            'users' => $this->userService->getAll()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->userService->create($data);
        return back()->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id){
        $data = $this->userService->getById($id);
    }

    public function update(Request $request, User $user){
        $data = $request->all();
        $this->userService->update($user->id, $data);
        return redirect()->back()->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user){
        $this->userService->delete($user->id);
        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
