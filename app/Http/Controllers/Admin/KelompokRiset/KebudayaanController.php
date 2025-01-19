<?php

namespace App\Http\Controllers\Admin\KelompokRiset;

use App\Http\Controllers\Controller;
use App\Models\Kebudayaan;
use Illuminate\Http\Request;

class KebudayaanController extends Controller
{
    public function index()
    {
        $kebudayaan = Kebudayaan::all();
        return view('admin.kelompok-riset.kebudayaan.index', compact('kebudayaan'));
    }

    public function create()
    {
        return view('admin.kelompok-riset.kebudayaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        Kebudayaan::create([
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with([
            'message' => 'Rekam jejak riset baru berhasil ditambahkan',
        ]);
    }

    public function edit($id)
    {
        $kebudayaan = Kebudayaan::findOrFail($id);
        return view('admin.kelompok-riset.kebudayaan.edit', compact('kebudayaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        $kebudayaan = Kebudayaan::findOrFail($id);
        $kebudayaan->tahun = $request->tahun;
        $kebudayaan->keterangan = $request->keterangan;
        $kebudayaan->update();

        return back()->with([
            'message' => 'Rekam jejak riset berhasil diupdate',
        ]);
    }

    public function destroy($id)
    {
        $kebudayaan = Kebudayaan::findOrFail($id);
        $kebudayaan->delete();
        return back()->with([
            'message' => 'Rekam jejak riset berhasil dihapus',
        ]);
    }
}
