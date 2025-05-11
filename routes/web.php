<?php

use Illuminate\Support\Facades\Route;
route::get('/', function () {
    return view('landing_page');
});