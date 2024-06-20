<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Kontak;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\KontakRequest;
use Illuminate\Support\Facades\Notification;

class KontakDesaController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();
        $identitas = Identitas::first();

        return view('pages.frontsite.kontak.index', compact('kontak','identitas')); 
    }

    public function store(KontakRequest $request)
    {
        // $user = User::all();
        $kontak = Kontak::create($request->all());
        // Notification::send($user, new KontakNotification($request->nama_lengkap));
        return redirect()->route('kontak-desa.index')->with('success', 'Pesan telah terkirim. Terima kasih!');

    }

}
