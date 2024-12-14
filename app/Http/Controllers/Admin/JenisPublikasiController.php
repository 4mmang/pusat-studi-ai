<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPublikasi;
use Illuminate\Http\Request;

class JenisPublikasiController extends Controller
{
    public function index()
    {
        $jenisPublikasi = JenisPublikasi::all();
        return view('admin.jenis.publikasi.index', compact('jenisPublikasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        try {
            $jenisPublikasi = new JenisPublikasi();
            $jenisPublikasi->nama = $request->nama;
            $jenisPublikasi->save();
            return back()->with([
                'message' => 'Jenis publikasi berhasil ditambahkan',
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_baru' => 'required',
            ]);
            $jenisPublikasi = JenisPublikasi::findOrFail($id);
            $jenisPublikasi->nama = $request->nama_baru;
            $jenisPublikasi->update();
            return back()->with([
                'message' => 'Jenis publikasi berhasil diupdate',
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $jenisPublikasi = JenisPublikasi::findOrFail($id);
            $jenisPublikasi->delete();
            return back()->with([
                'message' => 'Jenis publikasi berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return back()->with([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }
}
