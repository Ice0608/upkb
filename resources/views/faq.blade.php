<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - FAQ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .faq-page {
            position: relative;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(245, 158, 11, 0.22), transparent 24%),
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.14), transparent 26%),
                linear-gradient(180deg, #fff1db 0%, #e8efff 100%);
        }

        .faq-page::before,
        .faq-page::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .faq-page::before {
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.58), rgba(255, 255, 255, 0) 42%),
                repeating-linear-gradient(90deg, rgba(148, 163, 184, 0.04) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.18));
            opacity: 0.55;
        }

        .faq-page::after {
            inset: auto auto 3rem 50%;
            width: min(70rem, calc(100vw - 2rem));
            height: 18rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 184, 28, 0.34), rgba(255, 184, 28, 0) 66%);
            filter: blur(34px);
            opacity: 0.96;
        }

        .faq-page > * {
            position: relative;
            z-index: 1;
        }

        .faq-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.78);
            background:
                linear-gradient(90deg, #ff7300 0%, #ffd43b 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(255, 166, 0, 0.3),
                0 0 130px rgba(255, 212, 59, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .faq-hero::before {
            content: "";
            position: absolute;
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
            pointer-events: none;
            animation: faqGlowPulse 7s ease-in-out infinite;
        }

        .faq-hero::after {
            content: "";
            position: absolute;
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
            pointer-events: none;
        }

        .faq-hero-eyebrow {
            color: rgba(255, 255, 255, 0.74);
        }

        .faq-hero-title {
            color: #ffffff;
            text-shadow: 0 8px 24px rgba(15, 23, 42, 0.18);
        }

        .faq-hero-copy {
            color: rgba(255, 255, 255, 0.84);
            text-shadow: 0 4px 14px rgba(15, 23, 42, 0.12);
        }

        .faq-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.8);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.86), rgba(255, 255, 255, 0.7)),
                linear-gradient(135deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.04));
            box-shadow:
                0 18px 40px rgba(15, 23, 42, 0.08),
                0 0 28px rgba(255, 184, 28, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(14px);
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }

        .faq-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.4), transparent 28%),
                radial-gradient(circle at bottom left, rgba(251, 146, 60, 0.08), transparent 24%);
            pointer-events: none;
        }

        .faq-card:hover {
            transform: translateY(-6px) scale(1.01);
            border-color: rgba(251, 146, 60, 0.18);
            box-shadow:
                0 28px 60px rgba(15, 23, 42, 0.12),
                0 0 42px rgba(249, 115, 22, 0.16),
                0 0 70px rgba(255, 184, 28, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .faq-card:active {
            transform: translateY(-1px) scale(0.985);
        }

        .faq-icon-chip {
            position: relative;
            box-shadow:
                0 0 28px rgba(249, 115, 22, 0.18),
                0 14px 26px rgba(15, 23, 42, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
        }

        .faq-icon-chip-blue {
            box-shadow:
                0 0 28px rgba(37, 99, 235, 0.22),
                0 14px 26px rgba(15, 23, 42, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
        }

        .faq-icon-chip::after {
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

        .faq-arrow {
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .faq-card:hover .faq-arrow {
            transform: translateX(4px);
            color: #f97316;
        }

        .faq-modal-shell {
            border: 1px solid rgba(255, 255, 255, 0.78);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.94), rgba(255, 255, 255, 0.8)),
                linear-gradient(135deg, rgba(251, 146, 60, 0.06), rgba(59, 130, 246, 0.05));
            box-shadow:
                0 30px 80px rgba(15, 23, 42, 0.18),
                0 0 52px rgba(255, 184, 28, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(18px);
        }

        @keyframes faqGlowPulse {
            0%, 100% {
                opacity: 0.72;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.06);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .faq-card,
            .faq-arrow,
            #modalBox {
                transition: none;
            }

            .faq-hero::before {
                animation: none;
            }
        }
    </style>
</head>
<body class="faq-page text-gray-800">
    
    @include('layouts.navigation')

    <main class="max-w-6xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="faq-hero rounded-[2rem] px-6 py-8 sm:px-8 sm:py-10 text-center mb-14">
            <p class="faq-hero-eyebrow font-semibold tracking-[0.1em] uppercase text-xs sm:text-sm">Pusat Bantuan</p>
            <h2 class="faq-hero-title mt-4 text-4xl sm:text-5xl font-semibold tracking-[-0.04em]">Soalan Lazim (FAQ)</h2>
            <p class="faq-hero-copy mt-4 max-w-2xl mx-auto text-base sm:text-lg leading-8">
                Jawapan kepada pertanyaan yang sering diajukan oleh pelajar dan ibu bapa.
            </p>
        </div>

        <div class="max-w-5xl mx-auto grid gap-6 sm:grid-cols-2">
            <div onclick="openModal('skm')"
                class="faq-card group rounded-[1.75rem] p-6 sm:p-7 cursor-pointer">
                <div class="flex items-start gap-4">
                    <div class="faq-icon-chip bg-[linear-gradient(135deg,#f97316,#fb7185)] text-white p-3.5 rounded-2xl">
                        <i class="fa-solid fa-circle-question"></i>
                    </div>

                    <div class="flex-1">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">Pensijilan</p>
                        <h3 class="font-semibold text-slate-800 text-lg sm:text-xl mt-2 tracking-[-0.02em]">
                            Apa itu Sijil Kemahiran Malaysia (SKM)?
                        </h3>

                        <p class="text-sm text-slate-500 mt-2 leading-7">
                            Klik untuk lihat penerangan penuh
                        </p>
                    </div>

                    <span class="faq-arrow text-slate-500 text-xl mt-1">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>
            </div>

            <div onclick="openModal('tvet')"
                class="faq-card group rounded-[1.75rem] p-6 sm:p-7 cursor-pointer">
                <div class="flex items-start gap-4">
                    <div class="faq-icon-chip faq-icon-chip-blue bg-[linear-gradient(135deg,#8b5cf6,#3b82f6)] text-white p-3.5 rounded-2xl">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                    <div class="flex-1">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">Pendidikan Teknikal</p>
                        <h3 class="font-semibold text-slate-800 text-lg sm:text-xl mt-2 tracking-[-0.02em]">
                            Apa itu TVET?
                        </h3>

                        <p class="text-sm text-slate-500 mt-2 leading-7">
                            Klik untuk lihat penerangan penuh
                        </p>
                    </div>

                    <span class="faq-arrow text-slate-500 text-xl mt-1">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>
            </div>
        </div>
    </main>

    <div id="faqModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div id="modalBox" class="faq-modal-shell w-full max-w-lg rounded-[1.75rem] p-7 relative transform transition scale-95 opacity-0 mx-4">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div id="modalContent"></div>
        </div>
    </div>

    <script>
    function openModal(type) {
        const modal = document.getElementById('faqModal');
        const box = document.getElementById('modalBox');
        const content = document.getElementById('modalContent');

        let html = '';

        if (type === 'skm') {
            html = `
                <h2 class="text-xl font-bold mb-4 text-gray-800">
                    Apa itu Sijil Kemahiran Malaysia (SKM)?
                </h2>

                <ul class="list-decimal pl-5 space-y-2 text-gray-600">
                    <li><p>Sijil rasmi yang dikeluarkan oleh Jabatan Pembangunan Kemahiran (JPK), Kementerian Sumber Manusia (KSM)</p></li>
                    <li><p>Sijil ini memberi pengiktirafan kemahiran dan membuktikan individu memiliki kemampuan dan kompetensi dalam bidang tertentu</p></li>
                    <li><p>Diiktiraf oleh Kerajaan Malaysia serta diterima di dalam dan di luar negara</p></li>
                    <li><p>Pilihan baik untuk mereka yang ingin meningkatkan kemahiran</p></li>
                </ul>
            `;
        }

        if (type === 'tvet') {
            html = `
                <h2 class="text-xl font-bold mb-4 text-gray-800">
                    Apa itu TVET?
                </h2>

                <p class="text-gray-600 mb-3">
                    Pendidikan dan latihan yang bertujuan untuk menyediakan pelajar dengan kemahiran praktikal dan pengetahuan teknikal yang diperlukan untuk memasuki pasaran kerja dalam pelbagai bidang industri.
                </p>

                <p class="text-gray-600">
                    TVET meliputi pelbagai sektor seperti teknologi maklumat, kejuruteraan, perkhidmatan, kesihatan, pertanian, dan banyak lagi. Ia menekankan pembelajaran berasaskan amali dan latihan praktikal yang berorientasikan pekerjaan.
                </p>
            `;
        }

        content.innerHTML = html;
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            box.classList.remove('scale-95', 'opacity-0');
            box.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('faqModal');
        const box = document.getElementById('modalBox');

        box.classList.add('scale-95', 'opacity-0');
        box.classList.remove('scale-100', 'opacity-100');

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 200);
    }

    const modalElement = document.getElementById('faqModal');

    if (modalElement) {
        modalElement.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    }
    </script>

    @include('components.social-float')
    @include('layouts.footer')

</body>
</html>
