<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\DataPasar;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasarDinasController extends Controller
{
    public function index()
    {
        $datapasar = DataPasar::latest()->get();
        $identitas = Identitas::first();

        return view('pages.frontsite.datapasar.index', compact('datapasar', 'identitas')); 
    }

    public function show($id)
    {
        $datapasar = DataPasar::findOrFail($id);
        $identitas = Identitas::first();

        return view('pages.frontsite.datapasar.detail', compact('datapasar', 'identitas'));
    }
    
}
