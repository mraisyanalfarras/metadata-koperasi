<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Lembaga;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LembagaDesaController extends Controller
{
    public function index()
    {
        $lembaga = Lembaga::latest()->get();
        $identitas = Identitas::first();

        return view('pages.frontsite.lembaga.index', compact('lembaga','identitas')); 
    }
}
