<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Senarai Nama Pelajar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800">

<main class="max-w-7xl mx-auto px-4 py-6 space-y-6">
    @if(session('success'))
        <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-orange-500">Senarai Pelajar</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Pilih Event & Pelajar</h1>
            <p class="mt-2 text-sm text-slate-600">Pilih event untuk melihat senarai nama.</p>
        </div>
    </div>

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
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse($pelajars as $p)
                    @php
                        $payment = \App\Models\Pembayaran::where('ic_pelajar', $p->ic_pelajar)->latest()->first();
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
                            <div class="font-semibold text-slate-900">{{ $p->nama_pelajar }}</div>
                        </td>
                        <td class="px-6 py-4">{{ $p->tarikh_pendaftaran?->format('d M Y') ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClasses }}">{{ $statusLabel }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('pelajar.login', ['pelajar_id' => $p->id]) }}" class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-100 px-4 py-2 text-xs font-semibold text-blue-700 transition hover:bg-blue-50">Temu Duga</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-sm text-slate-500">Tiada pelajar ditemui untuk event ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

@include('components.social-float')

@include('layouts.footer-pelajar')

</body>
</html>