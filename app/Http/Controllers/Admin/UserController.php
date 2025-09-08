<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use Illuminate\Validation\ValidationException;



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
        try {
            $data = $request->validate([
                'nama' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            if ($e->validator->errors()->has('email')) {
                return redirect()->back()->with('error', 'Email sudah terdaftar');
            }
            throw $e;
        }

        $this->userService->create($data);
        return redirect()->back()->with('success', 'User berhasil ditambahkan')->with('action', 'add');
    }

    public function edit(User $user)
    {
        $data = $this->userService->getById($user->id);
        return view('pages.admin.user-edit', [
            'user' => $data
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $this->userService->update($user->id, $data);
        return redirect()->back()->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user->id);
        return response()->json([
            'message' => 'User berhasil dihapus',
            'success' => true
        ]);
    }
}
