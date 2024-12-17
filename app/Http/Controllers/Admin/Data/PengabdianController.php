<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Models\AuthorPengabdian;
use App\Models\Pengabdian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengabdianController extends Controller
{
    public function index()
    {
        $pengabdian = Pengabdian::all();
        return view('admin.data.pengabdian.index', compact('pengabdian'));
    }

    public function create()
    {
        return view('admin.data.pengabdian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'authors' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $pengabdian = new Pengabdian();
            // $pengabdian->user_id = Auth::user()->id;
            $pengabdian->user_id = 1;
            $pengabdian->judul = $request->judul;
            $pengabdian->penyelenggara = $request->penyelenggara;
            $pengabdian->tanggal_pengabdian = $request->tanggal_pengabdian;
            $pengabdian->level = $request->level;
            $pengabdian->link_akses = $request->link_akses;
            $pengabdian->save();

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPengabdian();
                $newAuthor->pengabdian_id = $pengabdian->id;
                $newAuthor->nama = $author;
                $newAuthor->save();
            }
            DB::commit();
            return back()->with([
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
        $pengabdian = Pengabdian::findOrFail($id);
        return view('admin.data.pengabdian.edit', compact('pengabdian'));
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

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPengabdian();
                $newAuthor->pengabdian_id = $pengabdian->id;
                $newAuthor->nama = $author;
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
