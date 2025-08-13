<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.admin.dashboard');
// });


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin'], 'as' => 'admin.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // USER
    Route::get('/users', [UserController::class, 'index'])->name('user');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user-edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user-update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user-delete');
});
