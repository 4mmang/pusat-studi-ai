<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dipercaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DipercayaController extends Controller
{
    public function index()
    {
        $dipercaya = Dipercaya::all();
        return view('admin.dipercaya.index', compact('dipercaya'));
    }

    public function create()
    {
        return view('admin.dipercaya.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'logo' => ['required', 'mimes:png,jpg,jpeg'],
        ]);

        $dipercaya = new Dipercaya();
        $dipercaya->nama = $request->nama;
        $dipercaya->logo = $request->file('logo')->store('dipercaya', 'public');
        $dipercaya->save();
        return redirect()
            ->route('dipercaya.index')
            ->with([
                'message' => 'Berhasil menambahkan data',
            ]);
    }

    public function edit($id)
    {
        $dipercaya = Dipercaya::findOrFail($id);
        return view('admin.dipercaya.edit', compact('dipercaya'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $dipercaya = Dipercaya::findOrFail($id);
        $dipercaya->nama = $request->nama;
        if ($request->file('logo')) {
            Storage::delete('public/' . $dipercaya->logo);
            $dipercaya->logo = $request->file('logo')->store('dipercaya', 'public');
        }
        $dipercaya->update();
        return redirect()
            ->route('dipercaya.index')
            ->with([
                'message' => 'Berhasil mengupdate data',
            ]);
    }

    public function destroy($id)
    {
        $dipercaya = Dipercaya::findOrFail($id);
        Storage::delete('public/' . $dipercaya->logo);
        $dipercaya->delete();
        return back()->with([
            'message' => 'Berhasil mengahapus data',
        ]);
    }
}
