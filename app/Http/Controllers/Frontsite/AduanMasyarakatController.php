<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Aduan;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Requests\AduanRequest;
use App\Http\Controllers\Controller;

class AduanMasyarakatController extends Controller
{
    public function create()
    {
        $aduan = Aduan::all();
        $identitas = Identitas::first();
        return view('pages.frontsite.aduan.create',compact('aduan','identitas'));
    }

    public function store(AduanRequest $request)
    {
        Aduan::create([
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('aduan-masyarakat.create')->with('success', 'Aduan Anda telah terkirim. Terima kasih!');
    }
}
