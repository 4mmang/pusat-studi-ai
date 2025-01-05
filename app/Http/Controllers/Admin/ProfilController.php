<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profil', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail(Auth::user()->id);

        $request->validate([
            'nama' => 'required',
            'email' => ['required', 'unique:users,email,' . $user->id],
            'jenis_kelamin' => 'required',
        ]);

        try {
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->nip = $request->nip;
            $user->nomor_hp = $request->nomor_hp;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->alamat = $request->alamat;
            $user->save();

            return back()->with([
                'message' => 'Data profil berhasil disimpan',
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }
}
