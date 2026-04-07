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
    
    {{-- 🔹 NAVIGATION --}}
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

    {{-- 🔹 SOCIAL FLOAT --}}
    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>