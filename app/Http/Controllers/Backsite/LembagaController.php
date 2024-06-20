<?php

namespace App\Http\Controllers\Backsite;

use DOMDocument;
use App\Models\Lembaga;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\LembagaRequest;
use Illuminate\Support\Facades\Storage;

class LembagaController extends Controller
{
    public function index()
    {
        $lembaga = Lembaga::all();
        return view('pages.backsite.lembaga.index', compact('lembaga'));
        
    }


    public function create()
    {
        $lembaga = Lembaga::all();
        return view('pages.backsite.lembaga.create',compact('lembaga'));
    }


    public function store(LembagaRequest $request)
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
            $request->file('foto')->storeAs('foto_lembaga', $newImage);
        } else {
            $newImage = '';
        }

        Lembaga::create([
            'judul' => $request->judul,
            'deskripsi' => $deskripsi,
            'foto' => $newImage
        ]);

        return redirect()->route('lembaga.index')->with('success', 'Lembaga Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lembaga = Lembaga::find($id);
        return view('lembaga.show',compact('lembaga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lembaga = Lembaga::find($id);
        return view('pages.backsite.lembaga.edit',compact('lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LembagaRequest $request, $id)
    {
        $lembaga = Lembaga::find($id);

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
            $request->file('foto')->storeAs('foto_lembaga', $newImage);
    
            // Hapus dokumen yang sudah ada sebelumnya jika ada
            if ($lembaga->foto) {
                Storage::delete('foto_lembaga/' . $lembaga->foto);
            }
    
            $lembaga->update([
                'judul' => $request->judul,
                'deskripsi' => $deskripsi,
                'foto' => $newImage
            ]);
        } else {
            // Jika tidak ada foto yang diunggah baru, gunakan foto yang ada sebelumnya
            $lembaga->update([
                'judul' => $request->judul,
                'deskripsi' => $deskripsi,
            ]);
        }

        return redirect()->route('lembaga.index')->with('success', 'lembaga created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lembaga = Lembaga::find($id);
        
        $dom= new DOMDocument();
        // $dom->loadHTML($lembaga->deskripsi,9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            
            $src = $img->getAttribute('src');
            $newImage = Str::of($src)->after('/');


            if (File::exists($newImage)) {
                File::delete($newImage);
               
            }
        }

        if ($lembaga->foto) {
            Storage::delete('foto_lembaga/' . $lembaga->foto);
        }

        $lembaga->delete();
        return redirect()->route('lembaga.index')->with('success', 'lembaga deleted successfully');

    }
}
