<?php

use App\Models\Jabatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;

// Route::get('/', function () {
//     return view('pages.admin.dashboard');
// });


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin'], 'as' => 'admin.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // USER
    Route::get('/users', [UserController::class, 'index'])->name('user');
    Route::post('/users/store', [UserController::class, 'store'])->name('user-store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user-edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user-update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user-delete');

    // PEGAWAI
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai-store');
    Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai-edit');
    Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai-update');
    Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai-delete');

    // JABATAN
    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');
    Route::post('/jabatan/store', [JabatanController::class, 'store'])->name('jabatan-store');
    Route::get('/jabatan/{jabatan}/edit', [JabatanController::class, 'edit'])->name('jabatan-edit');
    Route::put('/jabatan/{jabatan}', [JabatanController::class, 'update'])->name('jabatan-update');
    Route::delete('/jabatan/{jabatan}', [JabatanController::class, 'destroy'])->name('jabatan-delete');

    // DEPARTMENT
    Route::get('/department', [DepartmentController::class, 'index'])->name('department');
    Route::post('/department/store', [DepartmentController::class, 'store'])->name('department-store');
    Route::get('/department/{department}/edit', [DepartmentController::class, 'edit'])->name('department-edit');
    Route::put('/department/{department}', [DepartmentController::class, 'update'])->name('department-update');
    Route::delete('/department/{department}', [DepartmentController::class, 'destroy'])->name('department-delete');
});
