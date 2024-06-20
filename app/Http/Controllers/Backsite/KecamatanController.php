<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Kecamatan;
use App\Http\Controllers\Controller;
use App\Http\Requests\KecamatanRequest;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('pages.backsite.kecamatan.index', compact('kecamatan'));
        
    }


    public function create()
    {
        
        return view('pages.backsite.kecamatan.create');
    }


    public function store(KecamatanRequest $request)
    {
        Kecamatan::create([
            'nama' => $request->nama,
            
        ]);

        return redirect()->route('kecamatan.index')->with('success', 'kecamatan Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kecamatan = Kecamatan::find($id);
        return view('kecamatan.show',compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::find($id);
        return view('pages.backsite.Kecamatan.edit',compact('Kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KecamatanRequest $request, $id)
    {
        $kecamatan = Kecamatan::find($id);

        $kecamatan->update([

            'nama' => $request->nama,
        ]);

        return redirect()->route('kecamatan.index')->with('success', 'kecamatan created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::find($id);
        
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'kecamatan deleted successfully');

    }
}
