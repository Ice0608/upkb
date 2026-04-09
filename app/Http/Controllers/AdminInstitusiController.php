<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use App\Models\Kursus;
use App\Models\Galeri;
use App\Models\Silibus;
use App\Models\Kerjaya;
use App\Models\YuranPendaftaran;
use App\Models\YuranPilihan;
use App\Models\YuranAsrama;
use App\Models\YuranPengajian;
use App\Models\Elaun;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminInstitusiController extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->query('jenis');
        $negeri = $request->query('negeri');
        $kuota = $request->query('kuota');

        $query = Institusi::query();

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

        return view('admin.institusis', compact('institusis'));
    }

    public function create()
    {
        return view('admin.addinstitusi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kod_institusi' => 'required|string|max:255',
            'nama_institusi' => 'required|string|max:255',
            'jenis_institusi' => 'required|string|max:255',
            'gambar_institusi' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
            'alamat' => 'required|string',
            'mengenai_institusi' => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar_institusi')) {
            $image = $request->file('gambar_institusi');
            $filename = Str::slug($request->nama_institusi) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('images/institusi');
            if (! file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $image->move($destination, $filename);
            $imagePath = 'images/institusi/' . $filename;
        }

        Institusi::create([
            'kod_institusi' => $request->kod_institusi,
            'nama_institusi' => $request->nama_institusi,
            'jenis_institusi' => $request->jenis_institusi,
            'gambar_institusi' => $imagePath,
            'alamat' => $request->alamat,
            'mengenai_institusi' => $request->mengenai_institusi,
        ]);

        return redirect()->route('admin.institusis')->with('success', 'Institusi added successfully.');
    }

    public function edit($id)
    {
        $institusi = Institusi::findOrFail($id);
        $kursusList = Kursus::where('kod_institusi', $institusi->kod_institusi)->get();
        $galeriList = Galeri::where('kod_institusi', $institusi->kod_institusi)->get();
        return view('admin.editinstitusi', compact('institusi', 'kursusList', 'galeriList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kod_institusi' => 'required|string|max:255',
            'nama_institusi' => 'required|string|max:255',
            'jenis_institusi' => 'required|string|max:255',
            'gambar_institusi' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'alamat' => 'required|string',
            'mengenai_institusi' => 'required|string',
        ]);

        $institusi = Institusi::findOrFail($id);
        $data = [
            'kod_institusi' => $request->kod_institusi,
            'nama_institusi' => $request->nama_institusi,
            'jenis_institusi' => $request->jenis_institusi,
            'alamat' => $request->alamat,
            'mengenai_institusi' => $request->mengenai_institusi,
        ];

        if ($request->hasFile('gambar_institusi')) {
            $image = $request->file('gambar_institusi');
            $filename = Str::slug($request->nama_institusi) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('images/institusi');
            if (! file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $image->move($destination, $filename);
            $data['gambar_institusi'] = 'images/institusi/' . $filename;
        }

        $institusi->update($data);

        return redirect()->route('admin.institusis')->with('success', 'Institusi updated successfully.');
    }

    public function destroy($id)
    {
        $institusi = Institusi::findOrFail($id);
        $kod_institusi = $institusi->kod_institusi;

        // Delete related records
        Kursus::where('kod_institusi', $kod_institusi)->delete();
        Silibus::where('kod_institusi', $kod_institusi)->delete();
        Galeri::where('kod_institusi', $kod_institusi)->delete();
        Kerjaya::where('kod_institusi', $kod_institusi)->delete();
        YuranPendaftaran::where('kod_institusi', $kod_institusi)->delete();
        YuranPilihan::where('kod_institusi', $kod_institusi)->delete();
        YuranAsrama::where('kod_institusi', $kod_institusi)->delete();
        YuranPengajian::where('kod_institusi', $kod_institusi)->delete();
        Elaun::where('kod_institusi', $kod_institusi)->delete();

        // Delete the institusi
        $institusi->delete();

        return redirect()->route('admin.institusis')->with('success', 'Institusi and all related records deleted successfully.');
    }
}
