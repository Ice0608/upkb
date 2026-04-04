<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use App\Models\Khusus;
use App\Models\Galeri;
use Illuminate\Http\Request;

class InstitusiController extends Controller
{
    public function index()
    {
        $institusis = Institusi::all();
        return view('program.institusi', compact('institusis'));
    }

    public function show($id)
    {
        $institusi = Institusi::findOrFail($id);
        $khususList = Khusus::where('kod_institusi', $institusi->kod_institusi)->get();
        $galeriList = Galeri::where('kod_institusi', $institusi->kod_institusi)->get();
        return view('program.infoinstitusi', compact('institusi', 'khususList', 'galeriList'));
    }
}
