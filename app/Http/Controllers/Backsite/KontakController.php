<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Kontak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();
        return view('pages.backsite.kontak.index', compact('kontak'));
    }

    public function show($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('pages.backsite.kontak.show', compact('kontak'));
    }

    public function destroy($id)
    {
        $kontak = Kontak::find($id);
    
        $kontak->delete();
        return redirect()->route('kontak.index')->with('success', 'Kontak deleted successfully');

    }
}
