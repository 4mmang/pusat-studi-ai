<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unduh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadPdfController extends Controller
{
    public function index()
    {
        $unduh = Unduh::all();
        return view('admin.unduh.index', compact('unduh'));
    }

    public function create()
    {
        return view('admin.unduh.create');
    }

    public function edit($id)
    {
        $unduh = Unduh::findOrFail($id);
        return view('admin.unduh.edit', compact('unduh'));
    }

    public function update(Request $request, $id)
    {
        $unduh = Unduh::findOrFail($id);
        $unduh->judul = $request->judul;
        if ($request->file('file')) {
            Storage::delete('public/' . $unduh->file);
            $unduh->file = $request->file('file')->store('unduh', 'public');
        }
        $unduh->deskripsi = $request->deskripsi;
        $unduh->update();
        return back()->with([
            'message' => 'File unduhan berhasil diupdate',
        ]);
    }

    public function store(Request $request)
    {
        $unduh = new Unduh();
        $unduh->judul = $request->judul;
        $unduh->file = $request->file('file')->store('unduh', 'public');
        $unduh->deskripsi = $request->deskripsi;
        $unduh->save();
        return back()->with([
            'message' => 'File unduhan berhasil ditambahkan',
        ]);
    }

    public function destroy($id)
    {
        $unduh = Unduh::findOrFail($id);
        Storage::delete('public/' . $unduh->file);
        $unduh->delete();
        return back()->with([
            'message' => 'File Unduhan berhasil dihapus',
        ]);
    }
}
