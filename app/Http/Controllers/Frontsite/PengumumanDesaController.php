<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Identitas;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengumumanDesaController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        $identitas = Identitas::first();

        return view('pages.frontsite.pengumuman.index', compact('pengumuman','identitas')); 
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $identitas = Identitas::first();

        return view('pages.frontsite.pengumuman.detail', compact('pengumuman', 'identitas'));
    }
}
