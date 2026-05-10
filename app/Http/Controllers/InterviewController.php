<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pelajar;
use App\Models\Kursus;
use App\Models\Institusi;
use App\Models\Pembayaran;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class InterviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    // Welcome page for interview
    public function welcome(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $programs = \App\Models\Program::all();

        return view('staff.temuduga.welcome', compact('pelajar', 'programs'));
    }

    // Program page
    public function program(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $programs = \App\Models\Program::all();

        return view('staff.temuduga.program', compact('pelajar', 'programs'));
    }

    // List kursus
    public function listKursus(Pelajar $pelajar, Request $request)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $jenis = $request->query('jenis');
        $negeri = $request->query('negeri');
        $kuota = $request->query('kuota');

        $query = Kursus::with(['institusi', 'galeris']);

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
            $selectedProgram = \App\Models\Program::where('jenis_program', $jenis)->first();
        }

        return view('staff.temuduga.listkursus', compact('pelajar', 'kursusList', 'jenis', 'selectedProgram'));
    }

    // Pilihan kursus
    public function pilihanKursus(Pelajar $pelajar, $nama)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $namaKursus = urldecode($nama);
        $namaKursusPaparan = Kursus::canonicalCourseName($namaKursus);
        $semuaKursus = Kursus::with(['institusi', 'galeris'])
            ->equivalentToCourse($namaKursus)
            ->get();
        $namaKursus = $namaKursusPaparan;

        $selectedCourse = $semuaKursus->first();
        $heroImage = optional($selectedCourse?->galeris->first())->imej
            ?? optional($selectedCourse?->institusi)->gambar_institusi
            ?? 'images/default-course.jpg';
        $selectedDescription = $selectedCourse?->penerangan
            ?? 'Penerangan kursus tidak tersedia pada masa ini.';

        $jenisKursusOptions = $semuaKursus->pluck('jenis_kursus')->filter()->unique()->values();
        $tempohOptions = $semuaKursus->pluck('tempoh')->filter()->unique()->values();
        $modPengajianOptions = $semuaKursus->pluck('mod_pengajian')->filter()->unique()->values();

        return view('staff.temuduga.pilihankursus', compact(
            'pelajar',
            'semuaKursus',
            'namaKursus',
            'heroImage',
            'selectedDescription',
            'jenisKursusOptions',
            'tempohOptions',
            'modPengajianOptions'
        ));
    }

    // Filter kursus by name (AJAX)
    public function filterByName(Request $request, Pelajar $pelajar, $nama)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $namaKursus = urldecode($nama);
        $query = Kursus::with(['institusi', 'galeris'])
            ->equivalentToCourse($namaKursus);

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
        $html = view('staff.temuduga._pilihankursus_institusi', compact('semuaKursus'))->render();

        return response()->json(['html' => $html]);
    }

    // Info institusi
    public function infoInstitusi(Pelajar $pelajar, $kod_institusi)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $institusi = Institusi::where('kod_institusi', $kod_institusi)->firstOrFail();
        $kursusList = Kursus::where('kod_institusi', $institusi->kod_institusi)->get();
        $galeriList = Galeri::where('kod_institusi', $institusi->kod_institusi)->get();

        return view('staff.temuduga.infoinstitusi', compact('pelajar', 'institusi', 'kursusList', 'galeriList'));
    }

    // Info kursus
    public function infoKursus(Pelajar $pelajar, $kod_institusi, $kod_kursus)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $kursus = Kursus::with('institusi')
            ->where('kod_kursus', $kod_kursus)
            ->where('kod_institusi', $kod_institusi)
            ->firstOrFail();
        $kursus->loadScopedCourseDetails([
            'galeris',
            'syaratKelayakans',
            'silibuses',
            'kerjayas',
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ]);

        return view('staff.temuduga.infokursus', compact('pelajar', 'kursus'));
    }

    // Tab methods for AJAX
    public function tabMaklumat(Pelajar $pelajar, $kod_kursus)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $kursus = Kursus::where('kod_kursus', $kod_kursus)->firstOrFail();
        return view('program._guest_tab_maklumat', compact('kursus'));
    }

    public function tabSyarat(Pelajar $pelajar, $kod_kursus)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $kursus = Kursus::where('kod_kursus', $kod_kursus)
            ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
            ->firstOrFail()
            ->loadScopedCourseDetails('syaratKelayakans');
        return view('program._guest_tab_syarat', compact('kursus'));
    }

    public function tabSilibus(Pelajar $pelajar, $kod_kursus)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $kursus = Kursus::where('kod_kursus', $kod_kursus)
            ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
            ->firstOrFail()
            ->loadScopedCourseDetails('silibuses');
        return view('program._guest_tab_silibus', compact('kursus'));
    }

    public function tabKerjaya(Pelajar $pelajar, $kod_kursus)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $kursus = Kursus::where('kod_kursus', $kod_kursus)
            ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
            ->firstOrFail()
            ->loadScopedCourseDetails('kerjayas');
        return view('program._guest_tab_kerjaya', compact('kursus'));
    }

    public function tabYuran(Pelajar $pelajar, $kod_kursus)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $kursus = Kursus::where('kod_kursus', $kod_kursus)
            ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
            ->firstOrFail()
            ->loadScopedCourseDetails([
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ]);
        return view('program._guest_tab_yuran', compact('kursus'));
    }

    public function tabGaleri(Pelajar $pelajar, $kod_kursus)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $kursus = Kursus::with('institusi')->where('kod_kursus', $kod_kursus)->firstOrFail();
        $galleries = \App\Models\Galeri::where(function ($query) use ($kursus) {
                $query->where('kod_kursus', $kursus->kod_kursus);

                if ($kursus->institusi?->kod_institusi) {
                    $query->orWhere('kod_institusi', $kursus->institusi->kod_institusi);
                }
            })
            ->get()
            ->unique('id')
            ->values();

        return view('program._guest_tab_galeri', compact('kursus', 'galleries'));
    }

    // Apply now - redirect back to edit BMD with selected course
    public function applyNow(Request $request, Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $kod_kursus = $request->input('kod_kursus');
        $kursus = Kursus::where('kod_kursus', $kod_kursus)->firstOrFail();

        // Update pelajar with selected course
        $pelajar->update([
            'kod_institusi' => $kursus->kod_institusi,
            'kod_kursus' => $kod_kursus,
        ]);

        return redirect()->route('staff.bmd.edit', $pelajar->id)->with('success', 'Kursus telah dipilih. Sila lengkapkan maklumat BMD.');
    }

    // Kaedah pembayaran
    public function pembayaran(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        // Assume some payment amount, you can calculate based on course
        $jumlah = 100; // Placeholder

        return view('staff.temuduga.pembayaran', compact('pelajar', 'jumlah'));
    }

    // Store pembayaran
    public function storePembayaran(Request $request, Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $request->validate([
            'kaedah' => 'required|in:qr,cash,transfer',
            'jumlah' => 'required|numeric',
        ]);

        Pembayaran::create([
            'ic_pelajar' => $pelajar->ic_pelajar,
            'status' => 'pending',
            'jumlah' => $request->jumlah,
            'kaedah' => $request->kaedah,
        ]);

        return redirect()->route('staff.temuduga.resit', $pelajar->id);
    }

    // Resit pembayaran
    public function resit(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $pembayaran = Pembayaran::where('ic_pelajar', $pelajar->ic_pelajar)->latest()->first();

        return view('staff.temuduga.resit', compact('pelajar', 'pembayaran'));
    }

    // Surat Tawaran
    public function suratTawaran(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $kursus = Kursus::with('institusi')->where('kod_kursus', $pelajar->kod_kursus)->first();
        $institusi = $kursus->institusi;

        $suratPath = "institusi/{$institusi->kod_institusi}/SURAT TAWARAN/{$pelajar->kod_kursus}.docx";

        if (Storage::exists($suratPath)) {
            // Generate surat tawaran
            $templatePath = storage_path("app/public/{$suratPath}");
            $templateProcessor = new TemplateProcessor($templatePath);

            // Fill template with data
            $templateProcessor->setValue('nama_pelajar', $pelajar->nama_pelajar);
            $templateProcessor->setValue('ic_pelajar', $pelajar->ic_pelajar);
            $templateProcessor->setValue('alamat', $pelajar->address_line1 . ' ' . $pelajar->address_line2 . ', ' . $pelajar->city . ', ' . $pelajar->region . ' ' . $pelajar->postcode);
            $templateProcessor->setValue('tarikh_pendaftaran', $pelajar->tarikh_pendaftaran->format('d/m/Y'));
            $templateProcessor->setValue('tarikh_hari_ini', now()->format('d/m/Y'));

            $outputPath = storage_path("app/temp/surat_tawaran_{$pelajar->id}.docx");
            $templateProcessor->saveAs($outputPath);

            $hasSurat = true;
            $suratPath = $outputPath;

            return view('staff.temuduga.surat-tawaran', compact('pelajar', 'kursus', 'hasSurat', 'suratPath'));
        } else {
            $hasSurat = false;
            return view('staff.temuduga.surat-tawaran', compact('pelajar', 'kursus', 'hasSurat'));
        }
    }

    // Download surat tawaran
    public function downloadSuratTawaran(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $path = storage_path("app/temp/surat_tawaran_{$pelajar->id}.docx");

        if (file_exists($path)) {
            return response()->download($path)->deleteFileAfterSend();
        }

        return redirect()->back()->with('error', 'Surat tawaran tidak ditemui.');
    }

    // Complete interview
    public function complete(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        // Update payment status to pending
        Pembayaran::where('ic_pelajar', $pelajar->ic_pelajar)->update(['status' => 'pending']);

        return redirect()->route('staff.main')->with('success', 'Temu duga selesai. Status pembayaran dikemaskini kepada pending.');
    }
}
