<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Models\AuthorPublikasi;
use App\Models\JenisPublikasi;
use App\Models\Publikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::all();
        $user = Auth::user();
        if ($user->role === 'anggota') {
            $publikasi = Publikasi::where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->get();
        }
        return view('admin.data.publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('admin.data.publikasi.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'authors' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $publikasi = new Publikasi();
            $publikasi->user_id = Auth::user()->id;
            $publikasi->judul = $request->judul;
            $publikasi->penyelenggara = $request->penyelenggara;
            $publikasi->tanggal_publikasi = $request->tanggal_publikasi;
            $publikasi->level = $request->level;
            $publikasi->link_akses = $request->link_akses;
            $publikasi->save();

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPublikasi();
                if ($author['id']) {
                    $newAuthor->user_id = $author['id'];
                }
                $newAuthor->publikasi_id = $publikasi->id;
                $newAuthor->nama = $author['nama'];
                $newAuthor->save();
            }
            DB::commit();
            return redirect()->route('publikasi.index')->with([
                'message' => 'Data publikasi berhasil ditambahkan',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }

    public function edit($id)
    {
        $user = Auth::user();

        $publikasi = Publikasi::where('id', $id)
            ->first();
        $authors = json_decode($publikasi->authors, true); // Decode JSON menjadi array
        $userIdToFind = $user->id;

        // Cek apakah user_id ada di dalam array
        $isUserIdExists = collect($authors)->contains(
            'user_id',
            $userIdToFind,
        );
        if ($user->role === 'admin') {
            $publikasi = Publikasi::findOrFail($id);
        }
        if ($isUserIdExists || $publikasi) {
            $anggota = User::where('role', 'anggota')->get();
            return view('admin.data.publikasi.edit', compact('publikasi', 'anggota'));
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
            $publikasi = Publikasi::findOrFail($id);
            $publikasi->judul = $request->judul;
            $publikasi->penyelenggara = $request->penyelenggara;
            $publikasi->tanggal_publikasi = $request->tanggal_publikasi;
            $publikasi->level = $request->level;
            $publikasi->link_akses = $request->link_akses;
            $publikasi->update();

            foreach ($publikasi->authors as $author) {
                $author->delete();
            }

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPublikasi();
                if ($author['user_id']) {
                    $newAuthor->user_id = $author['user_id'];
                }
                $newAuthor->publikasi_id = $publikasi->id;
                $newAuthor->nama = $author['nama'];
                $newAuthor->save();
            }
            DB::commit();
            return back()->with([
                'message' => 'Data publikasi berhasil diupdate',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $publikasi = Publikasi::with('authors')->findOrFail($id);
            foreach ($publikasi->authors as $author) {
                $author->delete();
            }
            $publikasi->delete();
            DB::commit();
            return back()->with([
                'message' => 'Data publikasi berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }
}
