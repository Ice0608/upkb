<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

        return view('bmd', compact('event', 'pelajar'));
    }

    public function storeGuestPelajar(Request $request)
    {
        $data = $request->validate([
            'tarikh_pendaftaran' => 'required|date',
            'nama_pelajar' => 'required|string|max:255',
            'ic_pelajar' => 'required|string|max:50',
            'no_tel' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
            'kod_institusi' => 'nullable|string|max:100',
            'kod_kursus' => 'nullable|string|max:100',
            'nama_bapa' => 'nullable|string|max:255',
            'ic_bapa' => 'nullable|string|max:50',
            'no_tel_bapa' => 'nullable|string|max:50',
            'pendapatan_bapa' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:255',
            'ic_ibu' => 'nullable|string|max:50',
            'no_tel_ibu' => 'nullable|string|max:50',
            'pendapatan_ibu' => 'nullable|string|max:100',
            'jumlah_tanggungan' => 'nullable|integer|min:0',
        ]);

        $pelajar = Pelajar::create(array_merge([
            'jumlah_tanggungan' => $request->input('jumlah_tanggungan', 0),
        ], $data));

        return redirect()->route('bmd', ['event_id' => $request->input('event_id')])
            ->with('success', 'Maklumat pelajar telah dihantar.');
    }

    public function editBmd(Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        return view('staff.editbmd', compact('pelajar'));
    }

    public function updatePelajar(Request $request, Pelajar $pelajar)
    {
        abort_if(auth()->user()->level !== 'staff', 403);

        $data = $request->validate([
            'tarikh_pendaftaran' => 'required|date',
            'nama_pelajar' => 'required|string|max:255',
            'ic_pelajar' => 'required|string|max:50',
            'no_tel' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
            'kod_institusi' => 'nullable|string|max:100',
            'kod_kursus' => 'nullable|string|max:100',
            'nama_bapa' => 'nullable|string|max:255',
            'ic_bapa' => 'nullable|string|max:50',
            'no_tel_bapa' => 'nullable|string|max:50',
            'pendapatan_bapa' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:255',
            'ic_ibu' => 'nullable|string|max:50',
            'no_tel_ibu' => 'nullable|string|max:50',
            'pendapatan_ibu' => 'nullable|string|max:100',
            'jumlah_tanggungan' => 'nullable|integer|min:0',
        ]);

        $pelajar->update(array_merge([
            'jumlah_tanggungan' => $request->input('jumlah_tanggungan', 0),
        ], $data));

        return redirect()->route('staff.bmd.edit', $pelajar->id)
            ->with('success', 'Maklumat pelajar telah dikemaskini.');
    }
}
