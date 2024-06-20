<?php

namespace App\Http\Controllers\Backsite;

use DOMDocument;
use App\Models\Fasilitas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\FasilitasRequest;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('pages.backsite.fasilitas.index', compact('fasilitas'));
        
    }


    public function create()
    {
        $fasilitas = Fasilitas::all();
        return view('pages.backsite.fasilitas.create',compact('fasilitas'));
    }


    public function store(FasilitasRequest $request)
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
            $request->file('foto')->storeAs('foto_fasilitas', $newImage);
        } else {
            $newImage = '';
        }

        Fasilitas::create([
            'judul' => $request->judul,
            'deskripsi' => $deskripsi,
            'foto' => $newImage,
            'maps' => $request->maps 
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Berita Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fasilitas = Fasilitas::find($id);
        return view('fasilitas.show',compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::find($id);
        return view('pages.backsite.fasilitas.edit',compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FasilitasRequest $request, $id)
    {
        $fasilitas = Fasilitas::find($id);

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
            $request->file('foto')->storeAs('foto_fasilitas', $newImage);
    
            // Hapus dokumen yang sudah ada sebelumnya jika ada
            if ($fasilitas->foto) {
                Storage::delete('foto_fasilitas/' . $fasilitas->foto);
            }
    
            $fasilitas->update([
                'judul' => $request->judul,
                'deskripsi' => $deskripsi,
                'foto' => $newImage,
                'maps' => $request->maps 
            ]);
        } else {
            // Jika tidak ada foto yang diunggah baru, gunakan foto yang ada sebelumnya
            $fasilitas->update([
                'judul' => $request->judul,
                'deskripsi' => $deskripsi,
                'maps' => $request->maps, 
            ]);
        }

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);
        
        $dom= new DOMDocument();
        // $dom->loadHTML($fasilitas->deskripsi,9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            
            $src = $img->getAttribute('src');
            $newImage = Str::of($src)->after('/');


            if (File::exists($newImage)) {
                File::delete($newImage);
               
            }
        }

        if ($fasilitas->foto) {
            Storage::delete('foto_fasilitas/' . $fasilitas->foto);
        }

        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas deleted successfully');

    }
}
