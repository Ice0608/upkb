<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Resit Pembayaran - Temu Duga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .resit-page {
            position: relative;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(245, 158, 11, 0.22), transparent 20%),
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.14), transparent 26%),
                radial-gradient(circle at bottom center, rgba(249, 115, 22, 0.16), transparent 24%),
                linear-gradient(180deg, #fff1db 0%, #f8fafc 46%, #e8efff 100%);
        }

        .resit-page::before,
        .resit-page::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .resit-page::before {
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.52), rgba(255, 255, 255, 0) 40%),
                repeating-linear-gradient(90deg, rgba(148, 163, 184, 0.035) 0 1px, transparent 1px 120px),
                repeating-linear-gradient(180deg, rgba(148, 163, 184, 0.025) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.18));
            opacity: 0.55;
        }

        .resit-page::after {
            inset: auto auto 3rem 50%;
            width: min(76rem, calc(100vw - 2rem));
            height: 18rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 184, 28, 0.34), rgba(255, 184, 28, 0) 68%);
            filter: blur(36px);
            opacity: 0.94;
        }

        .resit-page > * {
            position: relative;
            z-index: 1;
        }

        .resit-shell {
            position: relative;
            isolation: isolate;
        }

        .resit-shell::before,
        .resit-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .resit-shell::before {
            top: 1rem;
            left: -3rem;
            width: 16rem;
            height: 16rem;
            border-radius: 2rem;
            background:
                radial-gradient(circle at 30% 30%, rgba(255, 166, 0, 0.3), rgba(255, 166, 0, 0) 56%),
                linear-gradient(145deg, rgba(255, 255, 255, 0.36), rgba(255, 255, 255, 0));
            filter: blur(10px);
            opacity: 0.9;
        }

        .resit-shell::after {
            right: -2rem;
            top: 10rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.18), rgba(37, 99, 235, 0) 70%);
            filter: blur(6px);
            opacity: 0.84;
        }

        .resit-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background: linear-gradient(90deg, #ff7300 0%, #ffd43b 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(255, 166, 0, 0.3),
                0 0 130px rgba(255, 212, 59, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .resit-hero::before,
        .resit-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .resit-hero::before {
            top: -3rem;
            right: 8%;
            width: 11rem;
            height: 11rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0) 72%);
            border: 1px solid rgba(255, 255, 255, 0.24);
            box-shadow:
                0 0 36px rgba(255, 235, 140, 0.34),
                0 0 0 18px rgba(255, 255, 255, 0.08),
                0 0 0 40px rgba(255, 255, 255, 0.04);
            animation: resitGlowPulse 7s ease-in-out infinite;
        }

        .resit-hero::after {
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
            box-shadow: 0 0 42px rgba(255, 228, 92, 0.28);
            opacity: 0.68;
        }

        .resit-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.74)),
                linear-gradient(135deg, rgba(255, 166, 0, 0.1), rgba(37, 99, 235, 0.06));
            box-shadow:
                0 22px 56px rgba(15, 23, 42, 0.1),
                0 0 34px rgba(255, 184, 28, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(16px);
        }

        .resit-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.42), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255, 184, 77, 0.08), transparent 24%);
            pointer-events: none;
        }

        .resit-info {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(255, 255, 255, 0.82));
            box-shadow:
                0 18px 42px rgba(15, 23, 42, 0.08),
                0 0 26px rgba(255, 184, 28, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.88);
        }

        .resit-info::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.44), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255, 184, 77, 0.08), transparent 24%);
            pointer-events: none;
            z-index: 0;
        }

        .resit-info > * {
            position: relative;
            z-index: 1;
        }

        .resit-btn {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .resit-btn:hover {
            transform: translateY(-2px);
        }

        .resit-print {
            box-shadow:
                0 12px 28px rgba(59, 130, 246, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.36);
        }

        .resit-email {
            box-shadow:
                0 12px 28px rgba(34, 197, 94, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.36);
        }

        .resit-next {
            box-shadow:
                0 16px 34px rgba(249, 115, 22, 0.18),
                0 0 28px rgba(255, 166, 0, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.18);
        }

        .resit-next:hover {
            box-shadow:
                0 24px 42px rgba(249, 115, 22, 0.22),
                0 0 38px rgba(255, 166, 0, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
            filter: saturate(1.04);
        }

        @keyframes resitGlowPulse {
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
            .resit-btn,
            .resit-next,
            .resit-hero::before {
                transition: none;
                animation: none;
            }
        }
    </style>
</head>
<body class="resit-page text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="resit-shell max-w-7xl mx-auto px-6 py-10">
        <div class="resit-hero rounded-3xl p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        Resit Pembayaran
                    </h1>
                    <p class="mt-3 text-lg text-orange-100">Pengesahan pembayaran untuk {{ $pelajar->nama_pelajar }}.</p>
                </div>
                <div class="w-14 h-14 rounded-full bg-white text-orange-600 flex items-center justify-center">
                    <i class="fas fa-receipt text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="resit-card rounded-3xl p-8 mb-8">
            <div class="text-center mb-8 relative z-10">
                <i class="fas fa-check-circle text-6xl text-green-500 mb-4"></i>
                <h2 class="text-2xl font-bold text-slate-900">Pembayaran Berjaya</h2>
                <p class="text-slate-600">Resit pembayaran telah dijana</p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 relative z-10">
                <div class="resit-info rounded-3xl p-6">
                    <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <i class="fas fa-credit-card text-orange-500"></i>Maklumat Pembayaran
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Kaedah:</span>
                            <span class="text-slate-900 font-semibold">{{ ucfirst($pembayaran->kaedah) }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Jumlah:</span>
                            <span class="text-slate-900 font-bold text-lg">RM {{ number_format($pembayaran->jumlah, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Tarikh:</span>
                            <span class="text-slate-900 font-semibold">{{ $pembayaran->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600 font-medium">Status:</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold 
                                @if($pembayaran->status == 'paid') bg-green-100 text-green-700 
                                @elseif($pembayaran->status == 'pending') bg-yellow-100 text-yellow-700 
                                @else bg-red-100 text-red-700 @endif">
                                {{ ucfirst($pembayaran->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="resit-info rounded-3xl p-6">
                    <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <i class="fas fa-user text-orange-500"></i>Maklumat Pelajar
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Nama:</span>
                            <span class="text-slate-900 font-semibold">{{ $pelajar->nama_pelajar }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">IC:</span>
                            <span class="text-slate-900 font-semibold">{{ $pelajar->ic_pelajar }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600 font-medium">Email:</span>
                            <span class="text-slate-900 font-semibold">{{ $pelajar->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button onclick="window.print()" 
                    class="resit-btn resit-print inline-flex items-center justify-center gap-2 rounded-2xl bg-blue-500 px-8 py-4 text-sm font-semibold text-white shadow-lg hover:bg-blue-600">
                <i class="fas fa-print"></i> Print Resit
            </button>
            <button onclick="window.location.href='mailto:?subject=Resit Pembayaran&body=Resit pembayaran untuk {{ $pelajar->nama_pelajar }}'" 
                    class="resit-btn resit-email inline-flex items-center justify-center gap-2 rounded-2xl bg-green-500 px-8 py-4 text-sm font-semibold text-white shadow-lg hover:bg-green-600">
                <i class="fas fa-envelope"></i> Email Resit
            </button>
            <a href="{{ route('staff.temuduga.surat-tawaran', $pelajar->id) }}" 
               class="resit-btn resit-next inline-flex items-center justify-center gap-2 rounded-2xl bg-orange-500 px-8 py-4 text-sm font-semibold text-white shadow-lg hover:bg-orange-600">
                Seterusnya <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>
</html>