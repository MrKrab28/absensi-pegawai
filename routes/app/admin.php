<?php

use App\Models\Jabatan;
use App\Models\WorkType;
use App\Models\StatusPegawai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ShiftController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\WorkTypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PegawaiShiftController;
use App\Http\Controllers\Admin\StatusPegawaiController;

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

    // STATUS PEGAWAI
    Route::get('/status-pegawai', [StatusPegawaiController::class, 'index'])->name('status-pegawai');
    Route::post('/status-pegawai/store', [StatusPegawaiController::class, 'store'])->name('status-pegawai-store');
    Route::get('/status-pegawai/{status}/edit', [StatusPegawaiController::class, 'edit'])->name('status-pegawai-edit');
    Route::put('/status-pegawai/{status}', [StatusPegawaiController::class, 'update'])->name('status-pegawai-update');
    Route::delete('/status-pegawai/{status}', [StatusPegawaiController::class, 'destroy'])->name('status-pegawai-delete');

    // WORK TYPE
    Route::get('/work-type', [WorkTypeController::class, 'index'])->name('work-type');
    Route::post('/work-type/store', [WorkTypeController::class, 'store'])->name('work-type-store');
    Route::get('/work-type/{workType}/edit', [WorkTypeController::class, 'edit'])->name('work-type-edit');
    Route::put('/work-type/{workType}', [WorkTypeController::class, 'update'])->name('work-type-update');
    Route::delete('/work-type/{workType}', [WorkTypeController::class, 'destroy'])->name('work-type-delete');

    // SHIFT
    Route::get('/shift', [ShiftController::class, 'index'])->name('shift');
    Route::post('/shift/store', [ShiftController::class, 'store'])->name('shift-store');
    Route::get('/shift/{shift}/edit', [ShiftController::class, 'edit'])->name('shift-edit');
    Route::put('/shift/{shift}', [ShiftController::class, 'update'])->name('shift-update');
    Route::delete('/shift/{shift}', [ShiftController::class, 'destroy'])->name('shift-delete');

    // PEGAWAI SHIFT
    Route::get('/pegawai-shift', [PegawaiShiftController::class, 'index'])->name('pegawai-shift');
    Route::post('/pegawai-shift/store', [PegawaiShiftController::class, 'store'])->name('pegawai-shift-store');
    Route::get('/pegawai-shift/{pegawaiShift}/edit', [PegawaiShiftController::class, 'edit'])->name('pegawai-shift-edit');
    Route::put('/pegawai-shift/{pegawaiShift}', [PegawaiShiftController::class, 'update'])->name('pegawai-shift-update');
    Route::delete('/pegawai-shift/{pegawaiShift}', [PegawaiShiftController::class, 'destroy'])->name('pegawai-shift-delete');

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi-store');
    Route::get('/absensi/{absensi}/edit', [AbsensiController::class, 'edit'])->name('absensi-edit');
    Route::put('/absensi/{absensi}', [AbsensiController::class, 'update'])->name('absensi-update');
    Route::delete('/absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi-delete');
});
