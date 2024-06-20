<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SejarahController extends Controller
{
    public function index(){

        return view('pages.backsite.sejarah.index');
    }

    public function show()
    {
        return Sejarah::first();
    }

    public function update(Request $request)
    {
        $sejarah = Sejarah::first();
        $sejarah->judul = $request->judul;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = 'foto-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img_sejarah'), $nama);

            $sejarah->foto = "/img_sejarah/$nama";
        }

        $sejarah->deskripsi = $request->deskripsi;
        

       
        $sejarah->update();

        return redirect()->route('sejarah.index')->with('success', 'Perubahan berhasil disimpan');
    }
}
