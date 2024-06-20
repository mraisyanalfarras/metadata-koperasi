<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Potensi;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PotensiDesaController extends Controller
{
    public function index()
    {
        $potensi = Potensi::latest()->get();
        $identitas = Identitas::first();

        return view('pages.frontsite.potensi.index', compact('potensi','identitas')); 
    }

    public function show($id)
    {
        $potensi = Potensi::findOrFail($id);
        $identitas = Identitas::first();

        return view('pages.frontsite.potensi.detail', compact('potensi', 'identitas'));
    }
}
