<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Geografis;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeografisDesaController extends Controller
{
    public function index()
    {
        $geografis = Geografis::first();
        $identitas = Identitas::first();

        return view('pages.frontsite.geografis.index', compact('geografis','identitas')); 
    }
}
