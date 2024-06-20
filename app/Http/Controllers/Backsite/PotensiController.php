<?php

namespace App\Http\Controllers\Backsite;

use DOMDocument;
use App\Models\Potensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PotensiRequest;
use Illuminate\Support\Facades\Storage;

class PotensiController extends Controller
{
    public function index()
    {
        $potensi = Potensi::all();
        return view('pages.backsite.potensi.index', compact('potensi'));
        
    }


    public function create()
    {
        $potensi = Potensi::all();
        return view('pages.backsite.potensi.create',compact('potensi'));
    }


    public function store(PotensiRequest $request)
    {
        $deskripsi = $request->deskripsi;

        $dom = new DOMDocument();
        $dom->loadHTML($deskripsi,9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time(). $key.'.png';
            file_put_contents(public_path().$image_name,$data);

            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }
        $deskripsi = $dom->saveHTML();

        $newImage = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newImage = $request->judul . '.' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto_potensi', $newImage);
        } else {
            $newImage = '';
        }

        Potensi::create([
            'judul' => $request->judul,
            'deskripsi' => $deskripsi,
            'foto' => $newImage
        ]);

        return redirect()->route('potensi.index')->with('success', 'Potensi Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $potensi = Potensi::find($id);
        return view('potensi.show',compact('potensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $potensi = Potensi::find($id);
        return view('pages.backsite.potensi.edit',compact('potensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PotensiRequest $request, $id)
    {
        $potensi = Potensi::find($id);

        $deskripsi = $request->deskripsi;

        $dom = new DOMDocument();
        $dom->loadHTML($deskripsi,9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            // Check if the image is a new one
            if (strpos($img->getAttribute('src'),'data:image/') ===0) {
              
                $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
                $image_name = "/upload/" . time(). $key.'.png';
                file_put_contents(public_path().$image_name,$data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src',$image_name);
            }

        }
        $deskripsi = $dom->saveHTML();

        $newImage = '';

        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newImage = $request->judul . '.' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto_potensi', $newImage);
    
            // Hapus dokumen yang sudah ada sebelumnya jika ada
            if ($potensi->foto) {
                Storage::delete('foto_potensi/' . $potensi->foto);
            }
    
            $potensi->update([
                'judul' => $request->judul,
                'deskripsi' => $deskripsi,
                'foto' => $newImage
            ]);
        } else {
            // Jika tidak ada foto yang diunggah baru, gunakan foto yang ada sebelumnya
            $potensi->update([
                'judul' => $request->judul,
                'deskripsi' => $deskripsi,
            ]);
        }

        return redirect()->route('potensi.index')->with('success', 'Potensi created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $potensi = Potensi::find($id);
        
        $dom= new DOMDocument();
        // $dom->loadHTML($potensi->deskripsi,9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            
            $src = $img->getAttribute('src');
            $newImage = Str::of($src)->after('/');


            if (File::exists($newImage)) {
                File::delete($newImage);
               
            }
        }

        if ($potensi->foto) {
            Storage::delete('foto_potensi/' . $potensi->foto);
        }

        $potensi->delete();
        return redirect()->route('potensi.index')->with('success', 'Potensi deleted successfully');

    }
}
