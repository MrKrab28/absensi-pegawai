<?php

use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.user.dashboard');
// });


Route::group(['prefix' => 'user', 'middleware' => ['auth:user'], 'as' => 'user.'], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
