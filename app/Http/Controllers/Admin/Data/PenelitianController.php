<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Models\AuthorPenelitian;
use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenelitianController extends Controller
{
    public function index()
    {
        $penelitian = Penelitian::all();
        return view('admin.data.penelitian.index', compact('penelitian'));
    }

    public function create()
    {
        return view('admin.data.penelitian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'authors' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $penelitian = new Penelitian();
            // $penelitian->user_id = Auth::user()->id;
            $penelitian->user_id = 1;
            $penelitian->judul = $request->judul;
            $penelitian->penyelenggara = $request->penyelenggara;
            $penelitian->tanggal_penelitian = $request->tanggal_penelitian;
            $penelitian->level = $request->level;
            $penelitian->link_akses = $request->link_akses;
            $penelitian->save();

            $authors = json_decode($request->authors, true);
            foreach ($authors as $author) {
                $newAuthor = new AuthorPenelitian();
                $newAuthor->penelitian_id = $penelitian->id;
                $newAuthor->nama = $author;
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
            ]);
        }
    }

    public function edit($id)
    {
        $penelitian = Penelitian::findOrFail($id);
        return view('admin.data.penelitian.edit', compact('penelitian'));
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
                $newAuthor->penelitian_id = $penelitian->id;
                $newAuthor->nama = $author;
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
