<?php

namespace App\Http\Controllers\Admin\KelompokRiset;

use App\Http\Controllers\Controller;
use App\Models\SoftwareDevelopment;
use Illuminate\Http\Request;

class SoftwareDevelopmentController extends Controller
{
    public function index()
    {
        $softwareDevelopment = SoftwareDevelopment::all();
        return view('admin.kelompok-riset.software-development.index', compact('softwareDevelopment'));
    }

    public function create()
    {
        return view('admin.kelompok-riset.software-development.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        SoftwareDevelopment::create([
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with([
            'message' => 'Rekam jejak riset baru berhasil ditambahkan',
        ]);
    }

    public function edit($id)
    {
        $softwareDevelopment = SoftwareDevelopment::findOrFail($id);
        return view('admin.kelompok-riset.software-development.edit', compact('softwareDevelopment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        $softwareDevelopment = SoftwareDevelopment::findOrFail($id);
        $softwareDevelopment->tahun = $request->tahun;
        $softwareDevelopment->keterangan = $request->keterangan;
        $softwareDevelopment->update();

        return back()->with([
            'message' => 'Rekam jejak riset berhasil diupdate',
        ]);
    }

    public function destroy($id)
    {
        $softwareDevelopment = SoftwareDevelopment::findOrFail($id);
        $softwareDevelopment->delete();
        return back()->with([
            'message' => 'Rekam jejak riset berhasil dihapus',
        ]);
    }
}
