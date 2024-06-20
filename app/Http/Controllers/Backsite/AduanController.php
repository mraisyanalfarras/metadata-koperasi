<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Aduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AduanController extends Controller
{
    public function index()
    {
        $aduan = Aduan::all();
        return view('pages.backsite.aduan.index', compact('aduan'));
    }

    public function show($id)
    {
        $aduan = Aduan::findOrFail($id);
        return view('pages.backsite.aduan.show', compact('aduan'));
    }

    public function destroy($id)
    {
        $aduan = Aduan::find($id);
    
        $aduan->delete();
        return redirect()->route('aduan.index')->with('success', 'aduan deleted successfully');

    }
}
