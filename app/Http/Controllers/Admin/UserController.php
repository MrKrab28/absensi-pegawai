<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;



class UserController extends Controller
{

    protected $userRepository;
    protected $userService;


    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }
    public function index()
    {
        return view('pages.admin.user', [
            'users' => $this->userService->getAll()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->userService->create($data);
        return back()->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user){
        $data = $this->userService->getById($user);
        return view('pages.admin.user-edit', $data);
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
