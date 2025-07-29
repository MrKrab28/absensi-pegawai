<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.pegawai.dashboard');
// });


Route::group(['prefix' => 'pegawai', 'middleware' => ['auth:pegawai'], 'as' => 'pegawai.'], function () {


});
