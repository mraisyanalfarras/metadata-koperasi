<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Motto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MottoController extends Controller
{
    public function index() {
        return view('pages.backsite.motto.index');
    }

    public function show() {
        return Motto::first();
    }

    public function update(Request $request) {

        $motto = Motto::first();
        $motto->judul = $request->judul;
        $motto->deskripsi = $request->deskripsi;

        $motto->update();

        return redirect()->route('motto.index')->with('success', 'Perubahan Berhasil Disimpan');
    }
}
