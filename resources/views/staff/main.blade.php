<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB Staff Main</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800">
@include('layouts.navstaff')

<main class="max-w-7xl mx-auto px-4 py-6 space-y-6">
    @if(session('success'))
        <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-orange-500">Staff Dashboard</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Senarai Pelajar & Event</h1>
            <p class="mt-2 text-sm text-slate-600">Pilih event yang telah ditambah dan lihat pelajar mengikut tarikh yang sama.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('staff.event.create') }}" class="inline-flex items-center rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-sm shadow-orange-200 transition hover:bg-orange-600">Tambah Event</a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.8fr_0.9fr]">
        <section class="space-y-6">
            <div class="rounded-[32px] bg-slate-200 p-6 shadow-sm shadow-slate-200">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div class="space-y-2">
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-500">Event terpilih</p>
                        <h2 class="text-2xl font-semibold text-slate-900">{{ $selectedEvent?->nama_event ?? 'Tiada event dipilih' }}</h2>
                        <p class="text-sm text-slate-600">
                            {{ $selectedEvent?->tarikh_event?->format('d/m/Y') ?? '-' }} • {{ $selectedEvent?->masa_event ?? '-' }} • {{ $selectedEvent?->lokasi ?? '-' }}
                        </p>
                    </div>

                    <form method="GET" class="flex w-full max-w-md items-center gap-3 rounded-full border border-slate-300 bg-white p-2 shadow-sm">
                        <select name="event_id" onchange="this.form.submit()" class="w-full rounded-full border-none bg-transparent px-4 py-3 text-sm text-slate-700 outline-none">
                            <option value="">Pilih event</option>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}" @selected($selectedEvent && $selectedEvent->id === $event->id)>{{ $event->nama_event }} — {{ $event->tarikh_event->format('d/m/Y') }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="rounded-full bg-orange-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-orange-600">Tapis</button>
                    </form>
                </div>
            </div>

            <div class="overflow-x-auto rounded-[32px] border border-slate-200 bg-white shadow-sm">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-orange-500 text-white">
                        <tr>
                            <th class="px-6 py-4">Nama Pelajar</th>
                            <th class="px-6 py-4">Tarikh Daftar</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Temu Duga</th>
                            <th class="px-6 py-4">Print</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @forelse($pelajars as $pelajar)
                            @php
                                $payment = $paymentStatus->get($pelajar->ic_pelajar);
                                $statusLabel = $payment?->status ?? 'Belum Bayar';
                                $statusClasses = match(strtolower($statusLabel)) {
                                    'completed', 'selesai', 'bayar' => 'bg-emerald-100 text-emerald-700',
                                    'pending' => 'bg-amber-100 text-amber-700',
                                    'cancel', 'batal' => 'bg-rose-100 text-rose-700',
                                    default => 'bg-slate-100 text-slate-800',
                                };
                            @endphp
                            <tr class="hover:bg-slate-50">
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-slate-900">{{ $pelajar->nama_pelajar }}</div>
                                    <div class="text-xs text-slate-500">{{ $pelajar->ic_pelajar }}</div>
                                </td>
                                <td class="px-6 py-4">{{ $pelajar->tarikh_pendaftaran?->format('d M Y') ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClasses }}">{{ $statusLabel }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-100 px-4 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-50">Temu Duga</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('staff.bmd.edit', ['pelajar' => $pelajar->id]) }}" class="inline-flex items-center gap-2 rounded-full bg-slate-800 px-4 py-2 text-xs font-semibold text-white transition hover:bg-slate-900">BMD</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-sm text-slate-500">Tiada pelajar ditemui untuk event ini. Tekan "Tambah Event" atau pilih event lain.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="space-y-6">
            <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-500">QR Kehadiran</p>
                        <h2 class="mt-3 text-xl font-semibold text-slate-900">Imbas untuk BMD</h2>
                    </div>
                </div>
                <a href="{{ route('bmd', ['event_id' => $selectedEvent?->id]) }}" class="mt-6 block rounded-3xl border border-slate-200 bg-slate-100 p-5 text-center transition hover:border-orange-300 hover:bg-white">
                    <div class="mx-auto flex h-56 w-56 items-center justify-center rounded-3xl border border-slate-300 bg-white shadow-sm">
                        <span class="text-lg font-semibold uppercase tracking-[0.35em] text-slate-400">QR</span>
                    </div>
                </a>
                <p class="mt-4 text-sm leading-6 text-slate-600">QR ini membawa ke borang maklumat diri (BMD). Lengkapkan data pelajar untuk mencatat kehadiran dan cetak borang.</p>
            </div>

            <div class="rounded-[32px] border border-slate-200 bg-orange-500 p-6 text-white shadow-sm">
                <h3 class="text-lg font-semibold">Pemberitahuan</h3>
                <p class="mt-3 text-sm leading-6 text-orange-100">Status pembayaran ditentukan daripada jadual pembayaran. Jika belum bayar, pelajar akan ditanda sebagai belum bayar.</p>
            </div>
        </aside>
    </div>
</main>

@include('components.social-float')

@include('layouts.footer')

</body>
</html>
