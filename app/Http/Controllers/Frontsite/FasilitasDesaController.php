<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Fasilitas;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FasilitasDesaController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();
        $identitas = Identitas::first();

        return view('pages.frontsite.fasilitas.index', compact('fasilitas','identitas')); 
    }

    public function show($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $identitas = Identitas::first();

        return view('pages.frontsite.fasilitas.detail', compact('fasilitas', 'identitas'));
    }
}
