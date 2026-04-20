<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Dashboard Pelajar - UPKB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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