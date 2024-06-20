<?php

namespace App\Http\Controllers\Backsite;

use App\Models\KategoriUmkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriUmkmController extends Controller
{
    public function index()
    {
        $kategoriumkm = KategoriUmkm::all();
        return view('pages.backsite.kategoriumkm.index', compact('kategoriumkm'));
    }

    public function create()
    {
        return view('pages.backsite.kategoriumkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategoriumkm = new KategoriUmkm();
        $kategoriumkm->nama = $request->nama;
        $kategoriumkm->save();

        return redirect()->route('kategoriumkm.index')->with('success', 'Kategori UMKM berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kategoriumkm = KategoriUmkm::findOrFail($id);
        return view('oages.backsite.kategoriumkm.edit', compact('kategoriumkm'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategoriumkm = KategoriUmkm::findOrFail($id);
        $kategoriumkm->nama = $request->nama;
        $kategoriumkm->save();

        return redirect()->route('kategoriumkm.index')->with('success', 'Kategori UMKM berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kategoriumkm = KategoriUMKM::findOrFail($id);
        $kategoriumkm->delete();

        return redirect()->route('kategoriumkm.index')->with('success', 'Kategori UMKM berhasil dihapus.');
    }
}
