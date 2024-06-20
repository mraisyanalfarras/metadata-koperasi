<?php

namespace App\Http\Controllers\Backsite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriKoperasiRequest;
use App\Models\KategoriKoperasi;

class KategoriKoperasiController extends Controller
{
    public function index()
    {
        $kategorikoperasi = KategoriKoperasi::all();
        return view('pages.backsite.kategorikoperasi.index', compact('kategorikoperasi'));
        
    }


    public function create()
    {
        
        return view('pages.backsite.kategorikoperasi.create');
    }


    public function store(KategoriKoperasiRequest $request)
    {
        KategoriKoperasi::create([
            'nama' => $request->nama,
            
        ]);

        return redirect()->route('kategorikoperasi.index')->with('success', 'kategorikoperasi Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategorikoperasi = KategoriKoperasi::find($id);
        return view('kategorikoperasi.show',compact('kategorikoperasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategorikoperasi = KategoriKoperasi::find($id);
        return view('pages.backsite.kategorikoperasi.edit',compact('kategorikoperasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriKoperasiRequest $request, $id)
    {
        $kategorikoperasi = KategoriKoperasi::find($id);

        $kategorikoperasi->update([

            'nama' => $request->nama,
        ]);

        return redirect()->route('kategorikoperasi.index')->with('success', 'kategorikoperasi created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategorikoperasi = KategoriKoperasi::find($id);
        
        $kategorikoperasi->delete();
        return redirect()->route('kategorikoperasi.index')->with('success', 'kategorikoperasi deleted successfully');

    }
}
