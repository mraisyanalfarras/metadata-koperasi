<?php

namespace App\Http\Controllers\Backsite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\KoperasiRequest;
use App\Models\KategoriKoperasi;
use App\Models\Koperasi;
use Illuminate\Support\Facades\Storage;

class KoperasiController extends Controller
{
    public function index()
    {
        $koperasi = Koperasi::all();
        return view('pages.backsite.koperasi.index', compact('koperasi'));
    }

    
    public function create()
    {
        $kategorikoperasi = KategoriKoperasi::all();
        return view('pages.backsite.koperasi.create',compact('kategorikoperasi'));
    }


    public function show($id)
    {
        $koperasi = Koperasi::with('kategorikoperasi')->findOrFail($id);
        return view('pages.backsite.koperasi.show', compact('koperasi'));
    }
    
    public function store(KoperasiRequest $request)
    {
        $newImage = '';
    
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $newImage = $request->file('foto')->store('foto_koperasi', 'public');
        }
    
        Koperasi::create([
            'nama_koperasi' => $request->nama_koperasi,
            'id_kategorikoperasi' => $request->id_kategorikoperasi,
            'alamat' => $request->alamat,
            'foto' => $newImage,
            'kecamatan' => $request->kecamatan
        ]);
    
        return redirect()->route('koperasi.index')->with('success', 'Data koperasi berhasil ditambahkan.');
    }
    

    public function destroy($id)
    {
        $koperasi = Koperasi::find($id);

        if ($koperasi->foto) {
            Storage::delete('foto' . $koperasi->foto);
        } 
        $koperasi->delete();
        return redirect()->route('koperasi.index')->with('success', 'koperasi deleted successfully');

    }
}
