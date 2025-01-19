<?php

namespace App\Http\Controllers\Admin\KelompokRiset;

use App\Http\Controllers\Controller;
use App\Models\Transportasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    public function index()
    {
        $transportasi = Transportasi::all();
        return view('admin.kelompok-riset.transportasi.index', compact('transportasi'));
    }

    public function create()
    {
        return view('admin.kelompok-riset.transportasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        Transportasi::create([
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with([
            'message' => 'Rekam jejak riset baru berhasil ditambahkan',
        ]);
    }

    public function edit($id)
    {
        $transportasi = Transportasi::findOrFail($id);
        return view('admin.kelompok-riset.transportasi.edit', compact('transportasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        $transportasi = Transportasi::findOrFail($id);
        $transportasi->tahun = $request->tahun;
        $transportasi->keterangan = $request->keterangan;
        $transportasi->update();

        return back()->with([
            'message' => 'Rekam jejak riset berhasil diupdate',
        ]);
    }

    public function destroy($id)
    {
        $transportasi = Transportasi::findOrFail($id);
        $transportasi->delete();
        return back()->with([
            'message' => 'Rekam jejak riset berhasil dihapus',
        ]);
    }
}
