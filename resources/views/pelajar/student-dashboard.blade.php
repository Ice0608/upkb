<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
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

        html.dark .bg-emerald-50 {
            background-color: rgba(5, 150, 105, 0.1);
            border-color: #10b981;
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

<main class="max-w-4xl mx-auto px-4 py-8">
    <div class="rounded-[32px] bg-white p-8 shadow-sm border border-slate-200">
        <div class="text-center mb-8">
            <p class="text-sm uppercase tracking-[0.3em] text-orange-500">Dashboard Pelajar</p>
            <h1 class="text-3xl font-semibold text-slate-900 mt-2">Selamat Datang</h1>
            <p class="text-slate-600 mt-2">{{ $pelajar->nama_pelajar }}</p>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700 shadow-sm mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Student Info Card -->
        <div class="bg-slate-50 rounded-2xl p-6 mb-6">
            <h3 class="font-semibold text-slate-900 mb-4">Maklumat Pelajar</h3>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-slate-500">No. IC</p>
                    <p class="font-medium">{{ $pelajar->ic_pelajar }}</p>
                </div>
                <div>
                    <p class="text-slate-500">No. Telefon</p>
                    <p class="font-medium">{{ $pelajar->no_tel ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-slate-500">Email</p>
                    <p class="font-medium">{{ $pelajar->email ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-slate-500">Program</p>
                    <p class="font-medium">{{ $pelajar->program ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Course Selection -->
        @if($pelajar->kod_kursus)
        <div class="bg-emerald-50 rounded-2xl p-6 mb-6 border border-emerald-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-emerald-900">Kursus Dipilih</h3>
                    <p class="text-emerald-700">{{ $pelajar->kod_kursus }}</p>
                </div>
                <div class="text-emerald-500">
                    <i class="fas fa-check-circle text-2xl"></i>
                </div>
            </div>
        </div>
        @else
        <div class="bg-amber-50 rounded-2xl p-6 mb-6 border border-amber-200">
            <h3 class="font-semibold text-amber-900 mb-2">Kursus Belum Dipilih</h3>
            <p class="text-amber-700 text-sm mb-4">Sila pilih kursus yang anda minati.</p>
            <a href="{{ route('pelajar.program-list', $pelajar->id) }}" class="inline-flex items-center justify-center rounded-full bg-amber-500 px-6 py-3 text-sm font-semibold text-white hover:bg-amber-600">
                Pilih Kursus
            </a>
        </div>
        @endif

        <!-- Actions -->
        <div class="flex flex-col gap-4">
            <a href="{{ route('pelajar.editbmd', $pelajar->id) }}" class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-300 bg-slate-50 px-6 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                <i class="fas fa-edit"></i> Kemaskini Maklumat Diri
            </a>

            @if($pelajar->kod_kursus)
            <a href="{{ route('pelajar.pembayaran', $pelajar->id) }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white hover:bg-orange-600">
                <i class="fas fa-credit-card"></i> Buat Pembayaran
            </a>
            @endif
        </div>
    </div>
</main>

@include('components.social-float')

@include('layouts.footer-pelajar')

</body>
</html>