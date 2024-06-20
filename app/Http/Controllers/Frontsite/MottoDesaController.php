<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Motto;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MottoDesaController extends Controller
{
    public function index()
    {
        $motto = Motto::first();
        $identitas = Identitas::first();

        return view('pages.frontsite.motto.index', compact('motto','identitas')); 
    }
}
