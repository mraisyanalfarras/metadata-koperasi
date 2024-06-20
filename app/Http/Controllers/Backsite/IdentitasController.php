<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IdentitasController extends Controller
{
    public function index(){

        return view('pages.backsite.identitas.index');
    }

    public function show()
    {
        return Identitas::first();
    }

    public function update(Request $request)
    {
        $identitas = Identitas::first();
        $identitas->nama_desa = $request->nama_desa;
        $identitas->hari_kerja = $request->hari_kerja;
        $identitas->jam_kerja = $request->jam_kerja;
        $identitas->no_hp = $request->no_hp;
        $identitas->email = $request->email;
        $identitas->link_fb = $request->link_fb;
        $identitas->link_twit = $request->link_twit;
        $identitas->link_ig = $request->link_ig;
        $identitas->maps = $request->maps;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $nama = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img_identitas'), $nama);

            $identitas->logo = "/img_identitas/$nama";
        }
    
        $identitas->update();

        return redirect()->route('identitas.index')->with('success', 'Perubahan berhasil disimpan');
    }

}
