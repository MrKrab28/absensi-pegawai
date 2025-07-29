<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashabord');
        } elseif (Auth::guard('pegawai')->attempt($credentials)) {
            return redirect()->route('pegawai.dashabord');
        } elseif (Auth::guard('user')->attempt($credentials)) {
            return redirect()->route('user.dashabord');
        }
        return redirect()->route('login');
    }
}
