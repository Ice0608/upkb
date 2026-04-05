<?php

namespace App\Http\Controllers;

use App\Models\Khusus;
use App\Models\Institusi;
use App\Models\SyaratKelayakan;
use App\Models\Silibus;
use App\Models\Kerjaya;
use App\Models\YuranPendaftaran;
use App\Models\YuranPilihan;
use App\Models\YuranAsrama;
use App\Models\YuranPengajian;
use App\Models\Elaun;
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

        $institusi = Institusi::where('kod_institusi', $request->kod_institusi)->first();

        return redirect()->route('admin.editinstitusi', $institusi?->id)
                        ->with('success', 'Khusus added successfully.');
    }

    public function edit($id)
    {
        $khusus = Khusus::with([
            'syaratKelayakans',
            'silibuses',
            'kerjayas',
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ])->findOrFail($id);

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
        $khusus->update($request->only([
            'kod_khusus',
            'nama_khusus',
            'jenis_khusus',
            'mod_pengajian',
            'tempoh',
            'kuota',
            'tarikh_pendaftaran',
            'penerangan',
        ]));

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Khusus updated successfully.');
    }

    public function destroy($id)
    {
        $khusus = Khusus::findOrFail($id);
        $institusi = Institusi::where('kod_institusi', $khusus->kod_institusi)->first();
        $khusus->delete();

        return redirect()->route('admin.editinstitusi', $institusi?->id)
                        ->with('success', 'Khusus deleted successfully.');
    }

    public function storeSyarat(Request $request)
    {
        $request->validate([
            'khusus_id' => 'required|integer|exists:khususes,id',
            'syarat_kelayakan' => 'required|string',
        ]);

        $khusus = Khusus::findOrFail($request->khusus_id);

        SyaratKelayakan::create([
            'kod_institusi' => $khusus->kod_institusi,
            'kod_khusus' => $khusus->kod_khusus,
            'syarat_kelayakan' => $request->syarat_kelayakan,
        ]);

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Syarat kelayakan berjaya ditambah.');
    }

    public function destroySyarat($id)
    {
        $item = SyaratKelayakan::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Syarat kelayakan berjaya dipadam.');
    }

    public function storeSilibus(Request $request)
    {
        $request->validate([
            'khusus_id' => 'required|integer|exists:khususes,id',
            'topik' => 'required|string|max:255',
            'isi_kandungan' => 'required|string',
        ]);

        $khusus = Khusus::findOrFail($request->khusus_id);

        Silibus::create([
            'kod_institusi' => $khusus->kod_institusi,
            'kod_khusus' => $khusus->kod_khusus,
            'topik' => $request->topik,
            'isi_kandungan' => $request->isi_kandungan,
        ]);

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Struktur silibus berjaya ditambah.');
    }

    public function destroySilibus($id)
    {
        $item = Silibus::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Struktur silibus berjaya dipadam.');
    }

    public function storeKerjaya(Request $request)
    {
        $request->validate([
            'khusus_id' => 'required|integer|exists:khususes,id',
            'bidang_kerjaya' => 'required|string|max:255',
        ]);

        $khusus = Khusus::findOrFail($request->khusus_id);

        Kerjaya::create([
            'kod_institusi' => $khusus->kod_institusi,
            'kod_khusus' => $khusus->kod_khusus,
            'bidang_kerjaya' => $request->bidang_kerjaya,
        ]);

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Laluan kerjaya berjaya ditambah.');
    }

    public function destroyKerjaya($id)
    {
        $item = Kerjaya::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Laluan kerjaya berjaya dipadam.');
    }

    public function storeYuranPendaftaran(Request $request)
    {
        $request->validate([
            'khusus_id' => 'required|integer|exists:khususes,id',
            'item' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $khusus = Khusus::findOrFail($request->khusus_id);

        YuranPendaftaran::create([
            'kod_institusi' => $khusus->kod_institusi,
            'kod_khusus' => $khusus->kod_khusus,
            'item' => $request->item,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Yuran pendaftaran berjaya ditambah.');
    }

    public function destroyYuranPendaftaran($id)
    {
        $item = YuranPendaftaran::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Item yuran pendaftaran berjaya dipadam.');
    }

    public function storeYuranPilihan(Request $request)
    {
        $request->validate([
            'khusus_id' => 'required|integer|exists:khususes,id',
            'pilihan' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $khusus = Khusus::findOrFail($request->khusus_id);

        YuranPilihan::create([
            'kod_institusi' => $khusus->kod_institusi,
            'kod_khusus' => $khusus->kod_khusus,
            'pilihan' => $request->pilihan,
            'item' => $request->item,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Yuran pilihan berjaya ditambah.');
    }

    public function destroyYuranPilihan($id)
    {
        $item = YuranPilihan::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Item yuran pilihan berjaya dipadam.');
    }

    public function storeYuranAsrama(Request $request)
    {
        $request->validate([
            'khusus_id' => 'required|integer|exists:khususes,id',
            'item' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $khusus = Khusus::findOrFail($request->khusus_id);

        YuranAsrama::create([
            'kod_institusi' => $khusus->kod_institusi,
            'kod_khusus' => $khusus->kod_khusus,
            'item' => $request->item,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Yuran asrama berjaya ditambah.');
    }

    public function destroyYuranAsrama($id)
    {
        $item = YuranAsrama::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Item yuran asrama berjaya dipadam.');
    }

    public function storeYuranPengajian(Request $request)
    {
        $request->validate([
            'khusus_id' => 'required|integer|exists:khususes,id',
            'peringkat' => 'required|string|max:255',
            'tempoh' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $khusus = Khusus::findOrFail($request->khusus_id);

        YuranPengajian::create([
            'kod_institusi' => $khusus->kod_institusi,
            'kod_khusus' => $khusus->kod_khusus,
            'peringkat' => $request->peringkat,
            'tempoh' => $request->tempoh,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Yuran pengajian berjaya ditambah.');
    }

    public function destroyYuranPengajian($id)
    {
        $item = YuranPengajian::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Item yuran pengajian berjaya dipadam.');
    }

    public function storeElaun(Request $request)
    {
        $request->validate([
            'khusus_id' => 'required|integer|exists:khususes,id',
            'elaun_bulanan' => 'required|string|max:255',
            'tempoh' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        $khusus = Khusus::findOrFail($request->khusus_id);

        Elaun::create([
            'kod_institusi' => $khusus->kod_institusi,
            'kod_khusus' => $khusus->kod_khusus,
            'elaun_bulanan' => $request->elaun_bulanan,
            'tempoh' => $request->tempoh,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Elaun berjaya ditambah.');
    }

    public function destroyElaun($id)
    {
        $item = Elaun::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Item elaun berjaya dipadam.');
    }
}
