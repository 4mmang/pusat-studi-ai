<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tentang-kami', function () {
    return view('tentang-kami');
});

Route::get('/statistik', function () {
    return view('statistik.index');
});

Route::get('/data/publikasi', function () {
    return view('data-publikasi.index');
});

Route::get('/login', function(){
    return view('auth.login');
});
