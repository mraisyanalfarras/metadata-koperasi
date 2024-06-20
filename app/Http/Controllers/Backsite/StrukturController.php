<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Struktur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StrukturController extends Controller
{
    public function index(){

        return view('pages.backsite.struktur.index');
    }

    public function show()
    {
        return Struktur::first();
    }

    public function update(Request $request)
    {
        $struktur = Struktur::first();
        $struktur->judul = $request->judul;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = 'foto-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img_struktur'), $nama);

            $struktur->foto = "/img_struktur/$nama";
        }
    
        $struktur->update();

        return redirect()->route('struktur.index')->with('success', 'Perubahan berhasil disimpan');
    }
}
