<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(){
        return view('pages.admin.pegawai');
    }

    public function create(){
        return view('pages.admin.pegawai-create');
    }

    public function edit(){
        return view('pages.admin.pegawai-edit');
    }

    public function update(){
        return view('pages.admin.pegawai-update');
    }

    public function destroy(){
        return view('pages.admin.pegawai-destroy');
    }
}
