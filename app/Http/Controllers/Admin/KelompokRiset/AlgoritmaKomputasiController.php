<?php

namespace App\Http\Controllers\Admin\KelompokRiset;

use App\Http\Controllers\Controller;
use App\Models\AlgoritmaKomputasi;
use Illuminate\Http\Request;

class AlgoritmaKomputasiController extends Controller
{
    public function index()
    {
        $algoritmaKomputasi = AlgoritmaKomputasi::all();
        return view('admin.kelompok-riset.algoritma-komputasi.index', compact('algoritmaKomputasi'));
    }

    public function create()
    {
        return view('admin.kelompok-riset.algoritma-komputasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        AlgoritmaKomputasi::create([
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with([
            'message' => 'Rekam jejak riset baru berhasil ditambahkan',
        ]);
    }

    public function edit($id)
    {
        $algoritmaKomputasi = AlgoritmaKomputasi::findOrFail($id);
        return view('admin.kelompok-riset.algoritma-komputasi.edit', compact('algoritmaKomputasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        $algoritmaKomputasi = AlgoritmaKomputasi::findOrFail($id);
        $algoritmaKomputasi->tahun = $request->tahun;
        $algoritmaKomputasi->keterangan = $request->keterangan;
        $algoritmaKomputasi->update();

        return back()->with([
            'message' => 'Rekam jejak riset berhasil diupdate',
        ]);
    }

    public function destroy($id)
    {
        $algoritmaKomputasi = AlgoritmaKomputasi::findOrFail($id);
        $algoritmaKomputasi->delete();
        return back()->with([
            'message' => 'Rekam jejak riset berhasil dihapus',
        ]);
    }
}
