<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Event Report</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --report-maroon: #441421;
            --report-gold: #c99134;
            --report-ink: #28151c;
        }

        body {
            background: #ffffff;
            color: var(--report-ink);
        }

        html,
        body.report-print-page {
            background: #ffffff !important;
            color: var(--report-ink) !important;
        }

        body.report-print-page .site-nav,
        body.report-print-page footer {
            color: inherit;
        }

        .report-page {
            width: min(1120px, calc(100vw - 32px));
            min-height: 720px;
            margin: 28px auto;
            background: #ffffff;
            padding: 34px 40px;
            box-shadow: 0 18px 50px rgba(45, 20, 28, 0.16);
            border: 1px solid rgba(68, 20, 33, 0.12);
        }

        .report-title {
            text-align: center;
            font-size: 28px;
            line-height: 1.1;
            font-weight: 900;
            letter-spacing: 0.04em;
            color: var(--report-ink);
        }

        .report-subtitle {
            margin-top: 8px;
            text-align: center;
            color: #83513c;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .section-title {
            margin: 28px 0 16px;
            text-align: center;
            font-size: 19px;
            font-weight: 900;
            letter-spacing: 0.02em;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            table-layout: fixed;
        }

        .report-table th {
            background: var(--report-maroon);
            color: #fff7ea;
            padding: 8px 9px;
            text-transform: uppercase;
            border: 1px solid rgba(255, 255, 255, 0.22);
            font-weight: 900;
            line-height: 1.1;
        }

        .report-table td {
            padding: 7px 9px;
            border: 1px solid rgba(68, 20, 33, 0.08);
            background: rgba(255, 255, 255, 0.52);
            vertical-align: top;
            line-height: 1.25;
        }

        .registration-table {
            font-size: 9.5px;
        }

        .registration-table th,
        .registration-table td {
            padding: 6px 7px;
        }

        .registration-table .col-no { width: 4%; }
        .registration-table .col-attendee { width: 22%; }
        .registration-table .col-email { width: 11%; }
        .registration-table .col-phone { width: 8.5%; }
        .registration-table .col-ref { width: 9%; }
        .registration-table .col-course { width: 7.5%; }
        .registration-table .col-college { width: 7%; }
        .registration-table .col-payment-type { width: 8.5%; }
        .registration-table .col-payment-status { width: 8%; }
        .registration-table .col-pre-reg { width: 6.5%; }
        .registration-table .col-closer { width: 8%; }

        .cell-clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            overflow-wrap: anywhere;
            line-height: 1.22;
            max-height: 3.66em;
        }

        .attendee-name {
            font-size: 8.5px;
            font-weight: 500;
            letter-spacing: 0;
        }

        .attendee-name.is-long {
            font-size: 8px;
            line-height: 1.16;
            max-height: 3.48em;
        }

        .attendee-name.is-very-long {
            font-size: 7.4px;
            line-height: 1.12;
            max-height: 3.36em;
        }

        .email-text {
            font-size: 7.4px;
            line-height: 1.16;
            max-height: 3.48em;
        }

        .report-table tbody tr:nth-child(even) td {
            background: rgba(244, 234, 217, 0.42);
        }

        .summary-row td,
        .summary-row th {
            background: var(--report-maroon) !important;
            color: #fff7ea;
            font-weight: 900;
        }

        .status-completed { color: #16b31e; font-weight: 900; }
        .status-partial { color: #ffbf00; font-weight: 900; }
        .status-pending { color: #bd3b3b; font-weight: 900; }

        .legend {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px 26px;
            margin: 44px auto 0;
            max-width: 720px;
            font-size: 11px;
            font-weight: 700;
        }

        .insight-box {
            margin-top: 20px;
            border: 2px solid rgba(68, 20, 33, 0.55);
            padding: 10px 14px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .footer-note {
            margin-top: 28px;
            text-align: center;
            color: #927464;
            font-size: 11px;
            font-weight: 800;
        }

        .screen-actions {
            width: min(1120px, calc(100vw - 32px));
            margin: 24px auto 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .screen-actions-left {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .screen-actions-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 10mm;
            }

            html,
            body {
                background: #ffffff !important;
                color: #28151c !important;
            }

            nav,
            .screen-actions,
            footer,
            .social-float {
                display: none !important;
            }

            *,
            *::before,
            *::after {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            body {
                background: #fff;
            }

            .report-page {
                width: 100%;
                min-height: 100vh;
                margin: 0;
                padding: 20px 22px;
                box-shadow: none;
                border: none;
                page-break-after: always;
            }

            .report-table-wrap {
                overflow: visible !important;
            }

            .registration-table {
                font-size: 8.6px;
            }

            .registration-table th,
            .registration-table td {
                padding: 5px 4px;
            }

            .attendee-name {
                font-size: 8px;
            }

            .attendee-name.is-long {
                font-size: 7.5px;
            }

            .attendee-name.is-very-long {
                font-size: 7px;
            }

            .email-text {
                font-size: 6.8px;
            }

            .report-page,
            .report-page * {
                color: #28151c !important;
            }

            .report-table th {
                background: var(--report-maroon) !important;
                color: #fff7ea !important;
            }

            .summary-row td,
            .summary-row th {
                background: var(--report-maroon) !important;
                color: #fff7ea !important;
            }

            .report-table td {
                background: rgba(255, 255, 255, 0.52) !important;
            }

            .report-table tbody tr:nth-child(even) td {
                background: rgba(244, 234, 217, 0.42) !important;
            }

            .status-completed { color: #16b31e !important; }
            .status-partial { color: #ffbf00 !important; }
            .status-pending { color: #bd3b3b !important; }
        }
    </style>
</head>
<body class="report-print-page">
@include('layouts.navadmin')

@php
    $totalRegistrations = $registrations->count();
    $totalPreReg = $registrations->sum('pre_reg');
    $totalReg = $registrations->sum('reg');
    $totalRevenue = $registrations->sum('total');
    $totalClosers = $closerRows->count();
    $activeClosers = $closerRows->where('closing', '>', 0)->count();
    $topThreeClosing = $closerRows->take(3)->sum('closing');
    $topThreeShare = $totalRegistrations > 0 ? ($topThreeClosing / $totalRegistrations) * 100 : 0;
    $averagePerCloser = $totalClosers > 0 ? $totalRegistrations / $totalClosers : 0;
    $topCloser = $closerRows->first();
    $topCompletionRate = $topCloser && $topCloser['closing'] > 0 ? ($topCloser['completed'] / $topCloser['closing']) * 100 : 0;
    $popularMethod = $paymentMethodRows->sortByDesc('transactions')->first();

    // Pre-compute registration data for Excel export
    $exportRegistrations = $registrations->map(function ($r) {
        return [
            'nama_pelajar' => strtoupper($r['pelajar']->nama_pelajar),
            'email' => $r['pelajar']->email ?: '-',
            'no_tel' => $r['pelajar']->no_tel ?: '-',
            'noreff' => $r['pelajar']->noreff ?: '-',
            'kursus' => $r['pelajar']->pilihan_pertama ?: ($r['pelajar']->kod_kursus ?: '-'),
            'institusi' => $r['pelajar']->kod_institusi ?: '-',
            'payment_method' => $r['payment_method'],
            'payment_status' => $r['payment_status'],
            'pre_reg' => $r['pre_reg'],
            'total' => $r['total'],
            'closer' => $r['closer'],
        ];
    })->values();

    $exportCloserRows = $closerRows->map(function ($c) {
        return [
            'closer' => $c['closer'],
            'closing' => $c['closing'],
            'completed' => $c['completed'],
            'partial' => $c['partial'],
            'pending' => $c['pending'],
            'revenue' => $c['revenue'],
        ];
    });

    $exportEventName = strtoupper($event->nama_event);
    $exportPopularLabel = $popularMethod['label'] ?? 'NONE';
    $exportPopularShare = $popularMethod['share'] ?? 0;
@endphp

{{-- Export data as JSON for Excel generation --}}
<script>
window.REPORT_DATA = {
    eventName: @json($exportEventName),
    reportId: @json($reportId),
    totalRegistrations: @json($totalRegistrations),
    registrations: @json($exportRegistrations),
    paymentMethodRows: @json($paymentMethodRows),
    paymentStatusRows: @json($paymentStatusRows),
    closerRows: @json($exportCloserRows),
    insights: {
        totalPreReg: @json($totalPreReg),
        totalReg: @json($totalReg),
        totalRevenue: @json($totalRevenue),
        totalClosers: @json($totalClosers),
        activeClosers: @json($activeClosers),
        topThreeClosing: @json($topThreeClosing),
        topThreeShare: @json($topThreeShare),
        averagePerCloser: @json($averagePerCloser),
        topCloser: @json($topCloser),
        topCompletionRate: @json($topCompletionRate),
        popularMethodLabel: @json($exportPopularLabel),
        popularMethodShare: @json($exportPopularShare),
    },
};

function confirmEventDelete() {
    if (!confirm('Padam event ini beserta semua data pelajar dan pembayaran berkaitan?')) {
        return false;
    }

    return confirm('Sila sahkan semula: anda pasti mahu memadam semua data ini? Tindakan ini tidak boleh dipulihkan.');
}
</script>

<div class="screen-actions">
    <div class="screen-actions-left">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-full bg-white px-5 py-2.5 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-slate-200 hover:bg-slate-50">
            <i class="fas fa-arrow-left"></i>
            Dashboard
        </a>
    </div>
    <div class="screen-actions-right">
        <form action="{{ route('admin.event.destroy', $event) }}" method="POST" onsubmit="return confirmEventDelete();" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-rose-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-rose-700">
                <i class="fas fa-trash"></i>
                Delete Event
            </button>
        </form>
        <button onclick="exportToExcel()" class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-emerald-700">
            <i class="fas fa-file-excel"></i>
            Export to Excel
        </button>
        <button onclick="window.print()" class="inline-flex items-center gap-2 rounded-full bg-orange-500 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-orange-600">
            <i class="fas fa-print"></i>
            Print Report
        </button>
    </div>
</div>

<section class="report-page">
    <h1 class="report-title">REGISTRATION DETAILS REGISTER</h1>
    <p class="report-subtitle">EVENT: {{ strtoupper($event->nama_event) }} | TOTAL REGISTRATIONS: {{ $totalRegistrations }}</p>

    <div class="report-table-wrap">
        <table class="report-table registration-table">
            <colgroup>
                <col class="col-no">
                <col class="col-attendee">
                <col class="col-email">
                <col class="col-phone">
                <col class="col-ref">
                <col class="col-course">
                <col class="col-college">
                <col class="col-payment-type">
                <col class="col-payment-status">
                <col class="col-pre-reg">
                <col class="col-closer">
            </colgroup>
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Attendee Name</th>
                    <th>Email</th>
                    <th>No. Tel</th>
                    <th>Ref.<br>Code</th>
                    <th>Course</th>
                    <th>College</th>
                    <th>Payment<br>Type</th>
                    <th>Payment<br>Status</th>
                    <th>Pre Reg.<br>(RM)</th>
                    <th>Pegawai Temuduga</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registrations as $index => $row)
                    @php
                        $statusClass = match($row['payment_status']) {
                            'COMPLETED' => 'status-completed',
                            'PARTIALLY PAID' => 'status-partial',
                            default => 'status-pending',
                        };
                        $attendeeName = strtoupper($row['pelajar']->nama_pelajar);
                        $attendeeLength = strlen($attendeeName);
                        $attendeeClass = $attendeeLength > 42 ? 'is-very-long' : ($attendeeLength > 28 ? 'is-long' : '');
                    @endphp
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td><span class="cell-clamp attendee-name {{ $attendeeClass }}">{{ $attendeeName }}</span></td>
                        <td><span class="cell-clamp email-text">{{ $row['pelajar']->email ?: '-' }}</span></td>
                        <td><span class="cell-clamp">{{ $row['pelajar']->no_tel ?: '-' }}</span></td>
                        <td><span class="cell-clamp">{{ $row['pelajar']->noreff ?: '-' }}</span></td>
                        <td><span class="cell-clamp">{{ $row['pelajar']->pilihan_pertama ?: ($row['pelajar']->kod_kursus ?: '-') }}</span></td>
                        <td><span class="cell-clamp">{{ $row['pelajar']->kod_institusi ?: '-' }}</span></td>
                        <td class="text-center"><span class="cell-clamp">{{ $row['payment_method'] }}</span></td>
                        <td class="text-center {{ $statusClass }}"><span class="cell-clamp">{{ $row['payment_status'] }}</span></td>
                        <td class="text-right">{{ number_format($row['pre_reg'], 2) }}</td>
                        <td><span class="cell-clamp">{{ strtoupper($row['closer']) }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="py-8 text-center font-bold text-slate-500">No registrations for this event.</td>
                    </tr>
                @endforelse
                <tr class="summary-row">
                    <th colspan="9" class="text-left">FINANCIAL SUMMARY</th>
                    <th class="text-right">{{ number_format($totalPreReg, 2) }}</th>
                    <th></th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="legend">
        <p><span class="status-completed">CASH</span> - Cash Payment</p>
        <p><span class="status-completed">COMPLETED</span> - Fully Paid</p>
        <p><span class="status-pending">NONE</span> - No Payment Specified</p>
        <p><span class="status-partial">ONLINE BANKING</span> - Online Transfer</p>
        <p><span class="status-partial">PARTIALLY PAID</span> - Partial Payment</p>
        <p><span class="status-pending">PENDING</span> - Payment Pending</p>
        <p><span class="status-pending">QR PAYMENT</span> - QR Code Payment</p>
    </div>
</section>

<section class="report-page">
    <h1 class="report-title">PAYMENT ANALYSIS REPORT</h1>
    <p class="report-subtitle">EVENT: {{ strtoupper($event->nama_event) }} | TOTAL TRANSACTIONS: {{ $totalRegistrations }}</p>

    <h2 class="section-title">PAYMENT METHOD ANALYSIS</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th>Payment Method</th>
                <th>Transactions</th>
                <th>% Share</th>
                <th>Revenue (RM)</th>
                <th>Avg. Per Txn (RM)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($paymentMethodRows as $row)
                <tr>
                    <td class="font-black">{{ $row['label'] }}</td>
                    <td class="text-center">{{ $row['transactions'] }}</td>
                    <td class="text-center">{{ number_format($row['share'], 1) }}%</td>
                    <td class="text-right">{{ number_format($row['revenue'], 2) }}</td>
                    <td class="text-right">{{ number_format($row['average'], 2) }}</td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center font-bold">No payment data.</td></tr>
            @endforelse
            <tr class="summary-row">
                <th>TOTAL</th>
                <th>{{ $totalRegistrations }}</th>
                <th>100%</th>
                <th class="text-right">{{ number_format($totalRevenue, 2) }}</th>
                <th class="text-right">{{ number_format($totalRegistrations > 0 ? $totalRevenue / $totalRegistrations : 0, 2) }}</th>
            </tr>
        </tbody>
    </table>

    <h2 class="section-title">PAYMENT STATUS ANALYSIS</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th>Payment Status</th>
                <th>Registrations</th>
                <th>% Share</th>
                <th>Revenue (RM)</th>
                <th>Avg. Per Reg (RM)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentStatusRows as $row)
                @php
                    $statusClass = match($row['label']) {
                        'COMPLETED' => 'status-completed',
                        'PARTIALLY PAID' => 'status-partial',
                        default => 'status-pending',
                    };
                @endphp
                <tr>
                    <td class="text-center {{ $statusClass }}">{{ $row['label'] }}</td>
                    <td class="text-center">{{ $row['registrations'] }}</td>
                    <td class="text-center">{{ number_format($row['share'], 1) }}%</td>
                    <td class="text-right">{{ number_format($row['revenue'], 2) }}</td>
                    <td class="text-right">{{ number_format($row['average'], 2) }}</td>
                </tr>
            @endforeach
            <tr class="summary-row">
                <th>TOTAL</th>
                <th>{{ $totalRegistrations }}</th>
                <th>100%</th>
                <th class="text-right">{{ number_format($totalRevenue, 2) }}</th>
                <th class="text-right">{{ number_format($totalRegistrations > 0 ? $totalRevenue / $totalRegistrations : 0, 2) }}</th>
            </tr>
        </tbody>
    </table>

    <h2 class="section-title">PAYMENT ANALYSIS INSIGHTS</h2>
    <div class="insight-box">
        Most popular payment method: {{ $popularMethod['label'] ?? 'NONE' }} ({{ number_format($popularMethod['share'] ?? 0, 1) }}% of all transactions)
    </div>
    <p class="footer-note">PAGE 2 OF 3 | REPORT ID: {{ $reportId }}</p>
</section>

<section class="report-page">
    <h1 class="report-title">PERFORMANCE ANALYSIS BY CLOSER</h1>
    <p class="report-subtitle">EVENT: {{ strtoupper($event->nama_event) }} | TOTAL CLOSERS: {{ $totalClosers }}</p>

    <h2 class="section-title">CLOSER PERFORMANCE RANKING</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Closer Name</th>
                <th>Closing</th>
                <th>Completed</th>
                <th>Partial</th>
                <th>Pending</th>
                <th>Total Revenue<br>(RM)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($closerRows as $index => $row)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="font-black">{{ strtoupper($row['closer']) }}</td>
                    <td class="text-center">{{ $row['closing'] }}</td>
                    <td class="text-center">{{ $row['completed'] }}</td>
                    <td class="text-center">{{ $row['partial'] }}</td>
                    <td class="text-center">{{ $row['pending'] }}</td>
                    <td class="text-right">{{ number_format($row['revenue'], 2) }}</td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center font-bold">No closer data.</td></tr>
            @endforelse
            <tr class="summary-row">
                <th colspan="2" class="text-left">TOTAL</th>
                <th>{{ $closerRows->sum('closing') }}</th>
                <th>{{ $closerRows->sum('completed') }}</th>
                <th>{{ $closerRows->sum('partial') }}</th>
                <th>{{ $closerRows->sum('pending') }}</th>
                <th class="text-right">{{ number_format($closerRows->sum('revenue'), 2) }}</th>
            </tr>
        </tbody>
    </table>

    <h2 class="section-title">PERFORMANCE INSIGHTS</h2>
    <p class="mt-5 text-sm font-bold uppercase leading-6">
        &bull; Top 3 closers account for {{ number_format($topThreeShare, 1) }}% of all registrations
        &bull; Average registrations per closer: {{ number_format($averagePerCloser, 1) }}
        &bull; {{ $activeClosers }} active closers out of {{ $totalClosers }} total
        &bull; Top closer completion rate: {{ number_format($topCompletionRate, 1) }}% ({{ $topCloser['completed'] ?? 0 }} of {{ $topCloser['closing'] ?? 0 }})
    </p>
    <p class="footer-note">PAGE 3 OF 3 | REPORT ID: {{ $reportId }}</p>
</section>

@include('components.social-float')
@include('layouts.footer-admin')
</body>
</html>