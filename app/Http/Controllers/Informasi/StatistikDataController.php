<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Publikasi;
use Illuminate\Http\Request;

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
            $totalPenelitianPerTahun[$year] = Penelitian::whereYear('created_at', $year)->count();
            $totalPengabdianPerTahun[$year] = Pengabdian::whereYear('created_at', $year)->count();
            $totalPublikasiPerTahun[$year] = Publikasi::whereYear('created_at', $year)->count();
        }
        // dd($totalPenelitianPerTahun);
        return view('statistik.index', compact('totalPenelitian', 'totalPengabdian', 'totalPublikasi', 'totalPenelitianPerTahun', 'totalPengabdianPerTahun', 'totalPublikasiPerTahun'));
    }
}