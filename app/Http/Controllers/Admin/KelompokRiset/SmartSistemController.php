<?php

namespace App\Http\Controllers\Admin\KelompokRiset;

use App\Http\Controllers\Controller;
use App\Models\SmartSistem;
use Illuminate\Http\Request;

class SmartSistemController extends Controller
{
    public function index()
    {
        $smartSistem = SmartSistem::all();
        return view('admin.kelompok-riset.smart-sistem.index', compact('smartSistem'));
    }

    public function create()
    {
        return view('admin.kelompok-riset.smart-sistem.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        SmartSistem::create([
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with([
            'message' => 'Rekam jejak riset baru berhasil ditambahkan',
        ]);
    }

    public function edit($id)
    {
        $smartSistem = SmartSistem::findOrFail($id);
        return view('admin.kelompok-riset.smart-sistem.edit', compact('smartSistem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        $smartSistem = SmartSistem::findOrFail($id);
        $smartSistem->tahun = $request->tahun;
        $smartSistem->keterangan = $request->keterangan;
        $smartSistem->update();

        return back()->with([
            'message' => 'Rekam jejak riset berhasil diupdate',
        ]);
    }

    public function destroy($id)
    {
        $smartSistem = SmartSistem::findOrFail($id);
        $smartSistem->delete();
        return back()->with([
            'message' => 'Rekam jejak riset berhasil dihapus',
        ]);
    }
}
