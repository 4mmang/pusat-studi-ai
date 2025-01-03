<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'admin')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'jenis_kelamin' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->save();
        return redirect()
            ->route('user.index')
            ->with([
                'message' => 'Berhasil menambahkan admin baru',
            ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'jenis_kelamin' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->password = Hash::make($request->password);
        $user->update();
        return back()->with([
            'message' => 'Berhasil mengupdate data admin',
        ]);
    }

    public function destroy($id)
    {
        try {
            $anggota = User::findOrFail($id);
            Storage::delete('public/' . $anggota->foto);
            $anggota->delete();
            return back()->with([
                'message' => 'Data admin berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }
}
