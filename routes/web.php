<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:admin,pegawai,user'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'authenticate'])->name('authenticate');

});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:admin,pegawai,user');
// Route::get('/dashboard', function () {
//     return view('pages.admin.dashboard');
// });


require __DIR__.'/app/admin.php';
require __DIR__.'/app/user.php';
require __DIR__.'/app/pegawai.php';
