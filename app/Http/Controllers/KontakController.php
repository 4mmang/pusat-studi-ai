<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('admin.kontak.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'nomor_hp' => 'required',
            'pesan' => 'required',
        ]);

        Kontak::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'pesan' => $request->pesan,
        ]);

        return back()->with([
            'message' => 'Pesan berhasil terkirim',
        ]);
    }

    public function destroy($id)
    {
        $pesan = Kontak::findOrFail($id);
        $pesan->delete();
        return back()->with([
            'message' => 'Pesan berhasil dihapus',
        ]);
    }
}
