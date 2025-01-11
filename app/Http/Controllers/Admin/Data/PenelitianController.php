<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Models\AuthorPenelitian;
use App\Models\Penelitian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenelitianController extends Controller
{
    public function index()
    {
        $penelitian = Penelitian::all();
        $user = Auth::user();
        if ($user->role === 'anggota') {
            $penelitian = Penelitian::where('user_id', $user->id)
                ->orWhereHas('authors', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->get();
        }
        return view('admin.data.penelitian.index', compact('penelitian'));
    }

    public function create()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('admin.data.penelitian.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'authors' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $penelitian = new Penelitian();
            $penelitian->user_id = Auth::user()->id;
            $penelitian->judul = $request->judul;
            $penelitian->penyelenggara = $request->penyelenggara;
            $penelitian->tanggal_penelitian = $request->tanggal_penelitian;
            $penelitian->level = $request->level;
            $penelitian->link_akses = $request->link_akses;
            $penelitian->save();

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPenelitian();
                if ($author['id']) {
                    $newAuthor->user_id = $author['id'];
                }
                $newAuthor->penelitian_id = $penelitian->id;
                $newAuthor->nama = $author['nama'];
                $newAuthor->save();
            }
            DB::commit();
            return back()->with([
                'message' => 'Data penelitian berhasil ditambahkan',
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

        $penelitian = Penelitian::where('id', $id) 
            ->first();
        $authors = json_decode($penelitian->authors, true); // Decode JSON menjadi array
        $userIdToFind = $user->id;

        // Cek apakah user_id ada di dalam array
        $isUserIdExists = collect($authors)->contains(
            'user_id',
            $userIdToFind,
        );
        if ($user->role === 'admin') {
            $penelitian = Penelitian::findOrFail($id);
        }
        if ($isUserIdExists || $penelitian) {
            $anggota = User::where('role', 'anggota')->get();
            return view('admin.data.penelitian.edit', compact('penelitian', 'anggota'));
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
            $penelitian = Penelitian::findOrFail($id);
            $penelitian->judul = $request->judul;
            $penelitian->penyelenggara = $request->penyelenggara;
            $penelitian->tanggal_penelitian = $request->tanggal_penelitian;
            $penelitian->level = $request->level;
            $penelitian->link_akses = $request->link_akses;
            $penelitian->update();

            foreach ($penelitian->authors as $author) {
                $author->delete();
            }

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPenelitian();
                if ($author['user_id']) {
                    $newAuthor->user_id = $author['user_id'];
                }
                $newAuthor->penelitian_id = $penelitian->id;
                $newAuthor->nama = $author['nama'];
                $newAuthor->save();
            }
            DB::commit();
            return back()->with([
                'message' => 'Data penelitian berhasil diupdate',
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
            $penelitian = Penelitian::with('authors')->findOrFail($id);
            foreach ($penelitian->authors as $author) {
                $author->delete();
            }
            $penelitian->delete();
            DB::commit();
            return back()->with([
                'message' => 'Data penelitian berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }
}
