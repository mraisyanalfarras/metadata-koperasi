<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Sejarah;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SejarahDesaController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::first();
        $identitas = Identitas::first();

        return view('pages.frontsite.sejarah.index', compact('sejarah','identitas')); 
    }
}
