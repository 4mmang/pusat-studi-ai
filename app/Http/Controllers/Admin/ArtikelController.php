<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DOMDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        if (Auth::check() && Auth::user()->role != 'admin') {
            $artikel = Artikel::where('user_id', Auth::user()->id)->get();
        }
        return view('admin.artikel.index', compact('artikel'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'sampul' => ['required', 'mimes:png,jpg,jpeg'],
            'konten' => 'required',
        ]);

        try {
            $konten = $request->konten;
            $dom = new DOMDocument();
            $dom->loadHTML($konten, 9);
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $key => $img) {
                $src = $img->getAttribute('src');
                if (strpos($src, 'data:image/') === 0) {
                    // Pastikan src berupa base64
                    $data = base64_decode(explode(',', explode(';', $src)[1])[1]);
                    // Simpan gambar ke storage/app/public/upload
                    $image_name = 'artikel/' . time() . $key . '.png';
                    Storage::disk('public')->put($image_name, $data);
                    // Update atribut src gambar ke URL baru
                    $img->removeAttribute('src');
                    $img->setAttribute('src', url('storage/' . $image_name));
                }
            }
            $konten = $dom->saveHTML();
            $sampul = $request->file('sampul')->store('artikel/sampul', 'public');
            $artikel = new Artikel();
            $artikel->user_id = Auth::user()->id;
            $artikel->judul = $request->judul;
            $artikel->sampul = $sampul;
            $artikel->konten = $konten;
            $artikel->save();
            return back()->with([
                'message' => 'Berhasil menambahkan artikel baru',
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }

    public function edit($id)
    {
        $artikel = Artikel::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();
        // $konten = $artikel->konten;
        $dom = new DOMDocument();
        // $dom->loadHTML($konten, 9);
        // $images = $dom->getElementsByTagName('img');
        // foreach ($images as $key => $img) {
        //     $src = $img->getAttribute('src');
        //     Storage::delete('public/' . Str::after($src, 'storage/'));
        // }

        $konten = $request->konten;
        $dom->loadHTML($konten, 9);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            if (strpos($src, 'data:image/') === 0) {
                // Pastikan src berupa base64
                $data = base64_decode(explode(',', explode(';', $src)[1])[1]);
                // Simpan gambar ke storage/app/public/upload
                $image_name = 'artikel/' . time() . $key . '.png';
                Storage::disk('public')->put($image_name, $data);
                // Update atribut src gambar ke URL baru
                $img->removeAttribute('src');
                $img->setAttribute('src', url('storage/' . $image_name));
            }
        }
        $konten = $dom->saveHTML();

        $artikel->judul = $request->judul;
        $artikel->konten = $konten;

        if ($request->file('sampul')) {
            Storage::delete('public/' . $artikel->sampul);
            $sampul = $request->file('sampul')->store('artikel/sampul', 'public');
            $artikel->sampul = $sampul;
        }
        $artikel->update();
        return back()->with([
            'message' => 'Berhasil memperbarui data artikel',
        ]);
    }

    public function destroy($id)
    {
        try {
            $artikel = Artikel::findOrFail($id);
            Storage::delete('public/' . $artikel->sampul);
            $konten = $artikel->konten;
            $dom = new DOMDocument();
            $dom->loadHTML($konten, 9);
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $key => $img) {
                $src = $img->getAttribute('src');
                Storage::delete('public/' . Str::after($src, 'storage/'));
            }

            $artikel->delete();
            return back()->with([
                'message' => 'Artikel berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }
}
