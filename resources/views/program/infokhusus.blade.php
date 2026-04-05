<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Info Khusus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navigation')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg overflow-hidden mb-10 text-white">
            <div class="grid md:grid-cols-[1.8fr,0.8fr] gap-6 p-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="bg-white/20 px-3 py-1 rounded-full uppercase text-xs tracking-[0.2em]">{{ $khusus->jenis_khusus }}</span>
                        <span class="bg-white/20 px-3 py-1 rounded-full uppercase text-xs tracking-[0.2em]">{{ $khusus->mod_pengajian }}</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">{{ $khusus->nama_khusus }}</h1>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-orange-100/90">
                        <div class="inline-flex items-center gap-2"><i class="fas fa-hashtag"></i> {{ $khusus->kod_khusus }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-clock"></i> {{ $khusus->tempoh }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-users"></i> Kuota {{ $khusus->kuota }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-calendar-days"></i> Daftar {{ $khusus->tarikh_pendaftaran ? $khusus->tarikh_pendaftaran->format('d M Y') : '-' }}</div>
                    </div>
                    <p class="mt-6 max-w-3xl leading-relaxed text-orange-100/90">{{ $khusus->penerangan }}</p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('institusi.show', $khusus->institusi->id) }}" class="inline-flex items-center gap-2 rounded-full bg-white text-orange-600 px-6 py-3 font-semibold shadow-lg hover:bg-white/90 transition">
                            <i class="fas fa-arrow-left"></i> Kembali ke Institusi
                        </a>
                        <a href="{{ route('khusus.pdf', $khusus->id) }}" class="inline-flex items-center gap-2 rounded-full bg-white/20 border border-white text-white px-6 py-3 font-semibold hover:bg-white/10 transition">
                            <i class="fas fa-file-pdf"></i> Simpan PDF
                        </a>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="rounded-3xl bg-white/10 p-6 border border-white/20">
                        <h2 class="text-lg font-semibold mb-3">Institusi</h2>
                        <p class="text-sm text-orange-100/90">{{ $khusus->institusi->nama_institusi }}</p>
                        <p class="text-sm text-orange-100/90">{{ $khusus->institusi->alamat }}</p>
                    </div>
                    <div class="rounded-3xl bg-white/10 p-6 border border-white/20">
                        <h2 class="text-lg font-semibold mb-3">Ringkasan</h2>
                        <p class="text-sm text-orange-100/90">{{ \Illuminate\Support\Str::limit($khusus->penerangan, 160) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100 mb-10">
            <div class="border-b border-gray-200 bg-gray-50 px-6 py-4">
                <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                    <a href="#maklumat-am" class="px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition">Maklumat Am</a>
                    <a href="#syarat-kelayakan" class="px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition">Syarat Kelayakan</a>
                    <a href="#struktur-silibus" class="px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition">Struktur Silibus</a>
                    <a href="#laluan-kerjaya" class="px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition">Laluan Kerjaya</a>
                    <a href="#yuran-pinjam" class="px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition">Yuran & Pinjaman</a>
                </div>
            </div>

            <div id="maklumat-am" class="p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Maklumat Am</h2>
                <div class="grid gap-6 md:grid-cols-3 mb-8">
                    <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                        <p class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-2">Kod Khusus</p>
                        <p class="font-semibold text-slate-900">{{ $khusus->kod_khusus }}</p>
                    </div>
                    <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                        <p class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-2">Mod Pengajian</p>
                        <p class="font-semibold text-slate-900">{{ $khusus->mod_pengajian }}</p>
                    </div>
                    <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                        <p class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-2">Tempoh</p>
                        <p class="font-semibold text-slate-900">{{ $khusus->tempoh }}</p>
                    </div>
                </div>
                <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                    <h3 class="font-semibold text-gray-800 mb-3">Penerangan Program</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $khusus->penerangan }}</p>
                </div>
            </div>

            <div id="syarat-kelayakan" class="p-8 border-t border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Syarat Kelayakan</h2>
                @if($khusus->syaratKelayakans->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($khusus->syaratKelayakans as $item)
                            <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                                <p class="text-gray-700 leading-relaxed">{{ $item->syarat_kelayakan }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="rounded-3xl border border-dashed border-gray-200 p-10 text-center text-gray-500 bg-gray-50">
                        Tiada syarat kelayakan direkodkan.
                    </div>
                @endif
            </div>

            <div id="struktur-silibus" class="p-8 border-t border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Struktur Silibus</h2>
                @if($khusus->silibuses->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($khusus->silibuses as $item)
                            <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                                <h3 class="font-semibold text-gray-800 mb-2">{{ $item->topik }}</h3>
                                <p class="text-gray-700 leading-relaxed">{{ $item->isi_kandungan }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="rounded-3xl border border-dashed border-gray-200 p-10 text-center text-gray-500 bg-gray-50">
                        Struktur silibus belum ditambah.
                    </div>
                @endif
            </div>

            <div id="laluan-kerjaya" class="p-8 border-t border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Laluan Kerjaya</h2>
                @if($khusus->kerjayas->isNotEmpty())
                    <div class="grid gap-4 md:grid-cols-2">
                        @foreach($khusus->kerjayas as $item)
                            <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                                <p class="font-semibold text-slate-900 mb-2">{{ $item->bidang_kerjaya }}</p>
                                <p class="text-gray-600 leading-relaxed">Potensi jawatan dan peluang dalam bidang ini.</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="rounded-3xl border border-dashed border-gray-200 p-10 text-center text-gray-500 bg-gray-50">
                        Laluan kerjaya belum ditambah.
                    </div>
                @endif
            </div>

            <div id="yuran-pinjam" class="p-8 border-t border-gray-100">
                <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Yuran & Pinjaman</h2>
                    <p class="text-sm text-gray-500">Semua item diambil dari rekod khusus ini.</p>
                </div>

                <div class="grid gap-6">
                    <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                        <h3 class="font-semibold text-gray-800 mb-4">Yuran Pendaftaran</h3>
                        @if($khusus->yuranPendaftarans->isNotEmpty())
                            <div class="space-y-3">
                                @foreach($khusus->yuranPendaftarans as $fee)
                                    <div class="flex items-center justify-between gap-4 bg-white border border-gray-200 rounded-2xl p-4">
                                        <p class="text-gray-700">{{ $fee->item }}</p>
                                        <p class="font-semibold text-slate-900">RM {{ number_format($fee->amount, 2) }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">Tiada yuran pendaftaran direkodkan.</p>
                        @endif
                    </div>

                    <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                        <h3 class="font-semibold text-gray-800 mb-4">Yuran Pilihan</h3>
                        @if($khusus->yuranPilihans->isNotEmpty())
                            <div class="space-y-3">
                                @foreach($khusus->yuranPilihans as $fee)
                                    <div class="flex items-center justify-between gap-4 bg-white border border-gray-200 rounded-2xl p-4">
                                        <p class="text-gray-700">{{ $fee->pilihan }} - {{ $fee->item }}</p>
                                        <p class="font-semibold text-slate-900">RM {{ number_format($fee->amount, 2) }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">Tiada yuran pilihan direkodkan.</p>
                        @endif
                    </div>

                    <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                        <h3 class="font-semibold text-gray-800 mb-4">Yuran Asrama</h3>
                        @if($khusus->yuranAsramas->isNotEmpty())
                            <div class="space-y-3">
                                @foreach($khusus->yuranAsramas as $fee)
                                    <div class="flex items-center justify-between gap-4 bg-white border border-gray-200 rounded-2xl p-4">
                                        <p class="text-gray-700">{{ $fee->item }}</p>
                                        <p class="font-semibold text-slate-900">RM {{ number_format($fee->amount, 2) }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">Tiada yuran asrama direkodkan.</p>
                        @endif
                    </div>

                    <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                        <h3 class="font-semibold text-gray-800 mb-4">Yuran Pengajian</h3>
                        @if($khusus->yuranPengajians->isNotEmpty())
                            <div class="space-y-3">
                                @foreach($khusus->yuranPengajians as $fee)
                                    <div class="grid gap-2 md:grid-cols-[1fr,auto] bg-white border border-gray-200 rounded-2xl p-4">
                                        <div>
                                            <p class="text-gray-700 font-semibold">{{ $fee->peringkat }} - {{ $fee->tempoh }}</p>
                                        </div>
                                        <p class="font-semibold text-slate-900">RM {{ number_format($fee->amount, 2) }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">Tiada yuran pengajian direkodkan.</p>
                        @endif
                    </div>

                    <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                        <h3 class="font-semibold text-gray-800 mb-4">Elaun / Bantuan Sara Hidup</h3>
                        @if($khusus->elauns->isNotEmpty())
                            <div class="space-y-3">
                                @foreach($khusus->elauns as $fee)
                                    <div class="flex items-center justify-between gap-4 bg-white border border-gray-200 rounded-2xl p-4">
                                        <div>
                                            <p class="text-gray-700 font-semibold">{{ $fee->elaun_bulanan }} / {{ $fee->tempoh }}</p>
                                        </div>
                                        <p class="font-semibold text-slate-900">RM {{ number_format($fee->jumlah, 2) }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">Tiada elaun direkodkan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.social-float')

    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/logo.jpeg') }}" class="h-12" alt="logo">
                    <div>
                        <h2 class="text-lg font-bold text-white">UPKB</h2>
                        <p class="text-sm text-gray-400">Pusat maklumat program & pengambilan</p>
                    </div>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">Bantu pelajar dan ibu bapa melihat pilihan pusat, program, kuota semasa dan maklumat penting dengan lebih jelas dalam satu tempat.</p>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4">Pautan Pantas</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <a href="{{ url('/') }}" class="hover:text-orange-400">Utama</a>
                    <a href="{{ route('program') }}" class="hover:text-orange-400">Program</a>
                    <a href="{{ route('institusi') }}" class="hover:text-orange-400">Institusi</a>
                    <a href="{{ route('faq') }}" class="hover:text-orange-400">FAQ</a>
                    <a href="{{ route('galeri') }}" class="hover:text-orange-400">Galeri</a>
                    <a href="{{ route('hubungi') }}" class="hover:text-orange-400">Hubungi</a>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4">Hubungi Kami</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li>📞 +6017 921 5543</li>
                    <li>✉️ info@upkb.my</li>
                    <li>📍 34 Jalan MPK 4 Taman Bukit Kepayang, Seremban</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700"></div>
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center text-sm">
            <p class="text-gray-400">© {{ date('Y') }} Unit Pembangunan Kemahiran Belia.</p>
        </div>
    </footer>

</body>
</html>
