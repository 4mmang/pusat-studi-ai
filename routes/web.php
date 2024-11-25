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

Route::get('/berita', function () {
    return view('berita.index');
});

Route::get('/kontak', function () {
    return view('kontak.index');
});

Route::get('/data/publikasi', function () {
    return view('data-publikasi.index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::prefix('pusat-studi')->group(function () {
    Route::get('artificial-intelligance', function () {
        return view('pusat-studi.index');
    });
    Route::get('artikel', function () {
        return view('pusat-studi.artikel.index');
    });
    Route::get('tentang-kami', function () {
        return view('pusat-studi.tentang-kami');
    });
    Route::get('kinerja-anggota', function () {
        return view('pusat-studi.informasi.kinerja-anggota');
    });
    Route::get('data/penelitian', function () {
        return view('pusat-studi.data.penelitian.index');
    });
    Route::get('data/pengabdian', function () {
        return view('pusat-studi.data.pengabdian.index');
    });
    Route::get('data/publikasi', function () {
        return view('pusat-studi.data.publikasi.index');
    });
    Route::get('anggota', function () {
        return view('pusat-studi.anggota.index');
    });
});
