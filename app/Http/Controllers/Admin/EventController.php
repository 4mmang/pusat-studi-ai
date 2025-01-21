<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'poster' => ['required', 'mimes:png,jpg,jpeg'],
            'link_pendaftaran' => 'required',
        ]);

        try {
            $event = new Event();
            $event->judul = $request->judul;
            $event->poster = $request->file('poster')->store('event', 'public');
            $event->link_pendaftaran = $request->link_pendaftaran;
            $event->save();
            return redirect()->route('event.index')->with([
                'message' => 'Berhasil menambahkan event baru',
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'link_pendaftaran' => 'required',
        ]);

        try {
            $event = Event::findOrFail($id);
            $event->judul = $request->judul;
            if ($request->file('poster')) {
                Storage::delete('public/' . $event->poster);
                $event->poster = $request->file('poster')->store('event', 'public');
            }
            $event->link_pendaftaran = $request->link_pendaftaran;
            $event->update();
            return back()->with([
                'message' => 'Berhasil mengupdate event',
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
            $event = Event::findOrFail($id);
            Storage::delete('public/' . $event->poster);
            $event->delete();
            return back()->with([
                'message' => 'Event berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan',
            ]);
        }
    }
}
