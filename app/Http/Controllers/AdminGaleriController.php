<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Institusi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminGaleriController extends Controller
{
    public function create($kod_institusi)
    {
        return view('admin.addgaleri', compact('kod_institusi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kod_institusi' => 'required|string|max:255',
            'imej' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
            'penerangan' => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('imej')) {
            $image = $request->file('imej');
            $filename = Str::slug($request->kod_institusi) . '-' . time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('galeri', $image, $filename);
            $imagePath = 'galeri/' . $filename;
        }

        $institusi_id = Institusi::where('kod_institusi', $request->kod_institusi)->first()->id;

        Galeri::create([
            'kod_institusi' => $request->kod_institusi,
            'imej' => $imagePath,
            'penerangan' => $request->penerangan,
        ]);

        return redirect()->route('admin.editinstitusi', $institusi_id)
                        ->with('success', 'Foto galeri added successfully.');
    }

    public function edit($id)
    {
        $foto = Galeri::findOrFail($id);
        return view('admin.editgaleri', compact('foto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'imej' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'penerangan' => 'required|string',
        ]);

        $foto = Galeri::findOrFail($id);
        $institusi_id = Institusi::where('kod_institusi', $foto->kod_institusi)->first()->id;

        $data = [
            'penerangan' => $request->penerangan,
        ];

        if ($request->hasFile('imej')) {
            $image = $request->file('imej');
            $filename = Str::slug($foto->kod_institusi) . '-' . time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('galeri', $image, $filename);
            $data['imej'] = 'galeri/' . $filename;
        }

        $foto->update($data);

        return redirect()->route('admin.editinstitusi', $institusi_id)
                        ->with('success', 'Foto galeri updated successfully.');
    }

    public function destroy($id)
    {
        $foto = Galeri::findOrFail($id);
        $institusi_id = Institusi::where('kod_institusi', $foto->kod_institusi)->first()->id;
        $foto->delete();

        return redirect()->route('admin.editinstitusi', $institusi_id)
                        ->with('success', 'Foto galeri deleted successfully.');
    }
}
