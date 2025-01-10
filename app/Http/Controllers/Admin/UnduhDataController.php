<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UnduhDataController extends Controller
{
    public function index()
    {
        return view('admin.unduh-data.index');
    }

    public function store(Request $request)
    {
        $publikasi = Publikasi::all();
        $penelitian = Penelitian::all();
        $pengabdian = Pengabdian::all();
        $pdf = PDF::loadView('admin.unduh-data.hasil', compact('publikasi', 'penelitian', 'pengabdian'))
            ->setPaper($request->ukuran, $request->orientasi)
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ]);

        // return $pdf->stream('data-pusat-studi-ai.pdf');
        return $pdf->download('data-penjualan.pdf');
    }
}
