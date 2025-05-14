<?php

use Illuminate\Support\Facades\Route;
route::get('/', function () {
    return view('landing_page');
});

Route::get('/custom-login', function () {
    return view('login');
});

Route::get('/custom-register', function () {
    return view('register');
});