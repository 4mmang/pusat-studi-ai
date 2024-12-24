<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Publikasi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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

        $user = Auth::user();

        if ($user->role === 'anggota') {
            $totalPenelitian = Penelitian::where('user_id', $user->id)->count();
            $totalPengabdian = Pengabdian::where('user_id', $user->id)->count();
            $totalPublikasi = Publikasi::where('user_id', $user->id)->count();

            $totalPenelitianPerTahun = [];
            $totalPengabdianPerTahun = [];
            $totalPublikasiPerTahun = [];

            // Loop untuk 5 tahun terakhir
            for ($i = 4; $i >= 0; $i--) {
                $year = $currentYear - $i;
                $totalPenelitianPerTahun[$year] = Penelitian::whereYear('tanggal_penelitian', $year)->where('user_id', $user->id)->count();
                $totalPengabdianPerTahun[$year] = Pengabdian::whereYear('tanggal_pengabdian', $year)->where('user_id', $user->id)->count();
                $totalPublikasiPerTahun[$year] = Publikasi::whereYear('tanggal_publikasi', $year)->where('user_id', $user->id)->count();
            }
        }
        return view('admin.dashboard', compact('totalPenelitian', 'totalPengabdian', 'totalPublikasi', 'totalPenelitianPerTahun', 'totalPengabdianPerTahun', 'totalPublikasiPerTahun'));
    }
}
