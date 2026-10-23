<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Publikasi;
use App\Models\User;
use Illuminate\Http\Request;

class KinerjaAnggotaController extends Controller
{
    public function index()
    {
        $kinerja = session('kinerja');
        // echo optional($kinerja['anggota'])->nama;
        $anggota = User::where('role', 'anggota')->get();
        return view('informasi.kinerja-anggota', compact('anggota', 'kinerja'));
    }

    // public function show($id)
    // {
    //     $anggota = User::findOrFail($id);
    //     $publikasi = Publikasi::where('user_id', $id)->get();
    //     $jumlahPublikasi = $publikasi->count() ?? 0;
    //     $penelitian = Penelitian::where('user_id', $id)->get();
    //     $jumlahPenelitian = $penelitian->count() ?? 0;
    //     $pengabdian = Pengabdian::where('user_id', $id)->get();
    //     $jumlahPengabdian = $pengabdian->count() ?? 0;
    //     $totalKeseluruhan = $jumlahPenelitian + $jumlahPengabdian + $jumlahPublikasi;
    //     return redirect()
    //         ->route('kinerja-anggota.index')
    //         ->with([
    //             'kinerja' => [
    //                 'anggota' => $anggota,
    //                 'publikasi' => $publikasi,
    //                 'jumlahPublikasi' => $jumlahPublikasi,
    //                 'penelitian' => $penelitian,
    //                 'jumlahPenelitian' => $jumlahPenelitian,
    //                 'pengabdian' => $pengabdian,
    //                 'jumlahPengabdian' => $jumlahPengabdian,
    //                 'totalKeseluruhan' => $totalKeseluruhan
    //             ],
    //         ]);
    // }

    public function show($id)
    {
        $anggota = User::findOrFail($id);

        // Publikasi
        $publikasi = Publikasi::where(function ($query) use ($id) {
            $query->where('user_id', $id)
                ->orWhereHas('authors', function ($q) use ($id) {
                    $q->where('user_id', $id);
                });
        })->get();

        $jumlahPublikasi = $publikasi->count();

        // Penelitian
        $penelitian = Penelitian::where(function ($query) use ($id) {
            $query->where('user_id', $id)
                ->orWhereHas('authors', function ($q) use ($id) {
                    $q->where('user_id', $id);
                });
        })->get();

        $jumlahPenelitian = $penelitian->count();

        // Pengabdian
        $pengabdian = Pengabdian::where(function ($query) use ($id) {
            $query->where('user_id', $id)
                ->orWhereHas('authors', function ($q) use ($id) {
                    $q->where('user_id', $id);
                });
        })->get();

        $jumlahPengabdian = $pengabdian->count();

        // Total keseluruhan
        $totalKeseluruhan = $jumlahPenelitian
            + $jumlahPengabdian
            + $jumlahPublikasi;

        return redirect()
            ->route('kinerja-anggota.index')
            ->with([
                'kinerja' => [
                    'anggota' => $anggota,
                    'publikasi' => $publikasi,
                    'jumlahPublikasi' => $jumlahPublikasi,
                    'penelitian' => $penelitian,
                    'jumlahPenelitian' => $jumlahPenelitian,
                    'pengabdian' => $pengabdian,
                    'jumlahPengabdian' => $jumlahPengabdian,
                    'totalKeseluruhan' => $totalKeseluruhan
                ],
            ]);
    }

    // public function store(Request $request)
    // {
    //     $anggota = User::findOrFail($request->userId);
    //     $publikasi = Publikasi::where('user_id', $request->userId)
    //         ->whereBetween('tanggal_publikasi', [$request->mulai, $request->akhir])
    //         ->get();
    //     $jumlahPublikasi = $publikasi->count() ?? 0;
    //     $penelitian = Penelitian::where('user_id', $request->userId)
    //         ->whereBetween('tanggal_penelitian', [$request->mulai, $request->akhir])
    //         ->get();
    //     $jumlahPenelitian = $penelitian->count() ?? 0;
    //     $pengabdian = Pengabdian::where('user_id', $request->userId)
    //         ->whereBetween('tanggal_pengabdian', [$request->mulai, $request->akhir])
    //         ->get();
    //     $jumlahPengabdian = $pengabdian->count() ?? 0;
    //     return response()->json([
    //         'data' => [
    //             'anggota' => $anggota,
    //             'publikasi' => $publikasi,
    //             'jumlahPublikasi' => $jumlahPublikasi,
    //             'penelitian' => $penelitian,
    //             'jumlahPenelitian' => $jumlahPenelitian,
    //             'pengabdian' => $pengabdian,
    //             'jumlahPengabdian' => $jumlahPengabdian,
    //         ],
    //     ]);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'required|exists:users,id',
            'mulai' => 'required|date',
            'akhir' => 'required|date|after_or_equal:mulai',
        ]);

        $anggota = User::findOrFail($request->userId);

        // Publikasi
        $publikasi = Publikasi::where(function ($query) use ($request) {
            $query->where('user_id', $request->userId)
                ->orWhereHas('authors', function ($q) use ($request) {
                    $q->where('user_id', $request->userId);
                });
        })
            ->whereDate('tanggal_publikasi', '>=', $request->mulai)
            ->whereDate('tanggal_publikasi', '<=', $request->akhir)
            ->get();

        // Penelitian
        $penelitian = Penelitian::where(function ($query) use ($request) {
            $query->where('user_id', $request->userId)
                ->orWhereHas('authors', function ($q) use ($request) {
                    $q->where('user_id', $request->userId);
                });
        })
            ->whereDate('tanggal_penelitian', '>=', $request->mulai)
            ->whereDate('tanggal_penelitian', '<=', $request->akhir)
            ->get();

        // Pengabdian
        $pengabdian = Pengabdian::where(function ($query) use ($request) {
            $query->where('user_id', $request->userId)
                ->orWhereHas('authors', function ($q) use ($request) {
                    $q->where('user_id', $request->userId);
                });
        })
            ->whereDate('tanggal_pengabdian', '>=', $request->mulai)
            ->whereDate('tanggal_pengabdian', '<=', $request->akhir)
            ->get();

        $jumlahPublikasi = $publikasi->count();
        $jumlahPenelitian = $penelitian->count();
        $jumlahPengabdian = $pengabdian->count();

        $totalKeseluruhan = $jumlahPublikasi
            + $jumlahPenelitian
            + $jumlahPengabdian;

        return response()->json([
            'data' => [
                'anggota' => $anggota,
                'publikasi' => $publikasi,
                'jumlahPublikasi' => $jumlahPublikasi,
                'penelitian' => $penelitian,
                'jumlahPenelitian' => $jumlahPenelitian,
                'pengabdian' => $pengabdian,
                'jumlahPengabdian' => $jumlahPengabdian,
                'totalKeseluruhan' => $totalKeseluruhan,
            ],
        ]);
    }
}
