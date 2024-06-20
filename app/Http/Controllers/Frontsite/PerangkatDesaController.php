<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Identitas;
use App\Models\Perangkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkat = Perangkat::latest()->get();
        $identitas = Identitas::first();

        return view('pages.frontsite.perangkat.index', compact('perangkat','identitas')); 
    }
}
