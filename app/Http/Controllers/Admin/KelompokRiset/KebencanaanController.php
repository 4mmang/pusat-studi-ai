<?php

namespace App\Http\Controllers\Admin\KelompokRiset;

use App\Http\Controllers\Controller;
use App\Models\Kebencanaan;
use Illuminate\Http\Request;

class KebencanaanController extends Controller
{
    public function index()
    {
        $kebencanaan = Kebencanaan::all();
        return view('admin.kelompok-riset.kebencanaan.index', compact('kebencanaan'));
    }

    public function create()
    {
        return view('admin.kelompok-riset.kebencanaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        Kebencanaan::create([
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kebencanaan.edit')->with([
            'message' => 'Rekam jejak riset baru berhasil ditambahkan',
        ]);
    }

    public function edit($id){
        $kebencanaan = Kebencanaan::findOrFail($id);
        return view('admin.kelompok-riset.kebencanaan.edit', compact('kebencanaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        $kebencanaan = Kebencanaan::findOrFail($id);
        $kebencanaan->tahun = $request->tahun;
        $kebencanaan->keterangan = $request->keterangan;
        $kebencanaan->update();

        return back()->with([
            'message' => 'Rekam jejak riset berhasil diupdate',
        ]);
    }

    public function destroy($id)
    {
        $kebencanaan = Kebencanaan::findOrFail($id);
        $kebencanaan->delete();
        return back()->with([
            'message' => 'Rekam jejak riset berhasil dihapus',
        ]);
    }
}
