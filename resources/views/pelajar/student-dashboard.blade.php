<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Dashboard Pelajar - SESOC</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    <style>
        /* Dark Mode Styles */
        html.dark body {
            background-color: #0f172a;
            color: #f1f5f9;
        }

        html.dark .rounded-\[32px\] {
            background-color: #1e293b;
            border-color: #334155;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        html.dark .text-center > p.text-orange-500 {
            color: #fb923c;
        }

        html.dark .text-slate-900 {
            color: #f1f5f9;
        }

        html.dark .text-slate-600 {
            color: #cbd5e1;
        }

        html.dark .bg-slate-50 {
            background-color: #0f172a;
            border-color: #334155;
        }

        html.dark .bg-white {
            background-color: #111827;
            border-color: #334155;
        }

        html.dark .border-slate-200 {
            border-color: #334155;
        }

        html.dark .bg-emerald-50 {
            background-color: rgba(5, 150, 105, 0.12);
            border-color: #134e4a;
        }

        html.dark .bg-amber-50 {
            background-color: rgba(217, 119, 6, 0.1);
            border-color: #f59e0b;
        }

        html.dark .text-emerald-700 {
            color: #6ee7b7;
        }

        html.dark .text-emerald-900 {
            color: #d1fae5;
        }

        html.dark .text-amber-700 {
            color: #fcd34d;
        }

        html.dark .text-amber-900 {
            color: #fef3c7;
        }

        html.dark .text-slate-500 {
            color: #94a3b8;
        }

        html.dark .border-slate-200 {
            border-color: #334155;
        }

        html.dark .border-emerald-200 {
            border-color: #10b981;
        }

        html.dark .border-amber-200 {
            border-color: #f59e0b;
        }

        html.dark .text-emerald-500 {
            color: #10b981;
        }

        html.dark .bg-slate-50 h3,
        html.dark .bg-emerald-50 h3,
        html.dark .bg-amber-50 h3 {
            color: #f1f5f9;
        }

        html.dark .bg-slate-50 p,
        html.dark .bg-emerald-50 p,
        html.dark .bg-amber-50 p {
            color: #cbd5e1;
        }

        html.dark .bg-slate-50 .text-slate-500 {
            color: #94a3b8;
        }

        html.dark .bg-slate-50 .font-medium {
            color: #e2e8f0;
        }

        html.dark .border-slate-300 {
            border-color: #334155;
        }

        html.dark .bg-slate-50.hover\:bg-slate-100:hover {
            background-color: #1e293b;
        }

        html.dark .hover\:bg-slate-100:hover {
            background-color: #1e293b;
        }

        html.dark .hover\:bg-amber-600:hover {
            background-color: #d97706;
        }

        html.dark .hover\:bg-orange-600:hover {
            background-color: #ea580c;
        }

        html.dark .text-slate-700 {
            color: #cbd5e1;
        }

        html.dark .text-white {
            color: #ffffff;
        }

        html.dark .border {
            border-color: #334155;
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800">
@include('layouts.navpelajar')

<main class="max-w-6xl mx-auto px-4 py-8">
    <div class="rounded-[40px] overflow-hidden shadow-2xl border border-slate-200 bg-white">
        <div class="bg-gradient-to-r from-teal-500 via-cyan-500 to-sky-500 px-6 sm:px-8 py-10 text-white">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.4em] text-cyan-100">Dashboard Pelajar</p>
                    <h1 class="mt-3 text-3xl sm:text-4xl font-semibold tracking-tight">Selamat Datang, {{ explode(' ', $pelajar->nama_pelajar)[0] ?? $pelajar->nama_pelajar }}</h1>
                    <p class="mt-2 max-w-full sm:max-w-2xl text-sm text-cyan-100/90">Semua maklumat pendaftaran anda di sini. Teruskan dengan memilih kursus dan lengkapkan langkah seterusnya.</p>
                </div>
                <div class="rounded-[28px] bg-white/10 p-4 text-center md:text-right backdrop-blur-sm w-full md:w-auto max-w-xl md:max-w-xs mx-auto">
                    <p class="text-xs uppercase tracking-[0.3em] text-cyan-100/80">Status Pendaftaran</p>
                    <p class="mt-2 text-2xl font-semibold">{{ $pelajar->kod_kursus ? 'Lengkap Sebahagian' : 'Perlu Lengkapkan' }}</p>
                    <p class="text-sm text-cyan-100/80">{{ $pelajar->kod_kursus ? 'Masa untuk bayar dan sahkan kursus.' : 'Pilih kursus untuk teruskan.' }}</p>
                </div>
            </div>
        </div>

        <div class="p-8 space-y-8">
            @if(session('success'))
                <div class="rounded-[28px] border border-emerald-200 bg-emerald-50 p-4 text-emerald-700 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-[30px] border border-slate-200 bg-slate-50 p-6 shadow-sm min-w-0">
                    <p class="text-sm text-slate-500">No. K/P</p>
                    <p class="mt-3 text-xl font-semibold text-slate-900">{{ $pelajar->ic_pelajar }}</p>
                </div>
                <div class="rounded-[30px] border border-slate-200 bg-slate-50 p-6 shadow-sm min-w-0">
                    <p class="text-sm text-slate-500">No. Telefon</p>
                    <p class="mt-3 text-xl font-semibold text-slate-900">{{ $pelajar->no_tel ?? '-' }}</p>
                </div>
                <div class="rounded-[30px] border border-slate-200 bg-slate-50 p-6 shadow-sm min-w-0">
                    <p class="text-sm text-slate-500">Email</p>
                    <p class="mt-3 text-lg sm:text-xl font-semibold text-slate-900 break-all whitespace-normal">{{ $pelajar->email ?? '-' }}</p>
                </div>
            </div>

            <div class="rounded-[30px] border border-slate-200 bg-slate-50 p-6 shadow-sm">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Program</p>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">{{ $pelajar->program ?? '-' }}</p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('pelajar.editbmd', $pelajar->id) }}" class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                            <i class="fas fa-edit"></i> Kemaskini Maklumat
                        </a>
                        @if($pelajar->kod_kursus)
                        <a href="{{ route('pelajar.pembayaran', $pelajar->id) }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-teal-500 to-cyan-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-teal-200/30 transition hover:opacity-95">
                            <i class="fas fa-credit-card"></i> Buat Pembayaran
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            @if($pelajar->kod_kursus)
                <div class="rounded-[30px] border border-emerald-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-semibold text-slate-900">Kursus Dipilih</h2>
                            <p class="mt-2 text-slate-600">{{ $pelajar->kod_kursus }} telah dicatatkan. Sahkan pembayaran untuk melengkapkan pendaftaran.</p>
                        </div>
                        <div class="rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-700">Selesai</div>
                    </div>
                </div>
            @else
                <div class="rounded-[30px] border border-amber-200 bg-white p-6 shadow-sm">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-slate-900">Kursus Belum Dipilih</h2>
                            <p class="mt-2 text-slate-600">Pilih kursus yang anda minati supaya pendaftaran anda boleh diteruskan tanpa had.</p>
                        </div>
                        <a href="{{ route('pelajar.program-list', $pelajar->id) }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-amber-500 px-6 py-3 text-sm font-semibold text-white hover:bg-amber-600">
                            <i class="fas fa-arrow-right"></i> Pilih Kursus
                        </a>
                    </div>
                </div>
            @endif

            <div class="grid gap-6 md:grid-cols-2">
                <div class="rounded-[30px] border border-slate-200 bg-slate-50 p-6 shadow-sm">
                    <h3 class="font-semibold text-slate-900">Langkah Seterusnya</h3>
                    <ul class="mt-4 space-y-3 text-sm text-slate-600">
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full border border-teal-200 bg-teal-50 text-sm font-semibold text-teal-700">1</span>
                            Pilih atau sahkan kursus pilihan anda.
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full border border-teal-200 bg-teal-50 text-sm font-semibold text-teal-700">2</span>
                            Buat pembayaran jika perlu.
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full border border-teal-200 bg-teal-50 text-sm font-semibold text-teal-700">3</span>
                            Semak e-mel untuk pengesahan dan arahan seterusnya.
                        </li>
                    </ul>
                </div>
                <div class="rounded-[30px] border border-slate-200 bg-slate-50 p-6 shadow-sm">
                    <h3 class="font-semibold text-slate-900">Tip Berguna</h3>
                    <div class="mt-4 space-y-3 text-sm text-slate-600">
                        <p class="rounded-3xl bg-white px-4 py-3 shadow-sm">Pastikan nombor telefon dan email anda sentiasa dikemaskini supaya kami boleh hubungi anda dengan cepat.</p>
                        <p class="rounded-3xl bg-white px-4 py-3 shadow-sm">Jika anda belum menerima email, semak folder spam atau gunakan fungsi 'kemaskini maklumat diri'.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('components.social-float')

@include('layouts.footer-pelajar')

</body>
</html>
