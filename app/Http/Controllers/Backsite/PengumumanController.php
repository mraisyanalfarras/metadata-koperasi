<?php

namespace App\Http\Controllers\Backsite;

use DOMDocument;
use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PengumumanRequest;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('pages.backsite.pengumuman.index', compact('pengumuman'));
        
    }


    public function create()
    {
        $pengumuman = Pengumuman::all();
        return view('pages.backsite.pengumuman.create',compact('pengumuman'));
    }


    public function store(PengumumanRequest $request)
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

        Pengumuman::create([
            'judul' => $request->judul,
            'deskripsi' => $deskripsi,
        ]);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('pengumuman.show',compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('pages.backsite.pengumuman.edit',compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PengumumanRequest $request, $id)
    {
        $pengumuman = Pengumuman::find($id);

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

        $pengumuman->update([
            'judul' => $request->judul,
            'deskripsi' => $deskripsi,
        ]);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        
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
        
        $pengumuman->delete();
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman deleted successfully');

    }
}
