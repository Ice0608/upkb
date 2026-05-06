<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Program;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KursusController extends Controller
{
    public function showByName($nama)
    {
        $namaKursus = urldecode($nama);
        $semuaKursus = Kursus::with(['institusi', 'galeris'])
            ->where('nama_kursus', $namaKursus)
            ->get();

        $selectedCourse = $semuaKursus->first();
        $heroImage = optional($selectedCourse?->galeris->first())->imej
            ?? optional($selectedCourse?->institusi)->gambar_institusi
            ?? 'images/default-course.jpg';
        $selectedDescription = $selectedCourse?->penerangan
            ?? 'Penerangan kursus tidak tersedia pada masa ini.';

        $jenisKursusOptions = $semuaKursus->pluck('jenis_kursus')->filter()->unique()->values();
        $tempohOptions = $semuaKursus->pluck('tempoh')->filter()->unique()->values();
        $modPengajianOptions = $semuaKursus->pluck('mod_pengajian')->filter()->unique()->values();

        return view('program.pilihankursus', compact(
            'semuaKursus',
            'namaKursus',
            'heroImage',
            'selectedDescription',
            'jenisKursusOptions',
            'tempohOptions',
            'modPengajianOptions'
        ));
    }

    public function filterByName(Request $request, $nama)
    {
        $namaKursus = urldecode($nama);
        $query = Kursus::with(['institusi', 'galeris'])
            ->where('nama_kursus', $namaKursus);

        if ($request->filled('jenis_kursus')) {
            $query->where('jenis_kursus', $request->jenis_kursus);
        }

        if ($request->filled('tempoh')) {
            $query->where('tempoh', $request->tempoh);
        }

        if ($request->filled('mod_pengajian')) {
            $query->where('mod_pengajian', $request->mod_pengajian);
        }

        $semuaKursus = $query->get();
        $html = view('program._pilihankursus_institusi', compact('semuaKursus'))->render();

        return response()->json(['html' => $html]);
    }

    public function index(Request $request)
    {
        $jenis = $request->query('jenis');
        $negeri = $request->query('negeri');
        $kuota = $request->query('kuota');
        $search = trim((string) $request->query('search', ''));

        $query = Kursus::with(['institusi', 'galeris']);

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('nama_kursus', 'LIKE', '%' . $search . '%')
                    ->orWhere('kod_kursus', 'LIKE', '%' . $search . '%')
                    ->orWhere('jenis_kursus', 'LIKE', '%' . $search . '%')
                    ->orWhere('tempoh', 'LIKE', '%' . $search . '%')
                    ->orWhere('mod_pengajian', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('institusi', function ($institusiQuery) use ($search) {
                        $institusiQuery->where('nama_institusi', 'LIKE', '%' . $search . '%')
                            ->orWhere('alamat', 'LIKE', '%' . $search . '%')
                            ->orWhere('jenis_institusi', 'LIKE', '%' . $search . '%');
                    });
            });
        }

        if ($jenis) {
            $query->whereHas('institusi', function ($q) use ($jenis) {
                $q->where('jenis_institusi', $jenis);
            });
        }

        if ($negeri) {
            $query->whereHas('institusi', function ($q) use ($negeri) {
                $q->where('alamat', 'LIKE', '%' . $negeri . '%');
            });
        }

        if ($kuota) {
            $query->where('kuota', '>', 0);
        }

        $kursusList = $query->get();
        $selectedProgram = null;

        if ($jenis) {
            $selectedProgram = Program::where('jenis_program', $jenis)->first();
        }

        return view('program.listkursus', compact('kursusList', 'jenis', 'selectedProgram', 'search'));
    }

    public function show($id)
    {
        $kursus = Kursus::with('institusi')->findOrFail($id);
        return view('program.infokursus', compact('kursus'));
    }

    public function pdf($id)
    {
        $kursus = Kursus::with('institusi')->findOrFail($id);
        $kursus->loadScopedCourseDetails([
            'syaratKelayakans',
            'silibuses',
            'kerjayas',
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ]);

        $html = view('program.infokursus-pdf', compact('kursus'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return response($dompdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="'.Str::slug($kursus->nama_kursus).'.pdf"');
    }

    public function tabMaklumat($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('program._guest_tab_maklumat', compact('kursus'));
    }

    public function tabSyarat($id)
    {
        $kursus = Kursus::findOrFail($id)->loadScopedCourseDetails('syaratKelayakans');
        return view('program._guest_tab_syarat', compact('kursus'));
    }

    public function tabSilibus($id)
    {
        $kursus = Kursus::findOrFail($id)->loadScopedCourseDetails('silibuses');
        return view('program._guest_tab_silibus', compact('kursus'));
    }

    public function tabKerjaya($id)
    {
        $kursus = Kursus::findOrFail($id)->loadScopedCourseDetails('kerjayas');
        return view('program._guest_tab_kerjaya', compact('kursus'));
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
        return view('program._guest_tab_yuran', compact('kursus'));
    }

    public function tabGaleri($id)
    {
        $kursus = Kursus::with('institusi')->findOrFail($id);
        $galleries = \App\Models\Galeri::where('kod_kursus', $kursus->kod_kursus)
            ->where('kod_institusi', $kursus->institusi?->kod_institusi)
            ->get();

        return view('program._guest_tab_galeri', compact('kursus', 'galleries'));
    }
}
