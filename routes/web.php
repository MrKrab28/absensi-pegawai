<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.admin.dashboard');
});


require __DIR__.'/app/admin.php';
require __DIR__.'/app/user.php';
require __DIR__.'/app/pegawai.php';
