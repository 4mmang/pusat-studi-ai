<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Publikasi;

class StatistikDataController extends Controller
{
    public function index()
    {
        // bar chart
        $totalPenelitian = Penelitian::count();
        $totalPengabdian = Pengabdian::count();
        $totalPublikasi = Publikasi::count();

        // line chart
        $currentYear = now()->year;

        // Inisialisasi array untuk menyimpan total data
        $totalPenelitianPerTahun = [];
        $totalPengabdianPerTahun = [];
        $totalPublikasiPerTahun = [];

        // Loop untuk 5 tahun terakhir
        for ($i = 4; $i >= 0; $i--) {
            $year = $currentYear - $i;
            $totalPenelitianPerTahun[$year] = Penelitian::whereYear('tanggal_penelitian', $year)->count();
            $totalPengabdianPerTahun[$year] = Pengabdian::whereYear('tanggal_pengabdian', $year)->count();
            $totalPublikasiPerTahun[$year] = Publikasi::whereYear('tanggal_publikasi', $year)->count();
        }

        return view('informasi.statistik-data', compact('totalPenelitian', 'totalPengabdian', 'totalPublikasi', 'totalPenelitianPerTahun', 'totalPengabdianPerTahun', 'totalPublikasiPerTahun'));
    }
}
