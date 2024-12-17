<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\Data\PenelitianController;
use App\Http\Controllers\Admin\Data\PengabdianController;
use App\Http\Controllers\Admin\Data\PublikasiController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\JenisPublikasiController;
use App\Http\Controllers\Admin\SumberDaya\AnggotaController;
use App\Http\Controllers\Admin\SumberDaya\SaranaPraController;
use App\Models\Artikel;
use App\Models\Event;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Publikasi;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $events = Event::all();
    $artikel = Artikel::take(3)->get();
    return view('welcome', compact('events', 'artikel'));
})->name('beranda');

Route::get('tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

Route::get('/statistik', function () {
    return view('statistik.index');
})->name('statistik');

Route::get('/artikel', function () {
    $artikel = Artikel::all();
    return view('artikel.index', compact('artikel'));
})->name('artikel');

Route::get('/kontak', function () {
    return view('kontak.index');
})->name('kontak');

Route::get('/data/publikasi', function () {
    return view('data-publikasi.index');
});

Route::get('/anggota', function () {
    $anggota = User::all();
    return view('anggota.index', compact('anggota'));
})->name('anggota');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/penelitian', function () {
    $penelitian = Penelitian::all();
    return view('data.penelitian.index', compact('penelitian'));
})->name('penelitian');

Route::get('/pengabdian', function () {
    $pengabdian = Pengabdian::all();
    return view('data.pengabdian.index', compact('pengabdian'));
})->name('pengabdian');

Route::get('/publikasi', function () {
    $publikasi = Publikasi::all();
    return view('data.publikasi.index', compact('publikasi'));
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
        Route::resource('/penelitian', PenelitianController::class);
        Route::resource('/pengabdian', PengabdianController::class);
    });

    Route::resource('/artikel', ArtikelController::class);
    Route::resource('/event', EventController::class);
});
