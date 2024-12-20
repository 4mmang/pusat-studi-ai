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
        $anggota = User::where('role', 'anggota')->get();
        return view('informasi.kinerja-anggota', compact('anggota'));
    }

    public function store(Request $request)
    {
        $anggota = User::findOrFail($request->userId);
        $publikasi = Publikasi::where('user_id', $request->userId)->get();
        $jumlahPublikasi = $publikasi->count() ?? 0;
        $penelitian = Penelitian::where('user_id', $request->userId)->get();
        $jumlahPenelitian = $penelitian->count() ?? 0;
        $pengabdian = Pengabdian::where('user_id', $request->userId)->get();
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
