<?php

namespace App\Http\Controllers\Admin\SumberDaya;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'kartu_anggota' => 'required',
        ]);

        try {
            $anggota = new User();
            $anggota->nama = $request->nama;
            $anggota->email = $request->email;
            $anggota->nip = $request->nip;
            $anggota->jenis_kelamin = $request->jenis_kelamin;
            $anggota->role = 'anggota';
            $anggota->password = Hash::make($request->password);
            $anggota->kartu_anggota = $request->file('kartu_anggota')->store('kartu-anggota', 'public');
            $anggota->save();
            return redirect()
                ->route('anggota.index')
                ->with([
                    'message' => 'Berhasil manambahkan anggota baru',
                ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }

    public function edit($id)
    {
        $anggota = User::findOrFail($id);
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'jenis_kelamin' => 'required',
        ]);

        try {
            $anggota = User::findOrFail($id);
            $anggota->nama = $request->nama;
            $anggota->email = $request->email;
            $anggota->nip = $request->nip;
            $anggota->jenis_kelamin = $request->jenis_kelamin;
            if ($request->password) {
                $anggota->password = Hash::make($request->password);
            }
            if ($request->file('kartu_anggota')) {
                Storage::delete('public/' . $anggota->kartu_anggota);
                $anggota->kartu_anggota = $request->file('kartu_anggota')->store('kartu-anggota', 'public');
            }
            $anggota->update();
            return back()->with([
                'message' => 'Berhasil mengupdate data anggota',
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $anggota = User::findOrFail($id);
            Storage::delete('public/' . $anggota->foto);
            $anggota->delete();
            return back()->with([
                'message' => 'Data anggota berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }
}
