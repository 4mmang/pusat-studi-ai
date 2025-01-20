<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Data\PenelitianController;
use App\Http\Controllers\Admin\Data\PengabdianController;
use App\Http\Controllers\Admin\Data\PublikasiController;
use App\Http\Controllers\Admin\DipercayaController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\JenisPublikasiController;
use App\Http\Controllers\Admin\KelompokRiset\AlgoritmaKomputasiController;
use App\Http\Controllers\Admin\KelompokRiset\KebencanaanController;
use App\Http\Controllers\Admin\KelompokRiset\KebudayaanController;
use App\Http\Controllers\Admin\KelompokRiset\KesehatanController;
use App\Http\Controllers\Admin\KelompokRiset\PertanianBerkelanjutanController;
use App\Http\Controllers\Admin\KelompokRiset\SmartSistemController;
use App\Http\Controllers\Admin\KelompokRiset\SoftwareDevelopmentController;
use App\Http\Controllers\Admin\KelompokRiset\TransportasiController;
use App\Http\Controllers\Admin\KelompokRisetController;
use App\Http\Controllers\Admin\ParnertKampusController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SumberDaya\AnggotaController;
use App\Http\Controllers\Admin\SumberDaya\SaranaPraController;
use App\Http\Controllers\Admin\UnduhDataController;
use App\Http\Controllers\Admin\UploadPdfController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Informasi\KinerjaAnggotaController;
use App\Http\Controllers\Informasi\StatistikDataController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\AlgoritmaKomputasi;
use App\Models\Artikel;
use App\Models\Dipercaya;
use App\Models\Event;
use App\Models\Kebencanaan;
use App\Models\Kebudayaan;
use App\Models\Kesehatan;
use App\Models\ParnertKampus;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\PertanianBerkelanjutan;
use App\Models\Publikasi;
use App\Models\SmartSistem;
use App\Models\SoftwareDevelopment;
use App\Models\Transportasi;
use App\Models\Unduh;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $events = Event::all();
    $artikel = Artikel::with('penulis')->take(3)->get();
    $parnerts = ParnertKampus::all();
    $dipercaya = Dipercaya::all();
    return view('welcome', compact('events', 'artikel', 'parnerts', 'dipercaya'));
})->name('beranda');

Route::get('tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');

Route::get('/artikel', function () {
    $artikel = Artikel::with('penulis')->get();
    return view('artikel.index', compact('artikel'));
})->name('artikel');

Route::get('/artikel/{id}', function ($id) {
    $artikel = Artikel::findOrFail($id);
    $artikelTerbaru = Artikel::take(3)->latest()->get();
    return view('artikel.show', compact('artikel', 'artikelTerbaru'));
})->name('artikel.view');

Route::prefix('/kelompok-riset')->group(function () {
    Route::get('/kebencanaan', function () {
        $kebencanaan = Kebencanaan::all();
        return view('kelompok-riset.kebencanaan', compact('kebencanaan'));
    })->name('kebencanaan');

    Route::get('/transportasi', function () {
        $transportasi = Transportasi::all();
        return view('kelompok-riset.transportasi', compact('transportasi'));
    })->name('transportasi');

    Route::get('/kesehatan', function () {
        $kesehatan = Kesehatan::all();
        return view('kelompok-riset.kesehatan', compact('kesehatan'));
    })->name('kesehatan');

    Route::get('/kebudayaan', function () {
        $kebudayaan = Kebudayaan::all();
        return view('kelompok-riset.kebudayaan', compact('kebudayaan'));
    })->name('kebudayaan');

    Route::get('/smart-sistem', function () {
        $smartSistem = SmartSistem::all();
        return view('kelompok-riset.smart-sistem', compact('smartSistem'));
    })->name('smartSistem');
    
    Route::get('/algoritma-komputasi', function () {
        $algoritmaKomputasi = AlgoritmaKomputasi::all();
        return view('kelompok-riset.algoritma', compact('algoritmaKomputasi'));
    })->name('algoritmaKomputasi');

    Route::get('/software-development', function () {
        $softwareDevelopment = SoftwareDevelopment::all();
        return view('kelompok-riset.software', compact('softwareDevelopment'));
    })->name('softwareDevelopment');

    Route::get('/pertanian-berkelanjutan', function () {
        $pertanianBerkelanjutan = PertanianBerkelanjutan::all();
        return view('kelompok-riset.pertanian-berkelanjutan', compact('pertanianBerkelanjutan'));
    })->name('pertanianBerkelanjutan');


});

Route::prefix('/informasi')->group(function () {
    Route::get('/statistik', [StatistikDataController::class, 'index'])->name('statistik');
    Route::get('/statistik/filter/{tahun}', [StatistikDataController::class, 'filter'])->name('statistik.filter');
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

Route::get('/unduh', function () {
    $unduh = Unduh::all();
    return view('unduh', compact('unduh'));
})->name('unduh');

Route::post('/buat-pesan', [KontakController::class, 'store'])->name('buat-pesan');

Route::middleware([RoleMiddleware::class . ':superadmin'])->group(function () {
    Route::resource('admin/user', UserController::class);
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::resource('/anggota', AnggotaController::class);
        Route::resource('/unduh-data', UnduhDataController::class);
        Route::resource('/parnert', ParnertKampusController::class);
        Route::resource('/dipercaya', DipercayaController::class);

        Route::resource('upload-pdf', UploadPdfController::class);
        Route::resource('/event', EventController::class);

        Route::prefix('/kelompok-riset')->group(function () {
            Route::resource('/kebencanaan', KebencanaanController::class);
            Route::resource('/kesehatan', KesehatanController::class);
            Route::resource('/pertanian', PertanianBerkelanjutanController::class);
            Route::resource('/transportasi', TransportasiController::class);
            Route::resource('/kebudayaan', KebudayaanController::class);
            Route::resource('/smart', SmartSistemController::class);
            Route::resource('/algoritma', AlgoritmaKomputasiController::class);
            Route::resource('/software', SoftwareDevelopmentController::class);
        });
    });
});

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth')
        ->name('dashboard');
    Route::resource('/artikel', ArtikelController::class)->middleware('auth');
    Route::resource('/profil', ProfilController::class)->middleware('auth');
    Route::prefix('/data')->group(function () {
        Route::resource('/publikasi', PublikasiController::class)->middleware('auth');
        Route::resource('/penelitian', PenelitianController::class)->middleware('auth');
        Route::resource('/pengabdian', PengabdianController::class)->middleware('auth');
    });
});
