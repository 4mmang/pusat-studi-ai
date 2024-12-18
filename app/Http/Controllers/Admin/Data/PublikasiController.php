<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Models\AuthorPublikasi;
use App\Models\JenisPublikasi;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::all();
        return view('admin.data.publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        return view('admin.data.publikasi.create');
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
            // $publikasi->user_id = 1;
            $publikasi->judul = $request->judul;
            $publikasi->penyelenggara = $request->penyelenggara;
            // $publikasi->jenis_publikasi_id = $request->jenis_publikasi;
            $publikasi->tanggal_publikasi = $request->tanggal_publikasi;
            $publikasi->level = $request->level;
            $publikasi->link_akses = $request->link_akses;
            $publikasi->save();

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPublikasi();
                $newAuthor->publikasi_id = $publikasi->id;
                $newAuthor->nama = $author;
                $newAuthor->save();
            }
            DB::commit();
            return back()->with([
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
        $publikasi = Publikasi::findOrFail($id);
        return view('admin.data.publikasi.edit', compact('publikasi'));
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
                $newAuthor->publikasi_id = $publikasi->id;
                $newAuthor->nama = $author;
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
