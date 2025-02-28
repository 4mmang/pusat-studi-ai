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

    public function show($id)
    {
        $anggota = User::findOrFail($id);
        $publikasi = Publikasi::where('user_id', $id)->get();
        $jumlahPublikasi = $publikasi->count() ?? 0;
        $penelitian = Penelitian::where('user_id', $id)->get();
        $jumlahPenelitian = $penelitian->count() ?? 0;
        $pengabdian = Pengabdian::where('user_id', $id)->get();
        $jumlahPengabdian = $pengabdian->count() ?? 0;
        $totalKeseluruhan = $jumlahPenelitian + $jumlahPengabdian + $jumlahPublikasi;
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

    public function store(Request $request)
    {
        $anggota = User::findOrFail($request->userId);
        $publikasi = Publikasi::where('user_id', $request->userId)
            ->whereBetween('tanggal_publikasi', [$request->mulai, $request->akhir])
            ->get();
        $jumlahPublikasi = $publikasi->count() ?? 0;
        $penelitian = Penelitian::where('user_id', $request->userId)
            ->whereBetween('tanggal_penelitian', [$request->mulai, $request->akhir])
            ->get();
        $jumlahPenelitian = $penelitian->count() ?? 0;
        $pengabdian = Pengabdian::where('user_id', $request->userId)
            ->whereBetween('tanggal_pengabdian', [$request->mulai, $request->akhir])
            ->get();
        $jumlahPengabdian = $pengabdian->count() ?? 0;
        return response()->json([
            'data' => [
                'anggota' => $anggota,
                'publikasi' => $publikasi,
                'jumlahPublikasi' => $jumlahPublikasi,
                'penelitian' => $penelitian,
                'jumlahPenelitian' => $jumlahPenelitian,
                'pengabdian' => $pengabdian,
                'jumlahPengabdian' => $jumlahPengabdian,
            ],
        ]);
    }
}
