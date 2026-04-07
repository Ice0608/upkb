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
            'kuota' => 'nullable|integer',
            'tarikh_pendaftaran' => 'nullable|date',
            'penerangan' => 'required|string',
        ]);

        $data = $request->only([
            'kod_khusus',
            'kod_institusi',
            'nama_khusus',
            'jenis_khusus',
            'mod_pengajian',
            'tempoh',
            'kuota',
            'tarikh_pendaftaran',
            'penerangan',
        ]);

        if ($data['kuota'] === '') {
            $data['kuota'] = null;
        }

        if ($data['tarikh_pendaftaran'] === '') {
            $data['tarikh_pendaftaran'] = null;
        }

        Khusus::create($data);

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
            'kuota' => 'nullable|integer',
            'tarikh_pendaftaran' => 'nullable|date',
            'penerangan' => 'required|string',
        ]);

        $data = $request->only([
            'kod_khusus',
            'nama_khusus',
            'jenis_khusus',
            'mod_pengajian',
            'tempoh',
            'kuota',
            'tarikh_pendaftaran',
            'penerangan',
        ]);

        if ($data['kuota'] === '') {
            $data['kuota'] = null;
        }

        if ($data['tarikh_pendaftaran'] === '') {
            $data['tarikh_pendaftaran'] = null;
        }

        $khusus = Khusus::findOrFail($id);
        $khusus->update($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Khusus updated successfully.']);
        }

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

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Syarat kelayakan berjaya ditambah.']);
        }

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Syarat kelayakan berjaya ditambah.');
    }

    public function destroySyarat($id)
    {
        $item = SyaratKelayakan::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Syarat kelayakan berjaya dipadam.']);
        }

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

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Struktur silibus berjaya ditambah.']);
        }

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Struktur silibus berjaya ditambah.');
    }

    public function destroySilibus($id)
    {
        $item = Silibus::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Struktur silibus berjaya dipadam.']);
        }

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

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Laluan kerjaya berjaya ditambah.']);
        }

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Laluan kerjaya berjaya ditambah.');
    }

    public function destroyKerjaya($id)
    {
        $item = Kerjaya::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Laluan kerjaya berjaya dipadam.']);
        }

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

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Yuran pendaftaran berjaya ditambah.']);
        }

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Yuran pendaftaran berjaya ditambah.');
    }

    public function destroyYuranPendaftaran($id)
    {
        $item = YuranPendaftaran::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item yuran pendaftaran berjaya dipadam.']);
        }

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

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Yuran pilihan berjaya ditambah.']);
        }

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Yuran pilihan berjaya ditambah.');
    }

    public function destroyYuranPilihan($id)
    {
        $item = YuranPilihan::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item yuran pilihan berjaya dipadam.']);
        }

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

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Yuran asrama berjaya ditambah.']);
        }

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Yuran asrama berjaya ditambah.');
    }

    public function destroyYuranAsrama($id)
    {
        $item = YuranAsrama::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item yuran asrama berjaya dipadam.']);
        }

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

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Yuran pengajian berjaya ditambah.']);
        }

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Yuran pengajian berjaya ditambah.');
    }

    public function destroyYuranPengajian($id)
    {
        $item = YuranPengajian::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item yuran pengajian berjaya dipadam.']);
        }

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

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Elaun berjaya ditambah.']);
        }

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Elaun berjaya ditambah.');
    }

    public function destroyElaun($id)
    {
        $item = Elaun::findOrFail($id);
        $khusus = Khusus::where('kod_khusus', $item->kod_khusus)->first();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item elaun berjaya dipadam.']);
        }

        return redirect()->route('admin.editkhusus', $khusus->id)
                        ->with('success', 'Item elaun berjaya dipadam.');
    }

    public function tabMaklumat($id)
    {
        $khusus = Khusus::findOrFail($id);
        return view('admin._tab_maklumat', compact('khusus'));
    }

    public function tabSyarat($id)
    {
        $khusus = Khusus::with('syaratKelayakans')->findOrFail($id);
        return view('admin._tab_syarat', compact('khusus'));
    }

    public function tabSilibus($id)
    {
        $khusus = Khusus::with('silibuses')->findOrFail($id);
        return view('admin._tab_silibus', compact('khusus'));
    }

    public function tabKerjaya($id)
    {
        $khusus = Khusus::with('kerjayas')->findOrFail($id);
        return view('admin._tab_kerjaya', compact('khusus'));
    }

    public function tabYuran($id)
    {
        $khusus = Khusus::with([
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ])->findOrFail($id);
        return view('admin._tab_yuran', compact('khusus'));
    }
}
