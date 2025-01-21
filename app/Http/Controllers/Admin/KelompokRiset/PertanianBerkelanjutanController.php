<?php

namespace App\Http\Controllers\Admin\KelompokRiset;

use App\Http\Controllers\Controller;
use App\Models\PertanianBerkelanjutan;
use Illuminate\Http\Request;

class PertanianBerkelanjutanController extends Controller
{
    public function index()
    {
        $pertanianBerkelanjutan = PertanianBerkelanjutan::all();
        return view('admin.kelompok-riset.pertanian-berkelanjutan.index', compact('pertanianBerkelanjutan'));
    }

    public function create()
    {
        return view('admin.kelompok-riset.pertanian-berkelanjutan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        PertanianBerkelanjutan::create([
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('pertanian.index')->with([
            'message' => 'Rekam jejak riset baru berhasil ditambahkan',
        ]);
    }

    public function edit($id)
    {
        $pertanianBerkelanjutan = PertanianBerkelanjutan::findOrFail($id);
        return view('admin.kelompok-riset.pertanian-berkelanjutan.edit', compact('pertanianBerkelanjutan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        $pertanianBerkelanjutan = PertanianBerkelanjutan::findOrFail($id);
        $pertanianBerkelanjutan->tahun = $request->tahun;
        $pertanianBerkelanjutan->keterangan = $request->keterangan;
        $pertanianBerkelanjutan->update();

        return back()->with([
            'message' => 'Rekam jejak riset berhasil diupdate',
        ]);
    }

    public function destroy($id)
    {
        $pertanianBerkelanjutan = PertanianBerkelanjutan::findOrFail($id);
        $pertanianBerkelanjutan->delete();
        return back()->with([
            'message' => 'Rekam jejak riset berhasil dihapus',
        ]);
    }
}
