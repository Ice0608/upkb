<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Institusi;
use App\Models\SyaratKelayakan;
use App\Models\Kerjaya;
use App\Models\YuranPendaftaran;
use App\Models\YuranPilihan;
use App\Models\YuranAsrama;
use App\Models\YuranPengajian;
use App\Models\Elaun;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminKursusController extends Controller
{
    public function create($kod_institusi)
    {
        return view('admin.addkursus', compact('kod_institusi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kod_kursus' => 'required|string|max:255',
            'kod_institusi' => 'required|string|max:255',
            'nama_kursus' => 'required|string|max:255',
            'jenis_kursus' => 'required|string|max:255',
            'mod_pengajian' => 'required|string|max:255',
            'tempoh' => 'required|string|max:255',
            'kuota' => 'nullable|integer',
            'tarikh_pendaftaran' => 'nullable|date',
            'penerangan' => 'required|string',
        ]);

        $data = $request->only([
            'kod_kursus',
            'kod_institusi',
            'nama_kursus',
            'jenis_kursus',
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

        Kursus::create($data);

        $institusi = Institusi::where('kod_institusi', $request->kod_institusi)->first();

        return redirect()->route('admin.editinstitusi', $institusi?->id)
                        ->with('success', 'kursus added successfully.');
    }

    public function edit($id)
    {
        $kursus = Kursus::findOrFail($id)->loadScopedCourseDetails();

        return view('admin.editkursus', compact('kursus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kod_kursus' => 'required|string|max:255',
            'nama_kursus' => 'required|string|max:255',
            'jenis_kursus' => 'required|string|max:255',
            'mod_pengajian' => 'required|string|max:255',
            'tempoh' => 'required|string|max:255',
            'kuota' => 'nullable|integer',
            'tarikh_pendaftaran' => 'nullable|date',
            'penerangan' => 'required|string',
        ]);

        $data = $request->only([
            'kod_kursus',
            'nama_kursus',
            'jenis_kursus',
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

        $kursus = Kursus::findOrFail($id);
        $kursus->update($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'kursus updated successfully.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'kursus updated successfully.');
    }

    public function destroy($id)
    {
        $kursus = Kursus::findOrFail($id);
        $institusi = Institusi::where('kod_institusi', $kursus->kod_institusi)->first();
        $kursus->delete();

        return redirect()->route('admin.editinstitusi', $institusi?->id)
                        ->with('success', 'kursus deleted successfully.');
    }

    public function storeSyarat(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer|exists:kursuses,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        $kursus = Kursus::findOrFail($request->kursus_id);

        $file = $request->file('gambar');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::slug($originalName) . '-' . time() . '.' . $extension;
        $destination = public_path('images/institusi');

        if (! file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $fileName);

        SyaratKelayakan::create([
            'kod_institusi' => $kursus->kod_institusi,
            'kod_kursus' => $kursus->kod_kursus,
            'gambar' => 'images/institusi/' . $fileName,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Syarat kelayakan berjaya dimuat naik.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Syarat kelayakan berjaya dimuat naik.');
    }

    public function destroySyarat($id)
    {
        $item = SyaratKelayakan::findOrFail($id);
        $kursus = Kursus::where('kod_kursus', $item->kod_kursus)
            ->where('kod_institusi', $item->kod_institusi)
            ->firstOrFail();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Syarat kelayakan berjaya dipadam.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Syarat kelayakan berjaya dipadam.');
    }

    public function storeKerjaya(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer|exists:kursuses,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        $kursus = Kursus::findOrFail($request->kursus_id);

        $file = $request->file('gambar');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::slug($originalName) . '-' . time() . '.' . $extension;
        $destination = public_path('images/institusi');

        if (! file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $fileName);

        Kerjaya::create([
            'kod_institusi' => $kursus->kod_institusi,
            'kod_kursus' => $kursus->kod_kursus,
            'gambar' => 'images/institusi/' . $fileName,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Laluan kerjaya berjaya dimuat naik.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Laluan kerjaya berjaya dimuat naik.');
    }

    public function destroyKerjaya($id)
    {
        $item = Kerjaya::findOrFail($id);
        $kursus = Kursus::where('kod_kursus', $item->kod_kursus)
            ->where('kod_institusi', $item->kod_institusi)
            ->firstOrFail();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Laluan kerjaya berjaya dipadam.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Laluan kerjaya berjaya dipadam.');
    }

    public function storeYuranPendaftaran(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer|exists:kursuses,id',
            'item' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $kursus = Kursus::findOrFail($request->kursus_id);

        YuranPendaftaran::create([
            'kod_institusi' => $kursus->kod_institusi,
            'kod_kursus' => $kursus->kod_kursus,
            'item' => $request->item,
            'amount' => $request->amount,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Yuran pendaftaran berjaya ditambah.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Yuran pendaftaran berjaya ditambah.');
    }

    public function destroyYuranPendaftaran($id)
    {
        $item = YuranPendaftaran::findOrFail($id);
        $kursus = Kursus::where('kod_kursus', $item->kod_kursus)
            ->where('kod_institusi', $item->kod_institusi)
            ->firstOrFail();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item yuran pendaftaran berjaya dipadam.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Item yuran pendaftaran berjaya dipadam.');
    }

    public function storeYuranPilihan(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer|exists:kursuses,id',
            'pilihan' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $kursus = Kursus::findOrFail($request->kursus_id);

        YuranPilihan::create([
            'kod_institusi' => $kursus->kod_institusi,
            'kod_kursus' => $kursus->kod_kursus,
            'pilihan' => $request->pilihan,
            'item' => $request->item,
            'amount' => $request->amount,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Yuran pilihan berjaya ditambah.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Yuran pilihan berjaya ditambah.');
    }

    public function destroyYuranPilihan($id)
    {
        $item = YuranPilihan::findOrFail($id);
        $kursus = Kursus::where('kod_kursus', $item->kod_kursus)
            ->where('kod_institusi', $item->kod_institusi)
            ->firstOrFail();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item yuran pilihan berjaya dipadam.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Item yuran pilihan berjaya dipadam.');
    }

    public function storeYuranAsrama(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer|exists:kursuses,id',
            'item' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $kursus = Kursus::findOrFail($request->kursus_id);

        YuranAsrama::create([
            'kod_institusi' => $kursus->kod_institusi,
            'kod_kursus' => $kursus->kod_kursus,
            'item' => $request->item,
            'amount' => $request->amount,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Yuran asrama berjaya ditambah.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Yuran asrama berjaya ditambah.');
    }

    public function destroyYuranAsrama($id)
    {
        $item = YuranAsrama::findOrFail($id);
        $kursus = Kursus::where('kod_kursus', $item->kod_kursus)
            ->where('kod_institusi', $item->kod_institusi)
            ->firstOrFail();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item yuran asrama berjaya dipadam.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Item yuran asrama berjaya dipadam.');
    }

    public function storeYuranPengajian(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer|exists:kursuses,id',
            'peringkat' => 'required|string|max:255',
            'tempoh' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $kursus = Kursus::findOrFail($request->kursus_id);

        YuranPengajian::create([
            'kod_institusi' => $kursus->kod_institusi,
            'kod_kursus' => $kursus->kod_kursus,
            'peringkat' => $request->peringkat,
            'tempoh' => $request->tempoh,
            'amount' => $request->amount,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Yuran pengajian berjaya ditambah.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Yuran pengajian berjaya ditambah.');
    }

    public function destroyYuranPengajian($id)
    {
        $item = YuranPengajian::findOrFail($id);
        $kursus = Kursus::where('kod_kursus', $item->kod_kursus)
            ->where('kod_institusi', $item->kod_institusi)
            ->firstOrFail();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item yuran pengajian berjaya dipadam.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Item yuran pengajian berjaya dipadam.');
    }

    public function storeElaun(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer|exists:kursuses,id',
            'elaun_bulanan' => 'required|string|max:255',
            'tempoh' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        $kursus = Kursus::findOrFail($request->kursus_id);

        Elaun::create([
            'kod_institusi' => $kursus->kod_institusi,
            'kod_kursus' => $kursus->kod_kursus,
            'elaun_bulanan' => $request->elaun_bulanan,
            'tempoh' => $request->tempoh,
            'jumlah' => $request->jumlah,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Elaun berjaya ditambah.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Elaun berjaya ditambah.');
    }

    public function destroyElaun($id)
    {
        $item = Elaun::findOrFail($id);
        $kursus = Kursus::where('kod_kursus', $item->kod_kursus)
            ->where('kod_institusi', $item->kod_institusi)
            ->firstOrFail();
        $item->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item elaun berjaya dipadam.']);
        }

        return redirect()->route('admin.editkursus', $kursus->id)
                        ->with('success', 'Item elaun berjaya dipadam.');
    }

    public function tabMaklumat($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('admin._tab_maklumat', compact('kursus'));
    }

    public function tabSyarat($id)
    {
        $kursus = Kursus::findOrFail($id)->loadScopedCourseDetails('syaratKelayakans');
        return view('admin._tab_syarat', compact('kursus'));
    }

    public function tabKerjaya($id)
    {
        $kursus = Kursus::findOrFail($id)->loadScopedCourseDetails('kerjayas');
        return view('admin._tab_kerjaya', compact('kursus'));
    }

    public function tabYuran($id)
    {
        $kursus = Kursus::findOrFail($id)->loadScopedCourseDetails([
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ]);
        return view('admin._tab_yuran', compact('kursus'));
    }

    public function tabGaleri($id)
    {
        $kursus = Kursus::findOrFail($id);
        $galleries = \App\Models\Galeri::where('kod_kursus', $kursus->kod_kursus)
            ->where('kod_institusi', $kursus->institusi?->kod_institusi)
            ->get();
        return view('admin._tab_galeri', compact('kursus', 'galleries'));
    }

    public function storeGaleri(Request $request)
    {
        $request->validate([
            'imej.*' => 'required|mimes:jpeg,png,jpg,gif,webp,mp4,webm,ogg|max:20480',
            'kod_kursus' => 'required|string',
            'kod_institusi' => 'required|string',
        ]);

        if ($request->hasFile('imej')) {
            foreach ($request->file('imej') as $file) {
                $originalName = $file->getClientOriginalName();
                $fileName = pathinfo($originalName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $candidateName = Str::slug($fileName) . '-' . time() . '.' . $extension;
                $counter = 1;
                $destination = public_path('images/institusi');

                if (! file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }

                while (file_exists($destination . DIRECTORY_SEPARATOR . $candidateName)) {
                    $candidateName = Str::slug($fileName) . '-' . time() . '-' . $counter . '.' . $extension;
                    $counter++;
                }

                $file->move($destination, $candidateName);
                
                \App\Models\Galeri::create([
                    'imej' => 'images/institusi/' . $candidateName,
                    'kod_kursus' => $request->input('kod_kursus'),
                    'kod_institusi' => $request->input('kod_institusi'),
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Gambar berjaya dimuat naik.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Tiada fail dipilih.'
        ], 400);
    }

    public function destroyGaleri($id)
    {
        $galeri = \App\Models\Galeri::findOrFail($id);
        
        if ($galeri->imej && file_exists(public_path($galeri->imej))) {
            unlink(public_path($galeri->imej));
        }
        
        $galeri->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gambar berjaya dipadam.'
        ]);
    }
}
