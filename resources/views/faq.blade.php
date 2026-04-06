<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    
@include('layouts.navigation')
\
    <!-- Title -->
        <div class="text-center mb-14">
            <p class="text-gray-500 font-semibold tracking-wide">PUSAT BANTUAN</p>
            <h2 class="text-4xl font-bold text-gray-800">Soalan Lazim (FAQ)</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">
                Jawapan kepada pertanyaan yang sering diajukan oleh pelajar dan ibu bapa.
            </p>
        </div>

        <!-- Grid -->
        <div class="max-w-5xl mx-auto grid gap-8 sm:grid-cols-2">

            <!-- CARD 1 -->
            <div onclick="openModal('skm')"
                class="group bg-white rounded-2xl p-6 shadow hover:shadow-lg cursor-pointer transition hover:-translate-y-1 border">

                <div class="flex items-start gap-4">

                    <!-- Icon -->
                    <div class="bg-gray-200 text-gray-600 p-3 rounded-xl">
                        ❓
                    </div>

                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 text-lg">
                            Apa itu Sijil Kemahiran Malaysia (SKM)?
                        </h3>

                        <p class="text-sm text-gray-500 mt-2">
                            Klik untuk lihat penerangan penuh
                        </p>
                    </div>

                    <span class="text-gray-500 text-xl group-hover:translate-x-1 transition">
                        →
                    </span>

                </div>
            </div>

            <!-- CARD 2 -->
            <div onclick="openModal('tvet')"
                class="group bg-white rounded-2xl p-6 shadow hover:shadow-lg cursor-pointer transition hover:-translate-y-1 border">

                <div class="flex items-start gap-4">

                    <div class="bg-gray-200 text-gray-600 p-3 rounded-xl">
                        📘
                    </div>

                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 text-lg">
                            Apa itu TVET?
                        </h3>

                        <p class="text-sm text-gray-500 mt-2">
                            Klik untuk lihat penerangan penuh
                        </p>
                    </div>

                    <span class="text-gray-500 text-xl group-hover:translate-x-1 transition">
                        →
                    </span>

                </div>
            </div>

        </div>

    </div>

    <!-- MODAL -->
    <div id="faqModal"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

        <div id="modalBox"
            class="bg-white w-full max-w-lg rounded-2xl p-6 relative shadow-xl transform transition scale-95 opacity-0">

            <!-- Close -->
            <button onclick="closeModal()"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 text-xl">
                ✕
            </button>

            <!-- Content -->
            <div id="modalContent"></div>

        </div>
    </div>

    <!-- SCRIPT -->
    <script>
    function openModal(type) {
        const modal = document.getElementById("faqModal");
        const box = document.getElementById("modalBox");
        const content = document.getElementById("modalContent");

        let html = "";

        if (type === "skm") {
            html = `
                <h2 class="text-xl font-bold mb-4 text-gray-800">
                    Apa itu Sijil Kemahiran Malaysia (SKM)?
                </h2>

                <ul class="list-decimal pl-5 space-y-2 text-gray-600">
                    <li>Sijil rasmi yang dikeluarkan oleh Jabatan Pembangunan Kemahiran (JPK), Kementerian Sumber Manusia (KSM)</li>
                    <li>Sijil ini memberi pengiktirafan kemahiran dan membuktikan individu memiliki kemampuan dan kompetensi dalam bidang tertentu</li>
                    <li>Diiktiraf oleh Kerajaan Malaysia serta diterima didalam dan diluar negara</li>
                    <li>Pilihan baik untuk mereka yang ingin meningkatkan kemahiran</li>
                </ul>
            `;
        }

        if (type === "tvet") {
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

        modal.classList.remove("hidden");
        modal.classList.add("flex");

        setTimeout(() => {
            box.classList.remove("scale-95", "opacity-0");
            box.classList.add("scale-100", "opacity-100");
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById("faqModal");
        const box = document.getElementById("modalBox");

        box.classList.add("scale-95", "opacity-0");
        box.classList.remove("scale-100", "opacity-100");

        setTimeout(() => {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        }, 200);
    }

    // close bila klik luar
    const modalElement = document.getElementById("faqModal");

    if (modalElement) {
        modalElement.addEventListener("click", function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    }
    </script>

    {{-- 🔹 FOOTER --}}
    <footer class="bg-gray-900 text-gray-300 mt-16">

    <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-10">

        {{-- LEFT --}}
        <div>
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ asset('images/logo.jpeg') }}" class="h-12">
                <div>
                    <h2 class="text-lg font-bold text-white">UPKB</h2>
                    <p class="text-sm text-gray-400">Pusat maklumat program & pengambilan</p>
                </div>
            </div>

            <p class="text-sm text-gray-400 leading-relaxed">
                Bantu pelajar dan ibu bapa melihat pilihan pusat, program, kuota semasa dan maklumat penting dengan lebih jelas dalam satu tempat.
            </p>
        </div>

        {{-- MIDDLE --}}
        <div>
            <h3 class="font-semibold text-white mb-4">Pautan Pantas</h3>

            <div class="grid grid-cols-2 gap-2 text-sm">
                <a href="/" class="hover:text-orange-400">Utama</a>
                <a href="views/program/welcome.blade.php" class="hover:text-orange-400">Program</a>
                <a href="/program-berkuota" class="hover:text-orange-400">Program Berkuota</a>
                <a href="/faq" class="hover:text-orange-400">Soalan Lazim</a>
                <a href="/galeri" class="hover:text-orange-400">Galeri</a>
                <a href="/hubungi" class="hover:text-orange-400">Hubungi Kami</a>
            </div>
        </div>

        {{-- RIGHT --}}
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
        <p class="text-gray-400">
            © {{ date('Y') }} Unit Pembangunan Kemahiran Belia.
        </p>
    </div>

</footer>

</body>