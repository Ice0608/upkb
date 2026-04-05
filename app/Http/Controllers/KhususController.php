<?php

namespace App\Http\Controllers;

use App\Models\Khusus;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KhususController extends Controller
{
    public function show($id)
    {
        $khusus = Khusus::with([
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

        return view('program.infokhusus', compact('khusus'));
    }

    public function pdf($id)
    {
        $khusus = Khusus::with([
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

        $html = view('program.infokhusus-pdf', compact('khusus'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return response($dompdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="'.Str::slug($khusus->nama_khusus).'.pdf"');
    }

    public function tabMaklumat($id)
    {
        $khusus = Khusus::findOrFail($id);
        return view('program._guest_tab_maklumat', compact('khusus'));
    }

    public function tabSyarat($id)
    {
        $khusus = Khusus::with('syaratKelayakans')->findOrFail($id);
        return view('program._guest_tab_syarat', compact('khusus'));
    }

    public function tabSilibus($id)
    {
        $khusus = Khusus::with('silibuses')->findOrFail($id);
        return view('program._guest_tab_silibus', compact('khusus'));
    }

    public function tabKerjaya($id)
    {
        $khusus = Khusus::with('kerjayas')->findOrFail($id);
        return view('program._guest_tab_kerjaya', compact('khusus'));
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
        return view('program._guest_tab_yuran', compact('khusus'));
    }
}
