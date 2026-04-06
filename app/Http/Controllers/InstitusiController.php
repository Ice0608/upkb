<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use App\Models\Khusus;
use App\Models\Galeri;
use Illuminate\Http\Request;

class InstitusiController extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->jenis;
        
        $query = Institusi::query();
        
        if ($jenis) {
            $query->where('jenis_institusi', $jenis);
        }
        
        $institusis = $query->get();
        
        return view('program.institusi', compact('institusis', 'jenis'));
    }

    public function show($id)
    {
        $institusi = Institusi::findOrFail($id);
        $khususList = Khusus::where('kod_institusi', $institusi->kod_institusi)->get();
        $galeriList = Galeri::where('kod_institusi', $institusi->kod_institusi)->get();
        return view('program.infoinstitusi', compact('institusi', 'khususList', 'galeriList'));
    }
}
