<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\VisiMisi;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisiController extends Controller
{
    public function index()
    {
        $visi = VisiMisi::first();
        $identitas = Identitas::first();

        return view('pages.frontsite.visimisi.index', compact('visi','identitas')); 
    }
}
