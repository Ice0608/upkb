<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Surat Tawaran - Temu Duga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .surat-page {
            position: relative;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(34, 197, 94, 0.22), transparent 20%),
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.14), transparent 26%),
                radial-gradient(circle at bottom center, rgba(249, 115, 22, 0.16), transparent 24%),
                linear-gradient(180deg, #f0fdf4 0%, #f8fafc 46%, #e8efff 100%);
        }

        .surat-page::before,
        .surat-page::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .surat-page::before {
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.52), rgba(255, 255, 255, 0) 40%),
                repeating-linear-gradient(90deg, rgba(148, 163, 184, 0.035) 0 1px, transparent 1px 120px),
                repeating-linear-gradient(180deg, rgba(148, 163, 184, 0.025) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.18));
            opacity: 0.55;
        }

        .surat-page::after {
            inset: auto auto 3rem 50%;
            width: min(76rem, calc(100vw - 2rem));
            height: 18rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.34), rgba(34, 197, 94, 0) 68%);
            filter: blur(36px);
            opacity: 0.94;
        }

        .surat-page > * {
            position: relative;
            z-index: 1;
        }

        .surat-shell {
            position: relative;
            isolation: isolate;
        }

        .surat-shell::before,
        .surat-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .surat-shell::before {
            top: 1rem;
            left: -3rem;
            width: 16rem;
            height: 16rem;
            border-radius: 2rem;
            background:
                radial-gradient(circle at 30% 30%, rgba(34, 197, 94, 0.3), rgba(34, 197, 94, 0) 56%),
                linear-gradient(145deg, rgba(255, 255, 255, 0.36), rgba(255, 255, 255, 0));
            filter: blur(10px);
            opacity: 0.9;
        }

        .surat-shell::after {
            right: -2rem;
            top: 10rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.18), rgba(37, 99, 235, 0) 70%);
            filter: blur(6px);
            opacity: 0.84;
        }

        .surat-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background: linear-gradient(90deg, #22c55e 0%, #16a34a 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(34, 197, 94, 0.3),
                0 0 130px rgba(74, 222, 128, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .surat-hero::before,
        .surat-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .surat-hero::before {
            top: -3rem;
            right: 8%;
            width: 11rem;
            height: 11rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0) 72%);
            border: 1px solid rgba(255, 255, 255, 0.24);
            box-shadow:
                0 0 36px rgba(187, 247, 208, 0.34),
                0 0 0 18px rgba(255, 255, 255, 0.08),
                0 0 0 40px rgba(255, 255, 255, 0.04);
            animation: suratGlowPulse 7s ease-in-out infinite;
        }

        .surat-hero::after {
            left: 4%;
            bottom: -1.5rem;
            width: 8rem;
            height: 8rem;
            border-radius: 2rem;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0)),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 18px),
                repeating-linear-gradient(180deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 18px);
            transform: rotate(12deg);
            box-shadow: 0 0 42px rgba(187, 247, 208, 0.28);
            opacity: 0.68;
        }

        .surat-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.74)),
                linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(37, 99, 235, 0.06));
            box-shadow:
                0 22px 56px rgba(15, 23, 42, 0.1),
                0 0 34px rgba(34, 197, 94, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(16px);
        }

        .surat-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.42), transparent 28%),
                radial-gradient(circle at bottom left, rgba(74, 222, 128, 0.08), transparent 24%);
            pointer-events: none;
        }

        .surat-info {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(255, 255, 255, 0.82));
            box-shadow:
                0 18px 42px rgba(15, 23, 42, 0.08),
                0 0 26px rgba(34, 197, 94, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.88);
        }

        .surat-info::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.44), transparent 28%),
                radial-gradient(circle at bottom left, rgba(74, 222, 128, 0.08), transparent 24%);
            pointer-events: none;
            z-index: 0;
        }

        .surat-info > * {
            position: relative;
            z-index: 1;
        }

        .surat-btn {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .surat-btn:hover {
            transform: translateY(-2px);
        }

        .surat-download {
            box-shadow:
                0 12px 28px rgba(59, 130, 246, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.36);
        }

        .surat-email {
            box-shadow:
                0 12px 28px rgba(34, 197, 94, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.36);
        }

        .surat-next {
            box-shadow:
                0 16px 34px rgba(249, 115, 22, 0.18),
                0 0 28px rgba(255, 166, 0, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.18);
        }

        .surat-next:hover {
            box-shadow:
                0 24px 42px rgba(249, 115, 22, 0.22),
                0 0 38px rgba(255, 166, 0, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
            filter: saturate(1.04);
        }

        .surat-message {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.74)),
                linear-gradient(135deg, rgba(34, 197, 94, 0.08), rgba(37, 99, 235, 0.04));
            box-shadow:
                0 18px 42px rgba(15, 23, 42, 0.08),
                0 0 26px rgba(34, 197, 94, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.88);
        }

        .surat-message::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.44), transparent 28%),
                radial-gradient(circle at bottom left, rgba(74, 222, 128, 0.08), transparent 24%);
            pointer-events: none;
            z-index: 0;
        }

        .surat-message > * {
            position: relative;
            z-index: 1;
        }

        @keyframes suratGlowPulse {
            0%, 100% {
                opacity: 0.72;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .surat-btn,
            .surat-next,
            .surat-hero::before {
                transition: none;
                animation: none;
            }
        }
    </style>
</head>
<body class="surat-page text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="surat-shell max-w-7xl mx-auto px-6 py-10">
        <div class="surat-hero rounded-3xl p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        Surat Tawaran
                    </h1>
                    <p class="mt-3 text-lg text-green-100">Pengesahan tawaran untuk {{ $pelajar->nama_pelajar }}.</p>
                </div>
                <div class="w-14 h-14 rounded-full bg-white text-green-600 flex items-center justify-center">
                    <i class="fas fa-file-contract text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="surat-card rounded-3xl p-8 mb-8">
            @if($hasSurat)
                <div class="text-center mb-8 relative z-10">
                    <i class="fas fa-check-circle text-6xl text-green-500 mb-4"></i>
                    <h2 class="text-2xl font-bold text-slate-900">Surat Tawaran Dijana</h2>
                    <p class="text-slate-600">Surat tawaran telah berjaya dijana dan sedia untuk dimuat turun</p>
                </div>

                <div class="surat-info rounded-3xl p-6 mb-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <i class="fas fa-info-circle text-green-500"></i>Maklumat Surat Tawaran
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Nama Pelajar:</span>
                            <span class="text-slate-900 font-semibold">{{ $pelajar->nama_pelajar }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">IC:</span>
                            <span class="text-slate-900 font-semibold">{{ $pelajar->ic_pelajar }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600 font-medium">Tarikh Dijana:</span>
                            <span class="text-slate-900 font-semibold">{{ now()->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center relative z-10">
                    <a href="{{ route('staff.temuduga.download-surat', $pelajar->id) }}" 
                       class="surat-btn surat-download inline-flex items-center justify-center gap-2 rounded-2xl bg-blue-500 px-8 py-4 text-sm font-semibold text-white shadow-lg hover:bg-blue-600">
                        <i class="fas fa-download"></i> Muat Turun Surat Tawaran
                    </a>
                    <button onclick="window.location.href='mailto:?subject=Surat Tawaran&body=Surat tawaran untuk {{ $pelajar->nama_pelajar }}'" 
                            class="surat-btn surat-email inline-flex items-center justify-center gap-2 rounded-2xl bg-green-500 px-8 py-4 text-sm font-semibold text-white shadow-lg hover:bg-green-600">
                        <i class="fas fa-envelope"></i> Hantar Email
                    </button>
                    <form method="POST" action="{{ route('staff.temuduga.complete', $pelajar->id) }}" class="inline">
                        @csrf
                        <button type="submit" class="surat-btn surat-next inline-flex items-center justify-center gap-2 rounded-2xl bg-orange-500 px-8 py-4 text-sm font-semibold text-white shadow-lg hover:bg-orange-600">
                            Selesai <i class="fas fa-check"></i>
                        </button>
                    </form>
                </div>
            @else
                <div class="text-center mb-8 relative z-10">
                    <i class="fas fa-clock text-6xl text-orange-500 mb-4"></i>
                    <h2 class="text-2xl font-bold text-slate-900">Surat Tawaran Dalam Proses</h2>
                    <p class="text-slate-600">Surat tawaran akan diberikan oleh institusi tersebut melalui E-mail</p>
                </div>

                <div class="surat-message rounded-3xl p-6 mb-8">
                    <div class="text-center">
                        <i class="fas fa-envelope-open-text text-4xl text-green-500 mb-4"></i>
                        <p class="text-lg text-slate-700 font-medium">Surat Tawaran akan diberikan oleh institusi tersebut melalui E-mail.</p>
                        <p class="text-slate-600 mt-2">Sila semak e-mel anda secara berkala untuk menerima surat tawaran rasmi.</p>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="flex justify-center relative z-10">
                    <form method="POST" action="{{ route('staff.temuduga.complete', $pelajar->id) }}" class="inline">
                        @csrf
                        <button type="submit" class="surat-btn surat-next inline-flex items-center justify-center gap-2 rounded-2xl bg-orange-500 px-8 py-4 text-sm font-semibold text-white shadow-lg hover:bg-orange-600">
                            Selesai <i class="fas fa-check"></i>
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>
</html>