<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Permohonan Selesai</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800">
@include('layouts.navpelajar')

<main class="max-w-2xl mx-auto px-4 py-16">
    <div class="rounded-[32px] bg-white p-8 shadow-sm border border-slate-200 text-center">
        <div class="mb-6">
            <div class="mx-auto w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center">
                <i class="fas fa-check-circle text-4xl text-emerald-500"></i>
            </div>
        </div>

        <h1 class="text-3xl font-semibold text-slate-900 mb-4">TAHNIAH! PENDAFTARAN ANDA SUDAH SELESAI</h1>
        <p class="text-slate-600 mb-8">
            Terima kasih telah melengkapkan proses temu duga. Status pembayaran anda telah dikemaskini kepada <strong>Pending</strong>.
        </p>

        <div class="bg-slate-50 rounded-2xl p-6 mb-8 text-left">
            <h3 class="font-semibold text-slate-900 mb-4">Maklumat Pelajar:</h3>
            <div class="space-y-2 text-sm">
                <p><span class="text-slate-500">Nama:</span> <span class="font-medium">{{ $pelajar->nama_pelajar }}</span></p>
                <p><span class="text-slate-500">No. K/P:</span> <span class="font-medium">{{ $pelajar->ic_pelajar }}</span></p>
                @if($pelajar->kod_kursus)
                <p><span class="text-slate-500">Kursus:</span> <span class="font-medium">{{ $pelajar->kod_kursus }}</span></p>
                @endif
            </div>
        </div>

        <a href="{{ url('/') }}" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-8 py-3 text-sm font-semibold text-white transition hover:bg-orange-600">
            Kembali ke Laman Utama
        </a>
    </div>
</main>

@include('components.social-float')

@include('layouts.footer-pelajar')

</body>
</html>
