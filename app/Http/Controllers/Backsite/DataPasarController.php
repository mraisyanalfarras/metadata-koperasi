<?php

namespace App\Http\Controllers\Backsite;

use DOMDocument;
use App\Models\DataPasar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataPasarRequest;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Storage;

class DataPasarController extends Controller
{
    public function index()
    {
        $datapasar = DataPasar::all();
       
        return view('pages.backsite.datapasar.index', compact('datapasar'));
    }

    
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('pages.backsite.datapasar.create',compact('kecamatan'));
    }


    public function show($id)
    {
        $datapasar = DataPasar::with('Kecamatan')->findOrFail($id);
        return view('pages.backsite.datapasar.show', compact('datapasar'));
    }
    
    public function store(DataPasarRequest $request)
    {
        $newImage = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newImage = $request->judul . '.' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto_pasar', $newImage);
        } else {
            $newImage = '';
        }
    
        DataPasar::create([
            'namapasar' => $request->namapasar,
            'id_kecamatan' => $request->id_kecamatan,
            'alamat' => $request->alamat,
            'foto' => $newImage,
            'jumlah_kios' => $request->jumlah_kios
        ]);
    
        return redirect()->route('datapasar.index')->with('success', 'Data pasar berhasil ditambahkan.');
    }
    

   

    public function edit($id)
    {
        $datapasar = DataPasar::find($id);
        $kecamatan = Kecamatan::all();
        return view('pages.backsite.datapasar.edit',compact('datapasar', 'kecamatan'));
    }
    
    
    public function update(DataPasarRequest $request, $id)
        {
            $datapasar = DataPasar::findOrFail($id);
            $newImage = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newImage = $request->judul . '.' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto_pasar', $newImage);
        } else {
            $newImage = '';
        }
            // Update data pasar
            $datapasar->update([
                'namapasar' => $request->namapasar,
                'id_kecamatan' => $request->id_kecamatan,
                'alamat' => $request->alamat,
                'foto' => $newImage,
                'jumlah_kios' => $request->jumlah_kios
            ]);
        
            return redirect()->route('datapasar.index')->with('success', 'Data pasar berhasil diperbarui.');
        }
        

    public function destroy($id)
    {
        $datapasar = DataPasar::find($id);

        if ($datapasar->foto) {
            Storage::delete('foto' . $datapasar->foto);
        } 
        $datapasar->delete();
        return redirect()->route('datapasar.index')->with('success', 'datapasar deleted successfully');

    }
}
