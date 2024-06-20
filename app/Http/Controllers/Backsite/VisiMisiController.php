<?php

namespace App\Http\Controllers\Backsite;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisiMisiController extends Controller
{
    public function index() {
        return view('pages.backsite.visimisi.index');
    }

    public function show() {
        return VisiMisi::first();
    }

    public function update(Request $request) {

        $visimisi = VisiMisi::first();
        $visimisi->judul = $request->judul;
        $visimisi->deskripsi = $request->deskripsi;

        $visimisi->update();

        return redirect()->route('visimisi.index')->with('success', 'Perubahan Berhasil Disimpan');
    }
}
