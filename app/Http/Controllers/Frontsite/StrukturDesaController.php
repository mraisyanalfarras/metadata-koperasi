<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Struktur;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StrukturDesaController extends Controller
{
    public function index()
    {
        $struktur = Struktur::first();
        $identitas = Identitas::first();

        return view('pages.frontsite.struktur.index', compact('struktur','identitas')); 
    }
}
