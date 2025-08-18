<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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
});
