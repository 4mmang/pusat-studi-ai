<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Data\PenelitianController;
use App\Http\Controllers\Admin\Data\PengabdianController;
use App\Http\Controllers\Admin\Data\PublikasiController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\JenisPublikasiController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SumberDaya\AnggotaController;
use App\Http\Controllers\Admin\SumberDaya\SaranaPraController;
use App\Http\Controllers\Admin\UploadPdfController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Informasi\KinerjaAnggotaController;
use App\Http\Controllers\Informasi\StatistikDataController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Artikel;
use App\Models\Event;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Publikasi;
use App\Models\Unduh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $events = Event::all();
    $artikel = Artikel::take(3)->get();
    return view('welcome', compact('events', 'artikel'));
})->name('beranda');

Route::get('tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');


Route::get('/artikel', function () {
    $artikel = Artikel::all();
    return view('artikel.index', compact('artikel'));
})->name('artikel');

Route::prefix('/informasi')->group(function(){
    Route::get('/statistik', [StatistikDataController::class, 'index'])->name('statistik');
    Route::resource('/kinerja-anggota', KinerjaAnggotaController::class);
    Route::get('/kontak', function () {
        return view('informasi.kontak');
    })->name('kontak');
});

Route::get('/data/publikasi', function () {
    return view('data-publikasi.index');
});

// Route::prefix('/sumber-daya')->group(function(){
    // Route::get('/anggota', function () {
    //     $anggota = User::where('role', 'anggota')->get();
    //     return view('anggota.index', compact('anggota'));
    // })->name('anggota');

    // Route::get('/sarana-prasarana', function(){
    //     return view('sumber-daya.sarana-pra');
    // })->name('sarana-pra');
// });

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/validation', [LoginController::class, 'validation'])->name('validation');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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

Route::get('/unduh', function(){
    $unduh = Unduh::all();
    return view('unduh', compact('unduh'));
})->name('unduh');


Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('/sumber-daya')->group(function () {
            Route::resource('/anggota', AnggotaController::class);
            Route::resource('/sarana-pra', SaranaPraController::class);
        });

        Route::resource('upload-pdf', UploadPdfController::class);
        Route::resource('/artikel', ArtikelController::class);
        Route::resource('/event', EventController::class);
    });
});

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/profil', ProfilController::class);

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
});
