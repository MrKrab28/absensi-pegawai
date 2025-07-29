<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.user.dashboard');
// });


Route::group(['prefix' => 'user', 'middleware' => ['auth:user'], 'as' => 'user.'], function () {


});
