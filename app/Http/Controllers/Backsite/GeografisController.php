<?php

namespace App\Http\Controllers\Backsite;

use DOMDocument;
use App\Models\Geografis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GeografisController extends Controller
{
    public function index(){

        return view('pages.backsite.geografis.index');
    }

    public function show()
    {
        return Geografis::first();
    }

    public function update(Request $request)
    {
        $geografis = Geografis::first();
        $geografis->judul = $request->judul;
    
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = 'foto-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img_geografis'), $nama);
            $geografis->foto = "/img_geografis/$nama";
        }
        
        $deskripsi = $request->deskripsi;
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($deskripsi, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
    
        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time() . $key . '.png';
            file_put_contents(public_path() . $image_name, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $geografis->deskripsi = $dom->saveHTML();
        $geografis->save();
    
        return redirect()->route('geografis.index')->with('success', 'Perubahan berhasil disimpan');
    }
    
}

