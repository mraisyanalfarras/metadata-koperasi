<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananDesaController extends Controller
{
    public function index()
    {

        $identitas = Identitas::first();

        return view('pages.frontsite.layanan.index', compact('identitas')); 
    }
}
