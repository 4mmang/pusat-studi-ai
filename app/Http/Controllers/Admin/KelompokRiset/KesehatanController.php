<?php

namespace App\Http\Controllers\Admin\KelompokRiset;

use App\Http\Controllers\Controller;
use App\Models\Kesehatan;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    public function index()
    {
        $kesehatan = Kesehatan::all();
        return view('admin.kelompok-riset.kesehatan.index', compact('kesehatan'));
    }

    public function create()
    {
        return view('admin.kelompok-riset.kesehatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        Kesehatan::create([
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kesehatan.index')->with([
            'message' => 'Rekam jejak riset baru berhasil ditambahkan',
        ]);
    }

    public function edit($id)
    {
        $kesehatan = Kesehatan::findOrFail($id);
        return view('admin.kelompok-riset.kesehatan.edit', compact('kesehatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        $kesehatan = Kesehatan::findOrFail($id);
        $kesehatan->tahun = $request->tahun;
        $kesehatan->keterangan = $request->keterangan;
        $kesehatan->update();

        return back()->with([
            'message' => 'Rekam jejak riset berhasil diupdate',
        ]);
    }

    public function destroy($id)
    {
        $kesehatan = Kesehatan::findOrFail($id);
        $kesehatan->delete();
        return back()->with([
            'message' => 'Rekam jejak riset berhasil dihapus',
        ]);
    }
}
