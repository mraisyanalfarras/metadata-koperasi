<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Perangkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PerangkatRequest;
use Illuminate\Support\Facades\Storage;

class PerangkatController extends Controller
{
    public function index()
    {
        $perangkat = Perangkat::all();
        return view('pages.backsite.perangkat.index', compact('perangkat'));
        
    }


    public function create()
    {
        $perangkat = Perangkat::all();
        return view('pages.backsite.perangkat.create',compact('perangkat'));
    }


    public function store(PerangkatRequest $request)
    {

        $newImage = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newImage = $request->judul . '.' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto_perangkat', $newImage);
        } else {
            $newImage = '';
        }

        Perangkat::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $newImage
        ]);

        return redirect()->route('perangkat.index')->with('success', 'Jabatan Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perangkat = Perangkat::find($id);
        return view('perangkat.show',compact('perangkat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perangkat = Perangkat::find($id);
        return view('pages.backsite.perangkat.edit',compact('perangkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerangkatRequest $request, $id)
    {
        $perangkat = Perangkat::find($id);

        $newImage = '';

        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newImage = $request->nama . '.' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto_perangkat', $newImage);
    
            // Hapus dokumen yang sudah ada sebelumnya jika ada
            if ($perangkat->foto) {
                Storage::delete('foto_perangkat/' . $perangkat->foto);
            }
    
            $perangkat->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'foto' => $newImage
            ]);
        } else {
            // Jika tidak ada foto yang diunggah baru, gunakan foto yang ada sebelumnya
            $perangkat->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
            ]);
        }

        return redirect()->route('perangkat.index')->with('success', 'Perangkat created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perangkat = Perangkat::find($id);
        
        // foreach ($images as $key => $img) {
            
        //     $src = $img->getAttribute('src');
        //     $newImage = Str::of($src)->after('/');


        //     if (File::exists($newImage)) {
        //         File::delete($newImage);
               
        //     }
        // }

        if ($perangkat->foto) {
            Storage::delete('foto_perangkat/' . $perangkat->foto);
        }

        $perangkat->delete();
        return redirect()->route('perangkat.index')->with('success', 'Berita deleted successfully');

    }
}
