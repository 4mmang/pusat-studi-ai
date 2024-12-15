<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\Data\PublikasiController;
use App\Http\Controllers\Admin\JenisPublikasiController;
use App\Http\Controllers\Admin\SumberDaya\AnggotaController;
use App\Http\Controllers\Admin\SumberDaya\SaranaPraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::get('tentan/g-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

Route::get('/statistik', function () {
    return view('statistik.index');
})->name('statistik');

Route::get('/artikel', function () {
    return view('artikel.index');
})->name('artikel');

Route::get('/kontak', function () {
    return view('kontak.index');
})->name('kontak');

Route::get('/data/publikasi', function () {
    return view('data-publikasi.index');
});

Route::get('/anggota', function () {
    return view('anggota.index');
})->name('anggota');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/penelitian', function () {
    return view('data.penelitian.index');
})->name('penelitian');

Route::get('/pengabdian', function () {
    return view('data.pengabdian.index');
})->name('pengabdian');

Route::get('/publikasi', function () {
    return view('data.publikasi.index');
})->name('publikasi');

Route::get('/kinerja-anggota', function () {
    return view('informasi.kinerja-anggota');
})->name('kinerja-anggota');

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::prefix('/sumber-daya')->group(function () {
        Route::resource('/anggota', AnggotaController::class);
        Route::resource('/sarana-pra', SaranaPraController::class);
    });

    // Route::prefix('/jenis')
    //     ->as('jenis.')
    //     ->group(function () {
    //         Route::resource('/publikasi', JenisPublikasiController::class);
    //     });

    Route::prefix('/data')->group(function () {
        Route::resource('/publikasi', PublikasiController::class);
    });

    Route::resource('/artikel', ArtikelController::class);
});
