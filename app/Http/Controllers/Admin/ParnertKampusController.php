<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParnertKampus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParnertKampusController extends Controller
{
    public function index()
    {
        $parnert = ParnertKampus::all();
        return view('admin.parnert-kampus.index', compact('parnert'));
    }

    public function create()
    {
        return view('admin.parnert-kampus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'logo' => ['required', 'mimes:png,jpg,jpeg'],
        ]);

        $parnert = new ParnertKampus();
        $parnert->nama = $request->nama;
        $parnert->logo = $request->file('logo')->store('parnert', 'public');
        $parnert->save();
        return redirect()
            ->route('parnert.index')
            ->with([
                'message' => 'Berhasil menambahkan parnert kampus',
            ]);
    }

    public function edit($id)
    {
        $parnert = ParnertKampus::findOrFail($id);
        return view('admin.parnert-kampus.edit', compact('parnert'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $parnert = ParnertKampus::findOrFail($id);
        $parnert->nama = $request->nama;
        if ($request->file('logo')) {
            Storage::delete('public/' . $parnert->logo);
            $parnert->logo = $request->file('logo')->store('parnert', 'public');
        }
        $parnert->update();
        return redirect()
            ->route('parnert.index')
            ->with([
                'message' => 'Berhasil mengupdate parnert kampus',
            ]);
    }

    public function destroy($id)
    {
        $parnert = ParnertKampus::findOrFail($id);
        Storage::delete('public/' . $parnert->logo);
        $parnert->delete();
        return back()->with([
            'message' => 'Berhasil mengahapus parnert kampus',
        ]);
    }
}
