<?php

namespace App\Http\Controllers;

use App\Models\Khusus;
use App\Models\Institusi;
use Illuminate\Http\Request;

class AdminKhususController extends Controller
{
    public function create($kod_institusi)
    {
        return view('admin.addkhusus', compact('kod_institusi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kod_khusus' => 'required|string|max:255',
            'kod_institusi' => 'required|string|max:255',
            'nama_khusus' => 'required|string|max:255',
            'jenis_khusus' => 'required|string|max:255',
            'mod_pengajian' => 'required|string|max:255',
            'tempoh' => 'required|string|max:255',
            'kuota' => 'required|integer',
            'tarikh_pendaftaran' => 'required|date',
            'penerangan' => 'required|string',
        ]);

        Khusus::create($request->all());

        return redirect()->route('admin.editinstitusi', Khusus::where('kod_institusi', $request->kod_institusi)->first()->id)
                        ->with('success', 'Khusus added successfully.');
    }

    public function edit($id)
    {
        $khusus = Khusus::findOrFail($id);
        return view('admin.editkhusus', compact('khusus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kod_khusus' => 'required|string|max:255',
            'nama_khusus' => 'required|string|max:255',
            'jenis_khusus' => 'required|string|max:255',
            'mod_pengajian' => 'required|string|max:255',
            'tempoh' => 'required|string|max:255',
            'kuota' => 'required|integer',
            'tarikh_pendaftaran' => 'required|date',
            'penerangan' => 'required|string',
        ]);

        $khusus = Khusus::findOrFail($id);
        $institusi_id = null;
        
        foreach (Institusi::where('kod_institusi', $khusus->kod_institusi)->get() as $inst) {
            $institusi_id = $inst->id;
            break;
        }

        $khusus->update($request->except('kod_institusi', 'kod_khusus'));

        return redirect()->route('admin.editinstitusi', $institusi_id)
                        ->with('success', 'Khusus updated successfully.');
    }

    public function destroy($id)
    {
        $khusus = Khusus::findOrFail($id);
        $kod_institusi = $khusus->kod_institusi;
        $institusi_id = null;
        
        foreach (Institusi::where('kod_institusi', $kod_institusi)->get() as $inst) {
            $institusi_id = $inst->id;
            break;
        }

        $khusus->delete();

        return redirect()->route('admin.editinstitusi', $institusi_id)
                        ->with('success', 'Khusus deleted successfully.');
    }
}
