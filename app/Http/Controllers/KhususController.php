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
}
