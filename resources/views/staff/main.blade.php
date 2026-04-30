<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
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
                            <th class="px-6 py-4">Jumlah (RM)</th>
                            <th class="px-6 py-4">Bayaran Semasa (RM)</th>
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
                                    <button type="button" onclick="openStatusModal('{{ $pelajar->ic_pelajar }}', '{{ $statusLabel }}', '{{ $payment?->jumlah_bayaran ?? 0 }}', '{{ $payment?->bayaran_semasa ?? 0 }}')" class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClasses }} hover:opacity-80 cursor-pointer">
                                        {{ $statusLabel }}
                                    </button>
                                </td>
                                <td class="px-6 py-4">
                                    {{ number_format($payment?->jumlah_bayaran ?? 0, 2) }}
                                </td>
                                <td class="px-6 py-4">{{ number_format($payment?->bayaran_semasa ?? 0, 2) }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('staff.bmd.edit', ['pelajar' => $pelajar->id]) }}" class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-100 px-4 py-2 text-xs font-semibold text-blue-700 transition hover:bg-blue-50">Temu Duga</a>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('staff.bmd.edit', ['pelajar' => $pelajar->id]) }}" class="inline-flex items-center gap-2 rounded-full bg-slate-800 px-4 py-2 text-xs font-semibold text-white transition hover:bg-slate-900">BMD</a>
                                        <a
                                            href="{{ route('staff.bmd.resit', ['pelajar' => $pelajar->id]) }}"
                                            onclick="openReceiptModal(event, '{{ route('staff.bmd.resit', ['pelajar' => $pelajar->id]) }}')"
                                            class="inline-flex items-center gap-2 rounded-full bg-blue-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-blue-700"
                                        >
                                            Resit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-sm text-slate-500">Tiada pelajar ditemui untuk event ini. Tekan "Tambah Event" atau pilih event lain.</td>
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
                <p class="mt-3 text-sm leading-6 text-orange-100">Status pembayaran ditentukan daripada jadual pembayaran. Jika belum bayar, pelajar akan ditanda sebagai belum bayar.</p>
            </div>
        </aside>
    </div>
</main>

@include('components.social-float')

@include('layouts.footer')

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
                        <option value="Belum Bayar">Belum Bayar</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                        <option value="cancel">Cancel</option>
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
                <button type="button" onclick="printReceiptModal()" class="inline-flex items-center rounded-full bg-orange-500 px-5 py-2 text-sm font-semibold text-white transition hover:bg-orange-600">Cetak / Simpan PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
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

    function openReceiptModal(event, url) {
        if (event) {
            event.preventDefault();
        }

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
