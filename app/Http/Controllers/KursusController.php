<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KursusController extends Controller
{
    public function show($id)
    {
        $kursus = Kursus::with([
            'institusi',
            'syaratKelayakans',
            'silibuses',
            'kerjayas',
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ])->findOrFail($id);

        return view('program.infokursus', compact('kursus'));
    }

    public function index(Request $request)
    {
        $jenis = $request->query('jenis');
        $negeri = $request->query('negeri');
        $kuota = $request->query('kuota');

        $query = Kursus::with('institusi');

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

        return view('program.listkursus', compact('kursusList', 'jenis'));
    }

    public function pdf($id)
    {
        $kursus = Kursus::with([
            'institusi',
            'syaratKelayakans',
            'silibuses',
            'kerjayas',
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ])->findOrFail($id);

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
        $kursus = Kursus::with('syaratKelayakans')->findOrFail($id);
        return view('program._guest_tab_syarat', compact('kursus'));
    }

    public function tabSilibus($id)
    {
        $kursus = Kursus::with('silibuses')->findOrFail($id);
        return view('program._guest_tab_silibus', compact('kursus'));
    }

    public function tabKerjaya($id)
    {
        $kursus = Kursus::with('kerjayas')->findOrFail($id);
        return view('program._guest_tab_kerjaya', compact('kursus'));
    }

    public function tabYuran($id)
    {
        $kursus = Kursus::with([
            'yuranPendaftarans',
            'yuranPilihans',
            'yuranAsramas',
            'yuranPengajians',
            'elauns',
        ])->findOrFail($id);
        return view('program._guest_tab_yuran', compact('kursus'));
    }
}
