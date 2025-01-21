<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Models\AuthorPengabdian;
use App\Models\LuaranPengabdian;
use App\Models\Pengabdian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengabdianController extends Controller
{
    public function index()
    {
        $pengabdian = Pengabdian::all();
        $user = Auth::user();
        if ($user->role === 'anggota') {
            $pengabdian = Pengabdian::where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->get();
        }
        return view('admin.data.pengabdian.index', compact('pengabdian'));
    }

    public function create()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('admin.data.pengabdian.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'authors' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $pengabdian = new Pengabdian();
            $pengabdian->user_id = Auth::user()->id;
            $pengabdian->judul = $request->judul;
            $pengabdian->penyelenggara = $request->penyelenggara;
            $pengabdian->dana = $request->dana;

            $pengabdian->tanggal_pengabdian = $request->tanggal_pengabdian;
            $pengabdian->level = $request->level;
            $pengabdian->link_akses = $request->link_akses;
            $pengabdian->save();

            if ($request->luaran) {
                foreach ($request->luaran as $luaran) {
                    $newLuaran = new LuaranPengabdian();
                    $newLuaran->pengabdian_id = $pengabdian->id;
                    $newLuaran->nama = $luaran;
                    $newLuaran->save();
                }
            }

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPengabdian();
                if ($author['id']) {
                    $newAuthor->user_id = $author['id'];
                }
                $newAuthor->pengabdian_id = $pengabdian->id;
                $newAuthor->nama = $author['nama'];
                $newAuthor->save();
            }
            DB::commit();
            return redirect()
                ->route('pengabdian.index')
                ->with([
                    'message' => 'Data pengabdian berhasil ditambahkan',
                ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
                // 'error' => $th->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        $user = Auth::user();

        $pengabdian = Pengabdian::where('id', $id)->first();
        $authors = json_decode($pengabdian->authors, true); // Decode JSON menjadi array
        $userIdToFind = $user->id;

        // Cek apakah user_id ada di dalam array
        $isUserIdExists = collect($authors)->contains('user_id', $userIdToFind);
        if ($user->role === 'admin') {
            $pengabdian = Pengabdian::findOrFail($id);
        }
        if ($isUserIdExists || $pengabdian) {
            $anggota = User::where('role', 'anggota')->get();
            return view('admin.data.pengabdian.edit', compact('pengabdian', 'anggota'));
        }
        abort(404);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'authors' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $pengabdian = Pengabdian::findOrFail($id);
            $pengabdian->judul = $request->judul;
            $pengabdian->penyelenggara = $request->penyelenggara;
            $pengabdian->tanggal_pengabdian = $request->tanggal_pengabdian;
            $pengabdian->level = $request->level;
            $pengabdian->link_akses = $request->link_akses;
            $pengabdian->update();

            foreach ($pengabdian->authors as $author) {
                $author->delete();
            }

            if ($request->luaran) {
                foreach ($pengabdian->luaran as $luaran) {
                    $luaran->delete();
                }
                foreach ($request->luaran as $luaran) {
                    $newLuaran = new LuaranPengabdian();
                    $newLuaran->pengabdian_id = $pengabdian->id;
                    $newLuaran->nama = $luaran;
                    $newLuaran->save();
                }
            }

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPengabdian();
                if ($author['user_id']) {
                    $newAuthor->user_id = $author['user_id'];
                }
                $newAuthor->pengabdian_id = $pengabdian->id;
                $newAuthor->nama = $author['nama'];
                $newAuthor->save();
            }
            DB::commit();
            return back()->with([
                'message' => 'Data pengabdian berhasil diupdate',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
                // 'error' => $th->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $pengabdian = Pengabdian::with('authors')->findOrFail($id);
            foreach ($pengabdian->authors as $author) {
                $author->delete();
            }
            foreach ($pengabdian->luaran as $luaran) {
                $luaran->delete();
            }
            $pengabdian->delete();
            DB::commit();
            return back()->with([
                'message' => 'Data pengabdian berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }
}
