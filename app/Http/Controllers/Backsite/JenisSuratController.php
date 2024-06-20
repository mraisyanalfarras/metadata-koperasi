<?php

namespace App\Http\Controllers\Backsite;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Http\Requests\JenisRequest;
use App\Http\Controllers\Controller;

class JenisSuratController extends Controller
{
    public function index()
    {
        $jenisSurat = JenisSurat::all();
        return view('pages.backsite.jenisSurat.index', compact('jenisSurat'));
        
    }


    public function create()
    {
        $jenisSurat = JenisSurat::all();
        return view('pages.backsite.jenisSurat.create',compact('jenisSurat'));
    }


    public function store(JenisRequest $request)
    {
        JenisSurat::create([
            'kode_surat' => $request->kode_surat,
            'nama_surat' => $request->nama_surat,
            
        ]);

        return redirect()->route('jenis-surat.index')->with('success', 'Jenis Surat Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jenisSurat = JenisSurat::find($id);
        return view('jenisSurat.show',compact('jenisSurat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisSurat = JenisSurat::find($id);
        return view('pages.backsite.jenisSurat.edit',compact('jenisSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JenisRequest $request, $id)
    {
        $jenisSurat = JenisSurat::find($id);

        $jenisSurat->update([
            'code_surat' => $request->code_surat,
            'nama_surat' => $request->nama_surat,
        ]);

        return redirect()->route('jenis-surat.index')->with('success', 'Jenis Surat created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisSurat = JenisSurat::find($id);
        
        $jenisSurat->delete();
        return redirect()->route('jenis-surat.index')->with('success', 'Jenis Surat deleted successfully');

    }
}
