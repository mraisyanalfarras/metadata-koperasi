<?php

namespace App\Http\Controllers\Backsite;

use DOMDocument;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BeritaRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('pages.backsite.berita.index', compact('berita'));
        
    }


    public function create()
    {
        $berita = Berita::all();
        return view('pages.backsite.berita.create',compact('berita'));
    }


    public function store(BeritaRequest $request)
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
            $request->file('foto')->storeAs('foto_berita', $newImage);
        } else {
            $newImage = '';
        }

        Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $deskripsi,
            'foto' => $newImage
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berita = Berita::find($id);
        return view('berita.show',compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('pages.backsite.berita.edit',compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeritaRequest $request, $id)
    {
        $berita = Berita::find($id);

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
            $request->file('foto')->storeAs('foto_berita', $newImage);
    
            // Hapus dokumen yang sudah ada sebelumnya jika ada
            if ($berita->foto) {
                Storage::delete('foto_berita/' . $berita->foto);
            }
    
            $berita->update([
                'judul' => $request->judul,
                'deskripsi' => $deskripsi,
                'foto' => $newImage
            ]);
        } else {
            // Jika tidak ada foto yang diunggah baru, gunakan foto yang ada sebelumnya
            $berita->update([
                'judul' => $request->judul,
                'deskripsi' => $deskripsi,
            ]);
        }

        return redirect()->route('berita.index')->with('success', 'Berita created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        
        $dom= new DOMDocument();
        // $dom->loadHTML($berita->deskripsi,9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            
            $src = $img->getAttribute('src');
            $newImage = Str::of($src)->after('/');


            if (File::exists($newImage)) {
                File::delete($newImage);
               
            }
        }

        if ($berita->foto) {
            Storage::delete('foto_berita/' . $berita->foto);
        }

        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita deleted successfully');

    }
}
