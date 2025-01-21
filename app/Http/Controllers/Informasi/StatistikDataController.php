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

        // level
        $q1 = Publikasi::where('level', 'Quartile-1 (Q1)')->count();
        $q2 = Publikasi::where('level', 'Quartile-2 (Q2)')->count();
        $q3 = Publikasi::where('level', 'Quartile-3 (Q3)')->count();
        $q4 = Publikasi::where('level', 'Quartile-4 (Q4)')->count();
        $noQuartile = Publikasi::where('level', 'No-Quartile')->count();
        $nasional = Publikasi::where('level', 'nasional')->count();

        $mandiriPengabdian = Pengabdian::where('level', 'mandiri')->count();
        $universitasPengabdian = Pengabdian::where('level', 'universitas')->count();
        $nasionalPengabdian = Pengabdian::where('level', 'nasional')->count();
        $internasionalPengabdian = Pengabdian::where('level', 'internasional')->count();
        $pengabdianLainnya = Pengabdian::where('level', 'lainnya')->count();

        $mandiriPenelitian = Penelitian::where('level', 'mandiri')->count();
        $universitasPenelitian = Penelitian::where('level', 'universitas')->count();
        $nasionalPenelitian = Penelitian::where('level', 'nasional')->count();
        $internasionalPenelitian = Penelitian::where('level', 'internasional')->count();
        $penelitianLainnya = Penelitian::where('level', 'lainnya')->count();

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

        return view('informasi.statistik-data', compact(['totalPenelitian', 'totalPengabdian', 'totalPublikasi', 'totalPenelitianPerTahun', 'totalPengabdianPerTahun', 'totalPublikasiPerTahun', 'universitasPenelitian', 'mandiriPenelitian', 'penelitianLainnya', 'mandiriPengabdian', 'pengabdianLainnya', 'nasionalPenelitian', 'internasionalPenelitian', 'universitasPengabdian', 'nasionalPengabdian', 'internasionalPengabdian', 'q1', 'q2', 'q3', 'q4', 'noQuartile', 'nasional']));
    }

    public function filter($tahun)
    {
        $totalPenelitian = Penelitian::whereYear('tanggal_penelitian', $tahun)->count();
        $totalPengabdian = Pengabdian::whereYear('tanggal_pengabdian', $tahun)->count();
        $totalPublikasi = Publikasi::whereYear('tanggal_publikasi', $tahun)->count();
        return response()->json([
            'totalPenelitian' => $totalPenelitian,
            'totalPengabdian' => $totalPengabdian,
            'totalPublikasi' => $totalPublikasi,
        ]);
    }
}
