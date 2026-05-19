<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use App\Models\Kursus;
use App\Models\Galeri;
use Illuminate\Http\Request;

class InstitusiController extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->jenis;
        $negeri = $request->query('negeri');
        $kuota = $request->query('kuota');
        
        $query = Institusi::query()
            ->withCount('kursuses')
            ->with(['kursuses' => function ($q) {
                $q->select('id', 'kod_institusi', 'kod_kursus', 'nama_kursus');
            }]);
        
        if ($jenis) {
            $query->where('jenis_institusi', $jenis);
        }

        if ($negeri) {
            $query->where('alamat', 'LIKE', '%' . $negeri . '%');
        }

        if ($kuota) {
            $query->whereHas('kursuses', function ($q) {
                $q->where('kuota', '>', 0);
            });
        }
        
        $institusis = $query->get();
        
        return view('program.institusi', compact('institusis', 'jenis'));
    }

    public function show($id)
    {
        $institusi = Institusi::findOrFail($id);
        $kursusList = Kursus::where('kod_institusi', $institusi->kod_institusi)->get();
        $galeriList = Galeri::where('kod_institusi', $institusi->kod_institusi)
            ->where(function ($query) {
                $query->whereNull('kod_kursus')
                      ->orWhere('kod_kursus', '');
            })
            ->get();
        return view('program.infoinstitusi', compact('institusi', 'kursusList', 'galeriList'));
    }
}
