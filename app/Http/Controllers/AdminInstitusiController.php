<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use App\Models\Khusus;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminInstitusiController extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->query('jenis');

        if ($jenis) {
            $institusis = Institusi::where('jenis_institusi', $jenis)->get();
        } else {
            $institusis = Institusi::all();
        }

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
        $khususList = Khusus::where('kod_institusi', $institusi->kod_institusi)->get();
        $galeriList = Galeri::where('kod_institusi', $institusi->kod_institusi)->get();
        return view('admin.editinstitusi', compact('institusi', 'khususList', 'galeriList'));
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
        $institusi->delete();

        return redirect()->route('admin.institusis')->with('success', 'Institusi deleted successfully.');
    }
}
