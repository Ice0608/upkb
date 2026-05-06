<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pelajar;
use App\Models\Institusi;
use App\Models\Kursus;
use App\Models\Pembayaran;
use Illuminate\Support\Collection;

class AdminDashboardController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->level !== 'admin', 403);

        // Event bulan semasa
        $monthEvents = Event::whereBetween('tarikh_event', [
            now()->startOfMonth()->toDateString(),
            now()->endOfMonth()->toDateString(),
        ])->orderBy('tarikh_event')->orderBy('masa_event')->get();

        // Bilangan pelajar
        $totalPelajar = Pelajar::count();
        $todayPelajar = Pelajar::whereDate('tarikh_pendaftaran', today())->count();

        // Bilangan institusi
        $totalInstitusi = Institusi::count();

        // Bilangan kursus
        $totalKursus = Kursus::count();

        return view('admin.dashboard', compact(
            'monthEvents',
            'totalPelajar',
            'todayPelajar',
            'totalInstitusi',
            'totalKursus'
        ));
    }

    public function eventReport(Event $event)
    {
        abort_if(auth()->user()->level !== 'admin', 403);

        $pelajars = Pelajar::where('event_id', $event->id)
            ->orderBy('nama_pelajar')
            ->get();

        $payments = Pembayaran::whereIn('ic_pelajar', $pelajars->pluck('ic_pelajar')->filter())
            ->latest()
            ->get()
            ->unique('ic_pelajar')
            ->keyBy('ic_pelajar');

        $registrations = $pelajars->map(function (Pelajar $pelajar) use ($event, $payments) {
            $payment = $payments->get($pelajar->ic_pelajar);
            $preReg = (float) ($payment?->bayaran_semasa ?? 0);
            $reg = (float) ($payment?->jumlah_bayaran ?? 0);

            return [
                'pelajar' => $pelajar,
                'payment' => $payment,
                'payment_method' => $this->paymentMethodLabel($payment?->kaedah_pembayaran),
                'payment_status' => $this->paymentStatusLabel($payment?->status),
                'pre_reg' => $preReg,
                'reg' => $reg,
                'total' => $preReg + $reg,
                'closer' => $event->PIC ?: '-',
            ];
        });

        $paymentMethodRows = $this->buildPaymentMethodRows($registrations);
        $paymentStatusRows = $this->buildPaymentStatusRows($registrations);
        $closerRows = $this->buildCloserRows($registrations);
        $reportId = 'REG-' . $event->id . '-' . now()->format('YmdHis');

        return view('admin.event-report', compact(
            'event',
            'registrations',
            'paymentMethodRows',
            'paymentStatusRows',
            'closerRows',
            'reportId'
        ));
    }

    private function paymentMethodLabel(?string $method): string
    {
        return match (strtolower((string) $method)) {
            'cash' => 'CASH',
            'transfer' => 'ONLINE BANKING',
            'qr' => 'QR PAYMENT',
            'manual' => 'MANUAL',
            default => 'NONE',
        };
    }

    private function paymentStatusLabel(?string $status): string
    {
        return match (strtolower((string) $status)) {
            'completed', 'complete', 'paid', 'fully paid' => 'COMPLETED',
            'partial', 'partially paid' => 'PARTIALLY PAID',
            'pending' => 'PENDING',
            default => 'PENDING',
        };
    }

    private function buildPaymentMethodRows(Collection $registrations): Collection
    {
        return $registrations->groupBy('payment_method')->map(function (Collection $items, string $method) use ($registrations) {
            $revenue = $items->sum('total');

            return [
                'label' => $method,
                'transactions' => $items->count(),
                'share' => $this->percentage($items->count(), $registrations->count()),
                'revenue' => $revenue,
                'average' => $items->count() > 0 ? $revenue / $items->count() : 0,
            ];
        })->sortKeys()->values();
    }

    private function buildPaymentStatusRows(Collection $registrations): Collection
    {
        $statuses = collect(['COMPLETED', 'PARTIALLY PAID', 'PENDING']);

        return $statuses->map(function (string $status) use ($registrations) {
            $items = $registrations->where('payment_status', $status);
            $revenue = $items->sum('total');

            return [
                'label' => $status,
                'registrations' => $items->count(),
                'share' => $this->percentage($items->count(), $registrations->count()),
                'revenue' => $revenue,
                'average' => $items->count() > 0 ? $revenue / $items->count() : 0,
            ];
        });
    }

    private function buildCloserRows(Collection $registrations): Collection
    {
        return $registrations->groupBy('closer')->map(function (Collection $items, string $closer) {
            return [
                'closer' => $closer,
                'closing' => $items->count(),
                'completed' => $items->where('payment_status', 'COMPLETED')->count(),
                'partial' => $items->where('payment_status', 'PARTIALLY PAID')->count(),
                'pending' => $items->where('payment_status', 'PENDING')->count(),
                'revenue' => $items->sum('total'),
            ];
        })->sortByDesc('closing')->values();
    }

    private function percentage(int $value, int $total): float
    {
        return $total > 0 ? ($value / $total) * 100 : 0;
    }
}
