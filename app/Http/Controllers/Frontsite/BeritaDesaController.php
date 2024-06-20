<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Berita;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaDesaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        $identitas = Identitas::first();

        return view('pages.frontsite.berita.index', compact('berita', 'identitas')); 
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        $identitas = Identitas::first();

        return view('pages.frontsite.berita.detail', compact('berita', 'identitas'));
    }
}
