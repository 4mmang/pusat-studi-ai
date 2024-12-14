<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index(){
        return view('admin.data.publikasi.index');
    }
    
    public function create(){
        return view('admin.data.publikasi.create');
    }
}
