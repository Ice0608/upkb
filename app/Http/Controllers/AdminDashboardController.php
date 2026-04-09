<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pelajar;
use App\Models\Institusi;
use App\Models\Kursus;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->level !== 'admin', 403);

        // Event hari semasa
        $todayEvents = Event::whereDate('tarikh_event', today())->get();

        // Bilangan pelajar
        $totalPelajar = Pelajar::count();
        $todayPelajar = Pelajar::whereDate('tarikh_pendaftaran', today())->count();

        // Bilangan institusi
        $totalInstitusi = Institusi::count();

        // Bilangan kursus
        $totalKursus = Kursus::count();

        return view('admin.dashboard', compact(
            'todayEvents',
            'totalPelajar',
            'todayPelajar',
            'totalInstitusi',
            'totalKursus'
        ));
    }
}