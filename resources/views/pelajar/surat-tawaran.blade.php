<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Surat Tawaran - Temu Duga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .surat-box {
            background: linear-gradient(135deg, #f0f4ff 0%, #e0e7ff 100%);
            border: 2px solid #4f46e5;
            border-radius: 1rem;
            padding: 2rem;
        }

        .surat-header {
            background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%);
            color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .document-preview {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin: 1rem 0;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 1rem;
        }

        .message-box {
            background: #fef3c7;
            border: 2px solid #fbbf24;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }

        .message-box.success {
            background: #dcfce7;
            border-color: #22c55e;
        }

        .message-box.info {
            background: #e0e7ff;
            border-color: #4f46e5;
        }

        @media print {
            body {
                background-color: white;
            }
            nav, footer {
                display: none !important;
            }
            main {
                padding: 0;
            }
            .no-print {
                display: none !important;
            }
            .surat-box {
                box-shadow: none;
                border: 1px solid #ccc;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-b from-slate-50 to-slate-100 text-slate-900">

@include('layouts.navpelajar')

<main class="min-h-screen flex-grow">
    <div class="max-w-3xl mx-auto px-4 py-12">
        <!-- Letter -->
        <div class="surat-box">
            <div class="surat-header">
                <h1 class="text-3xl font-bold mb-2">
                    <i class="fas fa-envelope-open-text"></i> Surat Tawaran
                </h1>
                <p class="text-indigo-100">Penawaran Kemasukan Program Pengajian</p>
            </div>

            @if($hasSurat)
                <!-- Document Found -->
                <div class="bg-white rounded-lg p-6 mb-6">
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-4">
                            <i class="fas fa-file-word text-blue-600"></i> Surat Tawaran Tersedia
                        </h3>

                        <div class="message-box success">
                            <p class="text-green-700 font-semibold mb-2">
                                <i class="fas fa-check-circle"></i> Surat Tawaran telah ditersiapkan untuk anda!
                            </p>
                            <p class="text-green-600 text-sm">
                                Anda boleh memuat turun surat tawaran dalam format DOCX di bawah.
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-lg p-6 border border-slate-200 mb-6">
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">Pelajar:</span>
                                    <span class="text-slate-900">{{ $pelajar->nama_pelajar }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">No. Pengenalan:</span>
                                    <span class="text-slate-900">{{ $pelajar->ic_pelajar }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">Institusi:</span>
                                    <span class="text-slate-900">{{ $kursus->institusi->nama_institusi ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">Program Pengajian:</span>
                                    <span class="text-slate-900">{{ $kursus->nama_kursus ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">Kod Kursus:</span>
                                    <span class="text-slate-900">{{ $kursus->kod_kursus ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="document-preview">
                            <i class="fas fa-file-word text-6xl text-blue-500 opacity-50"></i>
                            <div class="text-center">
                                <p class="font-semibold text-slate-700">Surat Tawaran (DOCX)</p>
                                <p class="text-sm text-slate-600">{{ $kursus->kod_kursus }}.docx</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3 justify-center mb-6 no-print">
                        <a href="{{ route('pelajar.download-surat-tawaran', $pelajar->id) }}" class="inline-flex items-center gap-2 rounded-full bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition">
                            <i class="fas fa-download"></i> Muat Turun
                        </a>
                        <button onclick="sendEmail()" class="inline-flex items-center gap-2 rounded-full border border-orange-600 bg-orange-100 px-6 py-3 text-sm font-semibold text-orange-700 hover:bg-orange-200 transition">
                            <i class="fas fa-envelope"></i> Hantar Email
                        </button>
                        <button type="button" onclick="showCongrats()" class="inline-flex items-center gap-2 rounded-full bg-green-600 px-6 py-3 text-sm font-semibold text-white hover:bg-green-700 transition">
                            <i class="fas fa-check"></i> Selesai
                        </button>
                    </div>
                </div>
            @else
                <!-- Document Not Found -->
                <div class="bg-white rounded-lg p-6 mb-6">
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-4">
                            <i class="fas fa-file-word text-blue-600"></i> Surat Tawaran Institusi
                        </h3>

                        <div class="message-box info">
                            <p class="text-indigo-700 font-semibold mb-2">
                                <i class="fas fa-info-circle"></i> Maklumat Penting
                            </p>
                            <p class="text-indigo-600 text-sm mb-3">
                                Surat Tawaran akan diberikan oleh institusi tersebut melalui E-mail.
                            </p>
                            <p class="text-indigo-600 text-sm">
                                Sila tunggu untuk menerima surat tawaran dari institusi anda dalam tempoh 5-7 hari bekerja.
                            </p>
                        </div>

                        <div class="bg-slate-50 rounded-lg p-6 border border-slate-200 mb-6">
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">Pelajar:</span>
                                    <span class="text-slate-900">{{ $pelajar->nama_pelajar }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">No. Pengenalan:</span>
                                    <span class="text-slate-900">{{ $pelajar->ic_pelajar }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">Institusi:</span>
                                    <span class="text-slate-900">{{ $kursus->institusi->nama_institusi ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">Program Pengajian:</span>
                                    <span class="text-slate-900">{{ $kursus->nama_kursus ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold text-slate-700">Kod Kursus:</span>
                                    <span class="text-slate-900">{{ $kursus->kod_kursus ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="document-preview">
                            <i class="fas fa-envelope text-6xl text-amber-500 opacity-50"></i>
                            <div class="text-center">
                                <p class="font-semibold text-slate-700">Menanti Surat Tawaran</p>
                                <p class="text-sm text-slate-600">Akan dihantar melalui e-mail</p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="bg-amber-50 border border-amber-200 rounded-lg p-6 mb-6">
                        <h4 class="font-semibold text-amber-900 mb-3">
                            <i class="fas fa-lightbulb"></i> Apa yang perlu dilakukan?
                        </h4>
                        <ol class="list-decimal list-inside space-y-2 text-sm text-amber-900">
                            <li>Periksa e-mel anda secara berkala</li>
                            <li>Surat tawaran akan dihantar ke alamat e-mel anda yang terdaftar</li>
                            <li>Jika tidak menerima dalam 7 hari, hubungi: {{ config('app.support_email', 'sesoclegacy@gmail.com') }}</li>
                            <li>Cetak surat tawaran untuk tujuan rekod</li>
                        </ol>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3 justify-center no-print">
                        <button type="button" onclick="showCongrats()" class="inline-flex items-center gap-2 rounded-full bg-green-600 px-6 py-3 text-sm font-semibold text-white hover:bg-green-700 transition">
                            <i class="fas fa-check"></i> Selesai
                        </button>
                    </div>
                </div>
            @endif

            <!-- Contact Information -->
            <div class="bg-white rounded-lg p-6">
                <h3 class="text-lg font-bold text-slate-900 mb-4">
                    <i class="fas fa-phone text-orange-600"></i> Hubungi Kami
                </h3>
                <div class="space-y-2 text-sm text-slate-600">
                    <p><strong>Email:</strong> <a href="mailto:{{ config('app.support_email', 'sesoclegacy@gmail.com') }}" class="text-indigo-600 hover:underline">{{ config('app.support_email', 'sesoclegacy@gmail.com') }}</a></p>
                    <p><strong>Telefon:</strong> {{ config('app.support_phone', '011-2672 5795') }}</p>
                </div>
            </div>
        </div>

        <!-- Progress -->
        <div class="mt-8 text-center">
            <p class="text-slate-600 mb-3">Proses temu duga</p>
            <div class="flex flex-wrap items-center justify-center gap-2 text-sm text-slate-500">
                <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-green-600 text-white font-bold text-xs">1</span>
                <span>Pilihan Kursus</span>
                <i class="fas fa-chevron-right mx-1"></i>
                <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-green-600 text-white font-bold text-xs">2</span>
                <span>Pembayaran</span>
                <i class="fas fa-chevron-right mx-1"></i>
                <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-green-600 text-white font-bold text-xs">3</span>
                <span>Resit</span>
                <i class="fas fa-chevron-right mx-1"></i>
                <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-green-600 text-white font-bold text-xs">4</span>
                <span>Surat Tawaran</span>
            </div>
        </div>

    </div>
</main>

<div id="congrats-overlay" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50 p-4">
    <div class="w-full max-w-3xl rounded-[28px] bg-white p-8 shadow-2xl ring-1 ring-slate-200">
        <div class="flex flex-col gap-4 text-center">
            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-emerald-100 text-emerald-800 text-3xl shadow-sm">
                <i class="fas fa-trophy"></i>
            </div>
            <h2 class="text-3xl font-semibold text-slate-900">Tahniah! Pendaftaran Anda Telah Berjaya</h2>
            <p class="text-slate-700 leading-relaxed">
                Semua maklumat telah berjaya dihantar dan kini sedang dalam proses semakan oleh pihak kami.
            </p>
            <p class="text-slate-700 leading-relaxed">
                Sila pantau e-mel serta nombor telefon yang didaftarkan kerana kami akan menghubungi anda dalam masa 3-5 hari bekerja untuk pengesahan seterusnya.
            </p>
            <div class="rounded-3xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-900 text-sm font-medium">
                <i class="fas fa-check-circle mr-2"></i>Kerjasama anda dihargai. Teruskan langkah seterusnya dengan penuh keyakinan.
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <button type="button" onclick="hideCongrats()" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-900 hover:bg-slate-50 transition">
                    Tutup
                </button>
                <a href="/" class="inline-flex items-center justify-center rounded-full bg-green-600 px-6 py-3 text-sm font-semibold text-white hover:bg-green-700 transition">
                    Ke Laman Utama
                </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer-pelajar')

<script>
    function sendEmail() {
        // Send email via route
        fetch('{{ route("pelajar.send-email", $pelajar->id) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        }).then(response => {
            if (response.redirected) {
                window.location.href = response.url;
            } else {
                return response.json();
            }
        }).then(data => {
            if (data && data.success) {
                alert('Email telah dihantar.');
                window.location.href = '{{ route("pelajar.complete", $pelajar->id) }}';
            }
        }).catch(error => {
            console.error('Error:', error);
            alert('Ralat semasa menghantar email.');
        });
    }

    function showCongrats() {
        document.getElementById('congrats-overlay').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function hideCongrats() {
        document.getElementById('congrats-overlay').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>