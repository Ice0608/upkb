<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <title>SESOC Staff Main</title>
    @include('components.dark-mode-init')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.staff-dark-mode')
</head>
<body class="staff-page bg-slate-100 text-slate-800">
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
                            <th class="px-6 py-4">Jumlah (RM)</th>
                            <th class="px-6 py-4">Bayaran Semasa (RM)</th>
                            <th class="px-6 py-4">Lihat Resit</th>
                            <th class="px-6 py-4">Temu Duga</th>
                            <th class="px-6 py-4">Print</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @forelse($pelajars as $pelajar)
                            @php
                                $payment = $paymentStatus->get($pelajar->ic_pelajar);
                                $rawStatus = strtolower((string) ($payment?->status ?? 'none'));
                                $statusValue = match($rawStatus) {
                                    'completed', 'complete', 'paid', 'fully paid', 'selesai', 'bayar' => 'completed',
                                    'partial', 'partially paid' => 'partially paid',
                                    'pending' => 'pending',
                                    'cancel', 'cancelled', 'canceled', 'batal' => 'cancel',
                                    default => 'none',
                                };
                                $statusLabel = match($statusValue) {
                                    'completed' => 'COMPLETED',
                                    'partially paid' => 'PARTIALLY PAID',
                                    'pending' => 'PENDING',
                                    'cancel' => 'CANCEL',
                                    default => 'NONE',
                                };
                                $statusClasses = match($statusValue) {
                                    'completed', 'selesai', 'bayar' => 'bg-emerald-100 text-emerald-700',
                                    'partially paid' => 'bg-blue-100 text-blue-700',
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
                                    <button type="button" onclick="openStatusModal('{{ $pelajar->ic_pelajar }}', '{{ $statusValue }}', '{{ $payment?->jumlah_bayaran ?? 0 }}', '{{ $payment?->bayaran_semasa ?? 0 }}')" class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClasses }} hover:opacity-80 cursor-pointer">
                                        {{ $statusLabel }}
                                    </button>
                                </td>
                                <td class="px-6 py-4">
                                    {{ number_format($payment?->jumlah_bayaran ?? 0, 2) }}
                                </td>
                                <td class="px-6 py-4">{{ number_format($payment?->bayaran_semasa ?? 0, 2) }}</td>
                                <td class="px-6 py-4">
                                    @if($payment && $payment->resit)
                                        <button type="button" onclick="openResitModal('{{ asset('storage/' . $payment->resit) }}')" class="inline-flex items-center gap-2 rounded-full bg-green-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-green-700">Lihat Resit</button>
                                    @else
                                        <span class="text-xs text-slate-400">Tiada resit</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('staff.bmd.edit', ['pelajar' => $pelajar->id]) }}" class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-100 px-4 py-2 text-xs font-semibold text-blue-700 transition hover:bg-blue-50">Temu Duga</a>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('staff.bmd.edit', ['pelajar' => $pelajar->id]) }}" class="staff-action-btn staff-action-btn--bmd inline-flex items-center gap-2 rounded-full bg-slate-800 px-4 py-2 text-xs font-semibold text-white transition hover:bg-slate-900">BMD</a>
                                        <a
                                            href="{{ route('staff.bmd.resit', ['pelajar' => $pelajar->id]) }}"
                                            onclick="openReceiptModal(event, '{{ route('staff.bmd.resit', ['pelajar' => $pelajar->id]) }}')"
                                            class="staff-action-btn staff-action-btn--resit inline-flex items-center gap-2 rounded-full bg-blue-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-blue-700"
                                        >
                                            Resit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-sm text-slate-500">Tiada pelajar ditemui untuk event ini. Tekan "Tambah Event" atau pilih event lain.</td>
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
                    <div id="qrcode" class="mx-auto flex h-56 w-56 items-center justify-center rounded-3xl border border-slate-300 bg-white shadow-sm"></div>
                </a>
                <p class="mt-4 text-sm leading-6 text-slate-600">QR ini membawa ke borang maklumat diri (BMD). Lengkapkan data pelajar untuk mencatat kehadiran dan cetak borang.</p>
                <div class="mt-4 flex flex-wrap gap-3">
                    <button
                        type="button"
                        onclick="downloadBmdQrPdf()"
                        class="inline-flex items-center rounded-full bg-orange-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-orange-600 disabled:cursor-not-allowed disabled:opacity-50"
                        {{ $selectedEvent?->id ? '' : 'disabled' }}
                    >
                        Muat Turun PDF QR
                    </button>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const qrContainer = document.getElementById('qrcode');
                        qrContainer.innerHTML = '';
                        const eventId = {{ $selectedEvent?->id ?? 'null' }};
                        if (eventId) {
                            const url = "{{ route('bmd', ['event_id' => '__EVENT_ID__']) }}".replace('__EVENT_ID__', eventId);
                            new QRCode(qrContainer, {
                                text: url,
                                width: 200,
                                height: 200,
                                colorDark: "#0f172a",
                                colorLight: "#ffffff",
                                correctLevel: QRCode.CorrectLevel.H
                            });
                        } else {
                            qrContainer.innerHTML = '<span class="text-lg font-semibold uppercase tracking-[0.35em] text-slate-400">QR</span>';
                        }
                    });
                </script>
            </div>

            <div class="rounded-[32px] border border-slate-200 bg-orange-500 p-6 text-white shadow-sm">
                <h3 class="text-lg font-semibold">Pemberitahuan</h3>
                <p class="mt-3 text-sm leading-6 text-orange-100">Status pembayaran ditentukan daripada jadual pembayaran. Jika belum ada rekod bayaran, pelajar akan ditanda sebagai NONE.</p>
            </div>
        </aside>
    </div>
</main>

@if(session('show_dashboard_intro'))
<div id="pixel-loader" class="fixed inset-0 z-[9999] bg-black overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 opacity-10 pointer-events-none"
         style="background-image: linear-gradient(#ffaa00 1px, transparent 1px), linear-gradient(90deg, #ffaa00 1px, transparent 1px); background-size: 60px 60px;">
    </div>

    <div class="absolute inset-0 z-10 opacity-0 transition-opacity duration-1000" id="video-container">
        <video id="splash-video" class="w-full h-full object-cover scale-110 transition-transform duration-[3s] ease-out" muted playsinline>
            <source src="{{ asset('videos/splash.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div id="loader-content" class="relative z-30 text-center transition-all duration-1000">
        <div class="relative w-56 h-56 md:w-76 md:h-80 mx-auto mb-6 opacity-0 transform translate-y-4 transition-all duration-1000 ease-out" id="logo-container">
            <img src="{{ asset('images/icon/SES LOGO RENEW.png') }}"
                 class="absolute inset-0 w-full h-full object-contain filter-glow multiply-blend animate-smoke-dissolve">
        </div>

        <div class="font-mono text-orange-500 tracking-[0.5em] text-[10px] uppercase animate-glitch-text opacity-0 transition-opacity duration-700 delay-500" id="status-text">
            Initializing System...
            <div class="mt-2 w-32 h-[1px] bg-gray-800 mx-auto overflow-hidden relative">
                <div id="load-bar" class="h-full bg-orange-500 w-0 transition-all duration-[2s] ease-in-out"></div>
            </div>
        </div>
    </div>
</div>
@endif

@include('components.social-float')

@include('layouts.footer')

<style>
    body.is-loading { overflow: hidden !important; }

    .filter-glow { filter: drop-shadow(0 0 25px rgba(255,165,0,0.6)); }
    .multiply-blend { mix-blend-mode: multiply; }

    @keyframes smoke-dissolve {
        0% { opacity: 0; filter: blur(15px) drop-shadow(0 0 25px rgba(255,165,0,0)); transform: scale(1.1); }
        50% { opacity: 0.8; filter: blur(5px) drop-shadow(0 0 25px rgba(255,165,0,0.6)); transform: scale(1); }
        100% { opacity: 1; filter: blur(0px) drop-shadow(0 0 25px rgba(255,165,0,0.6)); transform: scale(1); }
    }
    .animate-smoke-dissolve { animation: smoke-dissolve 2s cubic-bezier(0.19, 1, 0.22, 1) forwards; }

    @keyframes glitch-text {
        0%, 100% { transform: translate(0); text-shadow: 0 0 2px rgba(255,165,0,0.5); }
        33% { transform: translate(-1px, 1px); text-shadow: -1px 0 red, 1px 0 blue; }
        66% { transform: translate(1px, -1px); text-shadow: 1px 0 red, -1px 0 blue; }
    }
    .animate-glitch-text { animation: glitch-text 2s infinite linear; }

    main, nav {
        opacity: 0;
        transform: scale(1.05);
        transition: all 1.2s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .content-ready main, .content-ready nav { opacity: 1; transform: scale(1); }
</style>

<!-- Status Edit Modal -->
<div id="status-modal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="closeStatusModal()"></div>
    <div class="relative flex min-h-screen items-center justify-center p-4">
        <div class="relative w-full max-w-md rounded-3xl bg-white p-6 shadow-xl">
            <h3 class="text-xl font-semibold text-slate-900 mb-4">Kemaskini Status Pembayaran</h3>
            <form id="status-form" method="POST">
                @csrf
                <input type="hidden" name="ic_pelajar" id="modal-ic-pelajar">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status</label>
                    <select name="status" id="modal-status" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400">
                        <option value="none">NONE</option>
                        <option value="pending">PENDING</option>
                        <option value="partially paid">PARTIALLY PAID</option>
                        <option value="completed">COMPLETED</option>
                        <option value="cancel">CANCEL</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jumlah Bayaran (RM)</label>
                    <input type="number" step="0.01" min="0" name="jumlah_bayaran" id="modal-jumlah-bayaran" class="w-full rounded-3xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Bayaran Semasa (RM)</label>
                    <input type="number" step="0.01" min="0" name="bayaran_semasa" id="modal-bayaran-semasa" class="w-full rounded-3xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none" />
                </div>
                <div class="flex gap-3 justify-end">
                    <button type="button" onclick="closeStatusModal()" class="inline-flex items-center rounded-full border border-slate-300 bg-slate-50 px-5 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">Batal</button>
                    <button type="submit" class="inline-flex items-center rounded-full bg-orange-500 px-5 py-2 text-sm font-semibold text-white hover:bg-orange-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Receipt Preview Modal -->
<div id="receipt-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/50">
    <div class="flex min-h-screen items-start justify-center px-4 pt-4">
        <div class="max-h-[90vh] w-full max-w-4xl overflow-y-auto rounded-3xl bg-white shadow-xl">
            <div class="sticky top-0 flex items-center justify-between border-b border-slate-200 bg-white p-4">
                <h3 class="text-lg font-semibold text-slate-900">Preview Resit</h3>
                <button type="button" onclick="closeReceiptModal()" class="text-slate-400 transition hover:text-slate-600" aria-label="Tutup preview resit">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div id="receipt-modal-content" class="p-6">
                <p class="text-sm text-slate-500">Memuatkan preview resit...</p>
            </div>

            <div class="sticky bottom-0 flex justify-end gap-3 border-t border-slate-200 bg-white p-4">
                <button type="button" onclick="closeReceiptModal()" class="inline-flex items-center rounded-full border border-slate-300 bg-slate-50 px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Tutup</button>
                <button type="button" onclick="sendEmailResit()" id="send-email-btn" class="inline-flex items-center rounded-full bg-blue-500 px-5 py-2 text-sm font-semibold text-white transition hover:bg-blue-600">
                    <i class="fas fa-envelope mr-2"></i>Hantar Email
                </button>
                <button type="button" onclick="printReceiptModal()" class="inline-flex items-center rounded-full bg-orange-500 px-5 py-2 text-sm font-semibold text-white transition hover:bg-orange-600">Cetak / Simpan PDF</button>
            </div>
        </div>
    </div>
</div>

<!-- Resit View Modal -->
<div id="resit-view-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/50">
    <div class="flex min-h-screen items-center justify-center px-4">
        <div class="w-full max-w-4xl rounded-3xl bg-white shadow-xl">
            <div class="flex items-center justify-between border-b border-slate-200 bg-white p-4">
                <h3 class="text-lg font-semibold text-slate-900">Lihat Resit Pembayaran</h3>
                <button type="button" onclick="closeResitModal()" class="text-slate-400 transition hover:text-slate-600" aria-label="Tutup resit">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div id="resit-view-content" class="p-6">
                <p class="text-sm text-slate-500">Memuatkan resit...</p>
            </div>

            <div class="flex justify-end gap-3 border-t border-slate-200 bg-white p-4">
                <button type="button" onclick="closeResitModal()" class="inline-flex items-center rounded-full border border-slate-300 bg-slate-50 px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const loader = document.getElementById('pixel-loader');
        const videoContainer = document.getElementById('video-container');
        const splashVideo = document.getElementById('splash-video');
        const logoContainer = document.getElementById('logo-container');
        const statusText = document.getElementById('status-text');
        const loadBar = document.getElementById('load-bar');
        const body = document.body;

        if (!loader || !videoContainer || !splashVideo || !logoContainer || !statusText || !loadBar) {
            body.classList.add('content-ready');
            return;
        }

        body.classList.add('is-loading');

        splashVideo.play().catch(() => {});
        videoContainer.style.opacity = '1';
        splashVideo.style.transform = 'scale(1)';

        setTimeout(() => {
            logoContainer.style.opacity = '1';
            logoContainer.style.transform = 'translateY(0)';
        }, 500);

        setTimeout(() => {
            statusText.style.opacity = '1';
            loadBar.style.width = '100%';
        }, 1000);

        setTimeout(() => {
            loader.querySelector('#loader-content').style.opacity = '0';
            loader.querySelector('#loader-content').style.transform = 'scale(0.9)';

            setTimeout(() => {
                body.classList.add('content-ready');
                loader.style.transition = 'opacity 1s ease-out';
                loader.style.opacity = '0';

                setTimeout(() => {
                    loader.style.display = 'none';
                    body.classList.remove('is-loading');
                }, 1000);
            }, 800);
        }, 3500);
    });

    function openStatusModal(icPelajar, currentStatus, jumlah = 0, bayaran = 0) {
        document.getElementById('modal-ic-pelajar').value = icPelajar;
        document.getElementById('modal-status').value = currentStatus;
        // Ensure numeric values
        const j = parseFloat(String(jumlah).replace(',', '.')) || 0;
        const b = parseFloat(String(bayaran).replace(',', '.')) || 0;
        document.getElementById('modal-jumlah-bayaran').value = j.toFixed(2);
        document.getElementById('modal-bayaran-semasa').value = b.toFixed(2);
        document.getElementById('status-form').action = '{{ route("staff.payment.update-status") }}';
        document.getElementById('status-modal').classList.remove('hidden');
    }

    function closeStatusModal() {
        document.getElementById('status-modal').classList.add('hidden');
    }

    let currentPelajarId = null;

    function openReceiptModal(event, url) {
        if (event) {
            event.preventDefault();
        }

        // Extract pelajar_id from URL
        const urlParts = url.split('/');
        currentPelajarId = urlParts[urlParts.length - 2]; // Assuming URL ends with /resit/{id}

        const modal = document.getElementById('receipt-modal');
        const content = document.getElementById('receipt-modal-content');

        content.innerHTML = '<p class="text-sm text-slate-500">Memuatkan preview resit...</p>';
        modal.classList.remove('hidden');

        fetch(`${url}?modal=1`)
            .then(response => response.text())
            .then(html => {
                content.innerHTML = html;
            })
            .catch(error => {
                console.error('Error loading receipt preview:', error);
                content.innerHTML = '<p class="text-sm text-rose-600">Preview resit tidak dapat dimuatkan. Sila cuba lagi.</p>';
            });
    }

    function closeReceiptModal() {
        document.getElementById('receipt-modal').classList.add('hidden');
    }

    function openResitModal(resitUrl) {
        const modal = document.getElementById('resit-view-modal');
        const content = document.getElementById('resit-view-content');

        content.innerHTML = '<p class="text-sm text-slate-500">Memuatkan resit...</p>';
        modal.classList.remove('hidden');

        // Check if it's an image or PDF
        const fileExtension = resitUrl.split('.').pop().toLowerCase();
        if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
            content.innerHTML = `<img src="${resitUrl}" alt="Resit Pembayaran" class="max-w-full h-auto rounded-lg shadow-sm">`;
        } else if (fileExtension === 'pdf') {
            content.innerHTML = `<iframe src="${resitUrl}" class="w-full h-96 rounded-lg shadow-sm"></iframe>`;
        } else {
            content.innerHTML = `<p class="text-sm text-rose-600">Format fail tidak disokong untuk paparan.</p>`;
        }
    }

    function closeResitModal() {
        document.getElementById('resit-view-modal').classList.add('hidden');
    }

    function sendEmailResit() {
        if (!currentPelajarId) {
            alert('ID pelajar tidak ditemui.');
            return;
        }

        if (!confirm('Adakah anda pasti mahu hantar resit melalui email kepada pelajar?')) {
            return;
        }

        const btn = document.getElementById('send-email-btn');
        const originalHtml = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sedang menghantar...';

        // Create form data
        const formData = new FormData();
        formData.append('pelajar_id', currentPelajarId);

        // Send AJAX request
        fetch('{{ route("staff.bmd.send-email-resit") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(response => {
            // Check if response is JSON
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                return response.json().then(data => ({
                    ok: response.ok,
                    data: data,
                    status: response.status
                }));
            } else {
                throw new Error('Server response is not JSON. Status: ' + response.status);
            }
        })
        .then(result => {
            if (result.ok && result.data.success) {
                alert('✓ Resit berjaya dihantar ke email pelajar!');
                closeReceiptModal();
            } else {
                alert('✗ Ralat: ' + (result.data.message || 'Tidak dapat menghantar email'));
            }
        }).catch(error => {
            console.error('Error details:', error);
            alert('✗ Ralat sistem: ' + error.message + '\n\nSila semak console (F12) untuk butiran teknikal.');
        }).finally(() => {
            btn.disabled = false;
            btn.innerHTML = originalHtml;
        });
    }

    function printReceiptModal() {
        const receiptContent = document.getElementById('receipt-modal-content');
        
        // Create a hidden iframe for printing
        const iframe = document.createElement('iframe');
        iframe.style.display = 'none';
        document.body.appendChild(iframe);

        // Write content to iframe
        const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
        iframeDoc.write(`<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Preview Resit</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: white;
        }

        @media print {
            body {
                background: white;
            }
        }
    </style>
</head>
<body>
    ${receiptContent.innerHTML}
</body>
</html>`);
        iframeDoc.close();

        // Print and then remove iframe
        setTimeout(() => {
            iframe.contentWindow.print();
            document.body.removeChild(iframe);
        }, 250);
    }

    function downloadBmdQrPdf() {
        const qrContainer = document.getElementById('qrcode');
        const qrCanvas = qrContainer ? qrContainer.querySelector('canvas') : null;
        const qrImage = qrContainer ? qrContainer.querySelector('img') : null;
        const qrSrc = qrCanvas ? qrCanvas.toDataURL('image/png') : qrImage ? qrImage.src : '';
        const eventName = @json($selectedEvent?->nama_event ?? 'Borang Maklumat Diri');
        const eventDate = @json($selectedEvent?->tarikh_event?->format('d/m/Y') ?? '-');
        const eventLocation = @json($selectedEvent?->lokasi ?? '-');
        const bmdUrl = @json($selectedEvent?->id ? route('bmd', ['event_id' => $selectedEvent->id]) : '');

        if (!qrSrc || !bmdUrl) {
            alert('Sila pilih event terlebih dahulu untuk memuat turun QR BMD.');
            return;
        }

        const printWindow = window.open('', '_blank', 'width=900,height=1100');
        if (!printWindow) {
            alert('Popup disekat oleh browser. Benarkan popup untuk mencetak QR.');
            return;
        }

        printWindow.document.write(`<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR BMD - ${eventName}</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 14mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #0f172a;
            background: #ffffff;
        }

        .sheet {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12mm 0;
        }

        .poster {
            width: 100%;
            max-width: 178mm;
            border: 2px solid #f97316;
            border-radius: 24px;
            padding: 14mm;
            text-align: center;
        }

        .eyebrow {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: #f97316;
            margin-bottom: 10px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
            line-height: 1.2;
        }

        .meta {
            margin-top: 10px;
            font-size: 14px;
            line-height: 1.7;
            color: #475569;
        }

        .qr-box {
            margin: 14mm auto 10mm;
            width: 78mm;
            height: 78mm;
            border: 1px solid #cbd5e1;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8mm;
            background: #fff;
        }

        .qr-box img {
            width: 100%;
            height: auto;
            display: block;
        }

        .cta {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .desc {
            font-size: 14px;
            line-height: 1.7;
            color: #475569;
            margin: 0 auto;
            max-width: 120mm;
        }

        .url {
            margin-top: 10mm;
            padding: 4mm 5mm;
            border-radius: 16px;
            background: #f8fafc;
            font-size: 12px;
            color: #334155;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <div class="sheet">
        <div class="poster">
            <div class="eyebrow">QR BMD</div>
            <h1>${eventName}</h1>
            <div class="meta">
                Tarikh: ${eventDate}<br>
                Lokasi: ${eventLocation}
            </div>
            <div class="qr-box">
                <img src="${qrSrc}" alt="QR BMD">
            </div>
            <div class="cta">Imbas Untuk Isi Borang Maklumat Diri</div>
            <p class="desc">Sila imbas kod QR ini menggunakan telefon anda untuk mengisi borang pendaftaran BMD sebelum proses seterusnya di kaunter.</p>
            <div class="url">${bmdUrl}</div>
        </div>
    </div>
</body>
</html>`);
        printWindow.document.close();

        setTimeout(() => {
            printWindow.focus();
            printWindow.print();
        }, 300);
    }
</script>

</body>
</html>
