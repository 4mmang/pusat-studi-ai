<?php

namespace App\Http\Controllers\Admin\SumberDaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaranaPraController extends Controller
{
    public function index(){
        return view('admin.sumber-daya.sarana-pra.index');
    }
}
