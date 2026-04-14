<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kursus;
use App\Models\Pelajar;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class StaffEventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $events = Event::orderBy('tarikh_event', 'desc')->get();
        $selectedEvent = null;
        $pelajars = collect();
        $paymentStatus = collect();

        if ($request->filled('event_id')) {
            $selectedEvent = Event::find($request->event_id);
        }

        if (! $selectedEvent && $events->count()) {
            $selectedEvent = $events->first();
        }

        if ($selectedEvent) {
            $pelajars = Pelajar::whereDate('tarikh_pendaftaran', $selectedEvent->tarikh_event)
                ->orderBy('nama_pelajar')
                ->get();

            $paymentStatus = Pembayaran::whereIn('ic_pelajar', $pelajars->pluck('ic_pelajar')->toArray())
                ->orderByDesc('created_at')
                ->get()
                ->groupBy('ic_pelajar')
                ->map(fn ($items) => $items->first());
        }

        return view('staff.main', compact('events', 'selectedEvent', 'pelajars', 'paymentStatus'));
    }

    public function create()
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        return view('staff.addevent');
    }

    public function store(Request $request)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $data = $request->validate([
            'nama_event' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tarikh_event' => 'required|date',
            'masa_event' => 'required',
            'PIC' => 'required|string|max:255',
        ]);

        $event = Event::create($data);

        return redirect()->route('staff.main', ['event_id' => $event->id])
            ->with('success', 'Event berjaya ditambah.');
    }

    public function guestBmd(Request $request)
    {
        $event = null;
        if ($request->filled('event_id')) {
            $event = Event::find($request->event_id);
        }

        $pelajar = null;
        $namaKursusOptions = \App\Models\Kursus::distinct('nama_kursus')->pluck('nama_kursus')->sort()->toArray();

        return view('bmd', compact('event', 'pelajar', 'namaKursusOptions'));
    }

    public function storeGuestPelajar(Request $request)
    {
        $data = $request->validate([
            'tarikh_pendaftaran' => 'required|date',
            'noreff' => 'nullable|string|max:255',
            'program' => 'nullable|string|max:100',
            'nama_pelajar' => 'required|string|max:255',
            'ic_pelajar' => 'required|string|max:50',
            'spm_credit' => 'nullable|numeric|min:0',
            'no_tel' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'postcode' => 'nullable|string|max:20',
            'kod_institusi' => 'nullable|string|max:100',
            'kod_kursus' => 'nullable|string|max:100',
            'nama_bapa' => 'nullable|string|max:255',
            'ic_bapa' => 'nullable|string|max:50',
            'no_tel_bapa' => 'nullable|string|max:50',
            'pekerjaan_bapa' => 'nullable|string|max:255',
            'pendapatan_bapa' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:255',
            'ic_ibu' => 'nullable|string|max:50',
            'no_tel_ibu' => 'nullable|string|max:50',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'pendapatan_ibu' => 'nullable|string|max:100',
            'jumlah_tanggungan' => 'nullable|integer|min:0',
            'pilihan_pertama' => 'nullable|string|max:255',
            'pilihan_kedua' => 'nullable|string|max:255',
            'pilihan_ketiga' => 'nullable|string|max:255',
        ]);

        // Custom validation for unique course choices
        $pilihan = array_filter([$request->pilihan_pertama, $request->pilihan_kedua, $request->pilihan_ketiga]);
        if (count($pilihan) !== count(array_unique($pilihan))) {
            return back()->withErrors(['pilihan' => 'Pilihan kursus mesti berbeza antara satu sama lain.'])->withInput();
        }

        $pelajar = Pelajar::create(array_merge([
            'jumlah_tanggungan' => $request->input('jumlah_tanggungan', 0),
        ], $data));

        return redirect()->route('bmd', ['event_id' => $request->input('event_id')])
            ->with('success', 'Maklumat pelajar telah dihantar.');
    }

    public function editBmd(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $namaKursusOptions = \App\Models\Kursus::distinct('nama_kursus')->pluck('nama_kursus')->sort()->toArray();

        return view('staff.editbmd', compact('pelajar', 'namaKursusOptions'));
    }

    public function updatePelajar(Request $request, Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $data = $request->validate([
            'tarikh_pendaftaran' => 'required|date',
            'noreff' => 'nullable|string|max:255',
            'program' => 'nullable|string|max:100',
            'nama_pelajar' => 'required|string|max:255',
            'ic_pelajar' => 'required|string|max:50',
            'spm_credit' => 'nullable|numeric|min:0',
            'no_tel' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'postcode' => 'nullable|string|max:20',
            'kod_institusi' => 'nullable|string|max:100',
            'kod_kursus' => 'nullable|string|max:100',
            'nama_bapa' => 'nullable|string|max:255',
            'ic_bapa' => 'nullable|string|max:50',
            'no_tel_bapa' => 'nullable|string|max:50',
            'pekerjaan_bapa' => 'nullable|string|max:255',
            'pendapatan_bapa' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:255',
            'ic_ibu' => 'nullable|string|max:50',
            'no_tel_ibu' => 'nullable|string|max:50',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'pendapatan_ibu' => 'nullable|string|max:100',
            'jumlah_tanggungan' => 'nullable|integer|min:0',
            'pilihan_pertama' => 'nullable|string|max:255',
            'pilihan_kedua' => 'nullable|string|max:255',
            'pilihan_ketiga' => 'nullable|string|max:255',
        ]);

        // Custom validation for unique course choices
        $pilihan = array_filter([$request->pilihan_pertama, $request->pilihan_kedua, $request->pilihan_ketiga]);
        if (count($pilihan) !== count(array_unique($pilihan))) {
            return back()->withErrors(['pilihan' => 'Pilihan kursus mesti berbeza antara satu sama lain.'])->withInput();
        }

        $pelajar->update(array_merge([
            'jumlah_tanggungan' => $request->input('jumlah_tanggungan', 0),
        ], $data));

        return redirect()->route('staff.bmd.edit', $pelajar->id)
            ->with('success', 'Maklumat pelajar telah dikemaskini.');
    }

    public function updatePaymentStatus(Request $request, Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $request->validate([
            'status' => 'required|in:pending,paid,cancel',
        ]);

        Pembayaran::where('ic_pelajar', $pelajar->ic_pelajar)->update(['status' => $request->status]);

        return redirect()->route('staff.main')->with('success', 'Status pembayaran dikemaskini.');
    }
}
