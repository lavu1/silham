<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');//welcome
});

Route::get('/home', function () {
    return view('pages.home');
});
