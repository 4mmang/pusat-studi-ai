<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index(){
        $anggota = User::where('role', 'anggota')->get();
        return view('tentang-kami', compact('anggota'));
    }
}
