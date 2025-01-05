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

        // level
        $nasionalPublikasi = Publikasi::where('level', 'nasional')->count();
        $internasionalPublikasi = Publikasi::where('level', 'internasional')->count();
        $nasionalBereputasi = Publikasi::where('level', 'nasional bereputasi')->count();
        $internasionalBereputasi = Publikasi::where('level', 'internasional bereputasi')->count();

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

        $user = Auth::user();

        if ($user->role === 'anggota') {
            $totalPenelitian = Penelitian::where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->count();
            $totalPengabdian = Pengabdian::where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->count();
            $totalPublikasi = Publikasi::where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->count();

            // level
            $nasionalPublikasi = Publikasi::where('level', 'nasional')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'nasional')
                ->count();
            $internasionalPublikasi = Publikasi::where('level', 'internasional')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'internasional')
                ->count();
            $nasionalBereputasi = Publikasi::where('level', 'nasional bereputasi')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'nasional bereputasi')
                ->count();
            $internasionalBereputasi = Publikasi::where('level', 'internasional bereputasi')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'internasional bereputasi')
                ->count();

            $mandiriPengabdian = Pengabdian::where('level', 'mandiri')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'mandiri')
                ->count();
            $universitasPengabdian = Pengabdian::where('level', 'universitas')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'universitas')
                ->count();
            $nasionalPengabdian = Pengabdian::where('level', 'nasional')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'nasional')
                ->count();
            $internasionalPengabdian = Pengabdian::where('level', 'internasional')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'internasional')
                ->count();
            $pengabdianLainnya = Pengabdian::where('level', 'lainnya')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'lainnya')
                ->count();

            $mandiriPenelitian = Penelitian::where('level', 'mandiri')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'mandiri')
                ->count();
            $universitasPenelitian = Penelitian::where('level', 'universitas')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'universitas')
                ->count();
            $nasionalPenelitian = Penelitian::where('level', 'nasional')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'nasional')
                ->count();
            $internasionalPenelitian = Penelitian::where('level', 'internasional')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'internasional')
                ->count();
            $penelitianLainnya = Penelitian::where('level', 'lainnya')
                ->where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('level', 'lainnya')
                ->count();

            $totalPenelitianPerTahun = [];
            $totalPengabdianPerTahun = [];
            $totalPublikasiPerTahun = [];

            // Loop untuk 5 tahun terakhir
            for ($i = 4; $i >= 0; $i--) {
                $year = $currentYear - $i;
                $totalPenelitianPerTahun[$year] = Penelitian::whereYear('tanggal_penelitian', $year)
                    ->where('user_id', $user->id)
                    ->count();
                $totalPengabdianPerTahun[$year] = Pengabdian::whereYear('tanggal_pengabdian', $year)
                    ->where('user_id', $user->id)
                    ->count();
                $totalPublikasiPerTahun[$year] = Publikasi::whereYear('tanggal_publikasi', $year)
                    ->where('user_id', $user->id)
                    ->count();
            }
        }
        return view('admin.dashboard', compact(['totalPenelitian', 'totalPengabdian', 'totalPublikasi', 'totalPenelitianPerTahun', 'totalPengabdianPerTahun', 'totalPublikasiPerTahun', 'universitasPenelitian', 'mandiriPenelitian', 'penelitianLainnya', 'mandiriPengabdian', 'pengabdianLainnya', 'nasionalPenelitian', 'internasionalPenelitian', 'internasionalBereputasi', 'nasionalBereputasi', 'universitasPengabdian', 'nasionalPengabdian', 'internasionalPengabdian', 'nasionalPublikasi', 'internasionalPublikasi']));
    }
}
