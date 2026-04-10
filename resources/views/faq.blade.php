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
            background:
                radial-gradient(circle at top left, rgba(251, 191, 36, 0.12), transparent 24%),
                radial-gradient(circle at top right, rgba(59, 130, 246, 0.1), transparent 26%),
                linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%);
        }

        .faq-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.78);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.82), rgba(255, 255, 255, 0.66)),
                linear-gradient(135deg, rgba(251, 146, 60, 0.06), rgba(59, 130, 246, 0.08));
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.84);
            backdrop-filter: blur(18px);
        }

        .faq-hero::before {
            content: "";
            position: absolute;
            inset: auto -8% -40% auto;
            width: 16rem;
            height: 16rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(249, 115, 22, 0.14), rgba(249, 115, 22, 0));
            pointer-events: none;
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
                0 0 30px rgba(249, 115, 22, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .faq-card:active {
            transform: translateY(-1px) scale(0.985);
        }

        .faq-icon-chip {
            position: relative;
            box-shadow:
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

        /* PS3 XMB-style modal */
        .faq-modal-shell {
            position: relative;
            border: 1.5px solid rgba(255, 183, 77, 0.85);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.96), rgba(255, 236, 179, 0.92)),
                linear-gradient(135deg, rgba(255, 183, 77, 0.10), rgba(255, 152, 0, 0.08));
            box-shadow:
                0 18px 60px 0 rgba(255, 152, 0, 0.18),
                0 0 40px 0 #ff980044,
                0 2px 8px 0 #fff2,
                inset 0 1px 0 rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(18px) saturate(1.2);
            animation: xmbModalFloat 3.5s ease-in-out infinite alternate;
            transition: box-shadow 0.5s cubic-bezier(.77,0,.18,1), border-color 0.5s cubic-bezier(.77,0,.18,1), background 0.5s cubic-bezier(.77,0,.18,1);
        }
        .faq-modal-shell:focus-within, .faq-modal-shell:active {
            box-shadow:
                0 28px 80px 0 #ff980055,
                0 0 60px 0 #ff980088,
                0 2px 8px 0 #fff2,
                inset 0 1px 0 rgba(255, 255, 255, 0.96);
            border-color: #ff9800cc;
        }
        @keyframes xmbModalFloat {
            0% { transform: scale(1) translateY(0); }
            50% { transform: scale(1.025) translateY(-10px); }
            100% { transform: scale(1) translateY(0); }
        }
        .faq-modal-shell h2 {
            color: #ff9800;
            text-shadow: 0 2px 12px #ff980044;
        }
        .faq-modal-shell ul, .faq-modal-shell p, .faq-modal-shell li {
            color: #111;
        }
        .faq-modal-shell button {
            transition: color 0.3s cubic-bezier(.77,0,.18,1), background 0.3s cubic-bezier(.77,0,.18,1);
        }
        .faq-modal-shell button:hover {
            color: #ff9800;
            background: #fff3e0;
        }

        @media (prefers-reduced-motion: reduce) {
            .faq-card,
            .faq-arrow,
            #modalBox {
                transition: none;
            }
        }
    </style>
</head>

<body class="text-gray-800" style="overflow-x:hidden;">
    <div class="xmb-bg">
        <div class="wave"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
    </div>

    @include('layouts.navigation')

    <main class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="faq-hero rounded-[2rem] px-6 py-8 sm:px-8 sm:py-10 text-center mb-14" style="background:rgba(255,255,255,0.13);backdrop-filter:blur(8px);box-shadow:0 8px 32px 0 rgba(31,38,135,0.18);">
            <p class="text-slate-500 font-semibold tracking-[0.28em] uppercase text-xs sm:text-sm">Pusat Bantuan</p>
            <h2 class="mt-4 text-4xl sm:text-5xl font-semibold tracking-[-0.04em] text-slate-800">Soalan Lazim (FAQ)</h2>
            <p class="text-slate-500 mt-4 max-w-2xl mx-auto text-base sm:text-lg leading-8">
                Jawapan kepada pertanyaan yang sering diajukan oleh pelajar dan ibu bapa.
            </p>
        </div>

        <div class="flex items-center justify-center gap-2 mb-6">
            <button id="xmbLeft" aria-label="Kiri" class="xmb-nav-arrow rounded-full bg-white/30 hover:bg-white/60 shadow p-3 text-2xl text-slate-700 transition-all duration-300 focus:outline-none">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="xmb-row" id="xmbRow">
            <div tabindex="0" data-xmb="skm" onclick="openModal('skm')" class="xmb-card group p-7 cursor-pointer" aria-label="SKM">
                <div class="flex items-start gap-4">
                    <div class="faq-icon-chip bg-[linear-gradient(135deg,#f97316,#fb7185)] text-white p-3.5 rounded-2xl">
                        <i class="fa-solid fa-circle-question"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Pensijilan</p>
                        <h3 class="faq-card-title mt-2">Apa itu Sijil Kemahiran Malaysia (SKM)?</h3>
                        <p class="text-sm text-slate-500 mt-2 leading-7">Klik untuk lihat penerangan penuh</p>
                    </div>
                    <span class="faq-arrow text-slate-500 text-xl mt-1">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>
            </div>
            <div tabindex="0" data-xmb="tvet" onclick="openModal('tvet')" class="xmb-card group p-7 cursor-pointer" aria-label="TVET">
                <div class="flex items-start gap-4">
                    <div class="faq-icon-chip bg-[linear-gradient(135deg,#8b5cf6,#3b82f6)] text-white p-3.5 rounded-2xl">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Pendidikan Teknikal</p>
                        <h3 class="faq-card-title mt-2">Apa itu TVET?</h3>
                        <p class="text-sm text-slate-500 mt-2 leading-7">Klik untuk lihat penerangan penuh</p>
                    </div>
                    <span class="faq-arrow text-slate-500 text-xl mt-1">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>
            </div>
            </div>
            <button id="xmbRight" aria-label="Kanan" class="xmb-nav-arrow rounded-full bg-white/30 hover:bg-white/60 shadow p-3 text-2xl text-slate-700 transition-all duration-300 focus:outline-none">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
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
    // Modal logic (unchanged)
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
                    <li>Sijil rasmi yang dikeluarkan oleh Jabatan Pembangunan Kemahiran (JPK), Kementerian Sumber Manusia (KSM)</li>
                    <li>Sijil ini memberi pengiktirafan kemahiran dan membuktikan individu memiliki kemampuan dan kompetensi dalam bidang tertentu</li>
                    <li>Diiktiraf oleh Kerajaan Malaysia serta diterima di dalam dan di luar negara</li>
                    <li>Pilihan baik untuk mereka yang ingin meningkatkan kemahiran</li>
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

    // XMB navigation logic
    const xmbRow = document.getElementById('xmbRow');
    const xmbCards = Array.from(xmbRow.querySelectorAll('.xmb-card'));
    let xmbIndex = 0;
    function updateXMBFocus(idx) {
        xmbCards.forEach((card, i) => {
            card.classList.remove('xmb-focused', 'xmb-blur');
            if (i === idx) {
                card.classList.add('xmb-focused');
                card.focus();
                card.setAttribute('aria-selected', 'true');
            } else {
                card.classList.add('xmb-blur');
                card.setAttribute('aria-selected', 'false');
            }
        });
        // Scroll into view
        xmbCards[idx].scrollIntoView({behavior:'smooth',inline:'center',block:'nearest'});
    }
    updateXMBFocus(xmbIndex);
    xmbRow.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight') {
            xmbIndex = (xmbIndex + 1) % xmbCards.length;
            updateXMBFocus(xmbIndex);
            e.preventDefault();
        } else if (e.key === 'ArrowLeft') {
            xmbIndex = (xmbIndex - 1 + xmbCards.length) % xmbCards.length;
            updateXMBFocus(xmbIndex);
            e.preventDefault();
        } else if (e.key === 'Enter' || e.key === ' ') {
            xmbCards[xmbIndex].click();
            e.preventDefault();
        }
    });
    // Allow tab focus
    xmbCards.forEach((card, i) => {
        card.addEventListener('focus', () => {
            xmbIndex = i;
            updateXMBFocus(xmbIndex);
        });
    });
    // Set row to be focusable for keyboard nav
    xmbRow.setAttribute('tabindex', '0');
    xmbRow.focus();

    // Navigation arrow buttons
    document.getElementById('xmbLeft').addEventListener('click', function() {
        xmbIndex = (xmbIndex - 1 + xmbCards.length) % xmbCards.length;
        updateXMBFocus(xmbIndex);
    });
    document.getElementById('xmbRight').addEventListener('click', function() {
        xmbIndex = (xmbIndex + 1) % xmbCards.length;
        updateXMBFocus(xmbIndex);
    });
    </script>

    @include('components.social-float')
    @include('layouts.footer')

</body>
</html>
