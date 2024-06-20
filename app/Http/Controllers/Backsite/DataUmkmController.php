<?php

namespace App\Http\Controllers\Backsite;

use App\Models\DataUmks;
use App\Models\KategoriUmkm;
use Illuminate\Http\Request;
use App\Models\KategoriKoperasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DataUmkmController extends Controller
{
    public function index()
    {
        $dataumkm = DataUmks::all();
        return view('pages.backsite.dataumkm.index', compact('dataumkm'));
    }

    // Menampilkan form untuk membuat UMKM baru
    public function create()
    {
        $kategoriumkm = KategoriUmkm::all();
        return view('pages.backsite.dataumkm.create', compact('kategoriumkm'));
    }

   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'id_kategoriumkm' => 'nullable|integer',
            'alamat' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'pemilik' => 'required|string|max:255',
            'no_telp' => 'required|string',
            'email' => 'required|string|max:255',
            'tgl_berdiri' => 'required|string|max:255',
        ]);
        $newImage = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newImage = $request->judul . '.' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto_umkm', $newImage);
        } else {
            $newImage = '';
        }
        
        DataUmks::create([
            'nama_umkm' => $request->nama_umkm,
            'id_kategoriumkm' =>$request->id_kategoriumkm,
            'alamat' => $request->alamat,
            'foto' => $newImage,
            'pemilik' => $request->pemilik,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'tgl_berdiri' => $request->tgl_berdiri
        ]);

        return redirect()->route('dataumkm.index')->with('success', 'Data UmkmBerhasil Ditambah');
    }

    // Menampilkan detail UMKM
    public function show(DataUmks $dataumkm, $id)
    {
        $dataumkm = DataUmks::findorfail($id);
        $kategoriumkm = KategoriKoperasi::all();
        return view('pages.backsite.dataumkm.show', compact('dataumkm'));
    }

    // Menampilkan form untuk mengedit UMKM
    public function edit(DataUmks $dataumkm)
    {
        $kategoriumkm = KategoriUmkm::all();
        return view('pages.backsite.dataumkm.edit', compact('dataumkm', 'kategoriumkm'));
    }

    // Menyimpan perubahan pada UMKM ke database
    public function update(Request $request, $id)
    {
        $dataumkm = DataUmks::findOrFail($id);
    
        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'id_kategoriumkm' => 'nullable|integer',
            'alamat' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'pemilik' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'tgl_berdiri' => 'required|date',
        ]);
    
        // Handle image upload if a new file is provided
        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newImage = $request->nama_umkm . '.' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto_umkm', $newImage);
    
            // Delete old image if exists
            if ($dataumkm->foto) {
                Storage::delete('foto_umkm/' . $dataumkm->foto);
            }
    
            $dataumkm->foto = $newImage;
        }
    
        // Update data
        $dataumkm->nama_umkm = $request->nama_umkm;
        $dataumkm->id_kategoriumkm = $request->id_kategoriumkm;
        $dataumkm->alamat = $request->alamat;
        $dataumkm->pemilik = $request->pemilik;
        $dataumkm->email = $request->email;
        $dataumkm->tgl_berdiri = $request->tgl_berdiri;
        $dataumkm->save();
    
        return redirect()->route('dataumkm.index')->with('success', 'Data UMKM berhasil diperbarui');
    }

    // Menghapus UMKM dari database
    public function destroy(DataUmks $dataumkm)
    {
        $dataumkm->delete();
        return redirect()->route('dataumkm.index');
    }

}
