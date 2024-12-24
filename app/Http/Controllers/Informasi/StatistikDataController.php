<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Publikasi;
use Illuminate\Http\Request;

class StatistikDataController extends Controller
{
    public function index(){
        $totalPenelitian = Penelitian::count();
        $totalPengabdian = Pengabdian::count();
        $totalPublikasi = Publikasi::count();
        return view('statistik.index', compact('totalPenelitian', 'totalPengabdian', 'totalPublikasi'));
    }
}
