<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Hubungi Kami - UPKB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .contact-page {
            background:
                radial-gradient(circle at top left, rgba(14, 165, 233, 0.16), transparent 20%),
                radial-gradient(circle at top right, rgba(168, 85, 247, 0.16), transparent 22%),
                radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.12), transparent 24%),
                linear-gradient(180deg, #eef4ff 0%, #edf2ff 48%, #f8fafc 100%);
        }

        .contact-shell {
            position: relative;
            isolation: isolate;
        }

        .contact-shell::before,
        .contact-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .contact-shell::before {
            top: 1rem;
            left: -4rem;
            width: 15rem;
            height: 15rem;
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(14, 165, 233, 0.16), rgba(14, 165, 233, 0) 64%),
                repeating-radial-gradient(circle, rgba(14, 165, 233, 0.08) 0 2px, transparent 2px 16px);
            box-shadow: 0 0 70px rgba(14, 165, 233, 0.12);
        }

        .contact-shell::after {
            right: -4rem;
            bottom: 1rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(168, 85, 247, 0.16), rgba(168, 85, 247, 0) 66%),
                repeating-radial-gradient(circle, rgba(168, 85, 247, 0.08) 0 2px, transparent 2px 18px);
            box-shadow: 0 0 80px rgba(168, 85, 247, 0.12);
        }

        .contact-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.8);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.62)),
                linear-gradient(135deg, rgba(14, 165, 233, 0.08), rgba(168, 85, 247, 0.1));
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.12),
                0 0 40px rgba(56, 189, 248, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(18px);
        }

        .contact-hero::before,
        .contact-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .contact-hero::before {
            top: -2.5rem;
            right: 8%;
            width: 11rem;
            height: 11rem;
            border-radius: 999px;
            border: 1px solid rgba(56, 189, 248, 0.24);
            box-shadow:
                0 0 0 18px rgba(56, 189, 248, 0.08),
                0 0 0 40px rgba(168, 85, 247, 0.05);
        }

        .contact-hero::after {
            left: 4%;
            bottom: -1.5rem;
            width: 8rem;
            height: 8rem;
            border-radius: 2rem;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.24), rgba(255, 255, 255, 0)),
                repeating-linear-gradient(90deg, rgba(99, 102, 241, 0.1) 0 1px, transparent 1px 18px),
                repeating-linear-gradient(180deg, rgba(99, 102, 241, 0.1) 0 1px, transparent 1px 18px);
            transform: rotate(12deg);
            opacity: 0.7;
        }

        .contact-grid {
            position: relative;
        }

        .contact-grid::before {
            content: "";
            position: absolute;
            inset: 2rem 7% auto;
            height: 18rem;
            border-radius: 2rem;
            background:
                repeating-linear-gradient(90deg, rgba(56, 189, 248, 0.08) 0 1px, transparent 1px 26px),
                repeating-linear-gradient(180deg, rgba(168, 85, 247, 0.08) 0 1px, transparent 1px 26px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45), transparent 86%);
            opacity: 0.48;
            pointer-events: none;
        }

        .contact-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.72)),
                linear-gradient(135deg, rgba(56, 189, 248, 0.06), rgba(168, 85, 247, 0.05));
            box-shadow:
                0 22px 55px rgba(15, 23, 42, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(16px);
        }

        .contact-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.42), transparent 28%),
                radial-gradient(circle at bottom left, rgba(56, 189, 248, 0.08), transparent 24%);
            pointer-events: none;
        }

        .contact-icon-chip {
            position: relative;
            box-shadow:
                0 14px 26px rgba(15, 23, 42, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
        }

        .contact-icon-chip::after {
            content: "";
            position: absolute;
            inset: auto auto -0.65rem 50%;
            width: 2.4rem;
            height: 0.85rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.1);
            filter: blur(10px);
            z-index: -1;
        }

        .contact-map-shell {
            border: 1px solid rgba(255, 255, 255, 0.76);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.82);
        }

        .contact-input {
            border: 1px solid rgba(148, 163, 184, 0.28);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.82), rgba(255, 255, 255, 0.62)),
                linear-gradient(135deg, rgba(56, 189, 248, 0.04), rgba(168, 85, 247, 0.03));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.84);
            transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        }

        .contact-input:focus {
            border-color: rgba(56, 189, 248, 0.42) !important;
            box-shadow:
                0 0 0 4px rgba(56, 189, 248, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            transform: translateY(-1px);
        }

        .contact-submit {
            box-shadow:
                0 18px 34px rgba(249, 115, 22, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.18);
            transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
        }

        .contact-submit:hover {
            transform: translateY(-2px) scale(1.01);
            box-shadow:
                0 24px 42px rgba(249, 115, 22, 0.24),
                0 0 24px rgba(249, 115, 22, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
            filter: saturate(1.05);
        }

        @media (prefers-reduced-motion: reduce) {
            .contact-input,
            .contact-submit {
                transition: none;
            }
        }
    </style>
</head>
<body class="contact-page text-gray-800">

    @include('layouts.navigation')
    
    <main class="contact-shell max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="contact-hero rounded-[2rem] px-6 py-8 sm:px-8 sm:py-10 mb-10">
            <p class="text-xs sm:text-sm font-bold uppercase tracking-[0.28em] text-orange-500">Hubungi Kami</p>
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-[-0.04em] text-slate-900 mt-3">Kami sentiasa membantu anda di sini</h1>
            <p class="text-slate-600 mt-4 text-base sm:text-lg max-w-3xl leading-8">Mempunyai sebarang pertanyaan mengenai program atau kemasukan? Pasukan kami sedia membantu anda.</p>
        </div>

        @if ($message = Session::get('success'))
            <div class="mb-6 rounded-2xl border border-green-300/70 bg-green-100/80 px-4 py-3 text-green-700 shadow-sm backdrop-blur-sm">
                <i class="fas fa-check-circle mr-2"></i>{{ $message }}
            </div>
        @endif

        <div class="contact-grid grid md:grid-cols-2 gap-8">
            <section class="contact-card rounded-[2rem] p-8">
                <div class="relative z-10 flex items-center gap-4 mb-6">
                    <div class="contact-icon-chip h-12 w-12 rounded-2xl bg-[linear-gradient(135deg,#f97316,#fb7185)] text-white flex items-center justify-center">
                        <i class="fas fa-location-dot"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Alamat Pejabat</h2>
                        <p class="text-slate-500">34 Jalan MPK 4 Taman Bukit Kepayang 70300 Seremban Negeri Sembilan</p>
                        <a href="https://www.google.com/maps/search/?api=1&query=34+Jalan+MPK+4+Taman+Bukit+Kepayang+70300+Seremban" target="_blank" class="inline-flex items-center text-sm font-semibold text-orange-500 hover:text-orange-600 mt-2">
                            <i class="fas fa-map-marker-alt mr-2"></i> Buka di Google Maps
                        </a>
                    </div>
                </div>

                <div class="contact-map-shell mb-6 rounded-2xl overflow-hidden">
                    <iframe width="100%" height="250" frameborder="0" style="border:0" loading="lazy" allowfullscreen 
                        src="https://www.google.com/maps?q=34+Jalan+MPK+4+Taman+Bukit+Kepayang+70300+Seremban&output=embed">
                    </iframe>
                </div>

                <div class="relative z-10 flex items-center gap-4 mb-6">
                    <div class="contact-icon-chip h-12 w-12 rounded-2xl bg-[linear-gradient(135deg,#3b82f6,#0ea5e9)] text-white flex items-center justify-center">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Telefon</h2>
                        <p class="text-slate-500">+6017 921 5543</p>
                        <p class="text-sm text-slate-400">Isnin - Jumaat (9:00 AM - 5:00 PM)</p>
                    </div>
                </div>

                <div class="relative z-10 flex items-center gap-4">
                    <div class="contact-icon-chip h-12 w-12 rounded-2xl bg-[linear-gradient(135deg,#8b5cf6,#6366f1)] text-white flex items-center justify-center">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Emel Rasmi</h2>
                        <p class="text-orange-500 font-semibold">info@upkb.my</p>
                    </div>
                </div>
            </section>

            <section class="contact-card rounded-[2rem] p-8">
                <div class="relative z-10">
                    <h2 class="text-2xl font-extrabold tracking-[-0.03em] text-slate-900 mb-6">Hantar Pertanyaan</h2>
                    <form action="{{ route('hubungi.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-slate-700 mb-1">Nama Penuh</label>
                            <input id="nama" name="nama" type="text" required class="contact-input w-full rounded-2xl @error('nama') border-red-500 @enderror p-3 text-slate-800 outline-none" placeholder="Nama anda" value="{{ old('nama') }}" />
                            @error('nama')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="emel" class="block text-sm font-semibold text-slate-700 mb-1">Emel</label>
                            <input id="emel" name="emel" type="email" required class="contact-input w-full rounded-2xl @error('emel') border-red-500 @enderror p-3 text-slate-800 outline-none" placeholder="email@contoh.com" value="{{ old('emel') }}" />
                            @error('emel')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="perkara" class="block text-sm font-semibold text-slate-700 mb-1">Perkara</label>
                            <input id="perkara" name="perkara" type="text" required class="contact-input w-full rounded-2xl @error('perkara') border-red-500 @enderror p-3 text-slate-800 outline-none" placeholder="Apa yang ingin anda tanya" value="{{ old('perkara') }}" />
                            @error('perkara')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="mesej" class="block text-sm font-semibold text-slate-700 mb-1">Mesej</label>
                            <textarea id="mesej" name="mesej" rows="5" required class="contact-input w-full rounded-2xl @error('mesej') border-red-500 @enderror p-3 text-slate-800 outline-none" placeholder="Tulis mesej anda di sini">{{ old('mesej') }}</textarea>
                            @error('mesej')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="contact-submit w-full bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-2xl py-3 transition">
                            <i class="fas fa-paper-plane mr-2"></i> Hantar Mesej
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>

    @include('components.social-float')
    @include('layouts.footer')

</body>
</html>
