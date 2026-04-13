<div class="social-float fixed right-4 bottom-6 z-50 flex flex-col items-end gap-3" style="position: fixed !important; right: 1rem !important; bottom: 1.5rem !important; z-index: 9999 !important;">

    {{-- 🔹 SOCIAL HOVER --}}
    <div class="group relative">

        {{-- MAIN BUTTON --}}
        <div class="w-14 h-14 bg-gray-700 text-white rounded-full flex items-center justify-center shadow-lg cursor-pointer">
            <i class="fa-solid fa-share-nodes"></i>
        </div>

        {{-- HOVER MENU (KELUAR KE KIRI) --}}
        <div class="absolute right-16 top-1/2 -translate-y-1/2 flex flex-col gap-3 opacity-0 translate-x-5 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300">

            <a href="https://www.facebook.com/smarteducationsocietyofficial" target="_blank"
               class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white shadow hover:scale-110 transition">
                <i class="fab fa-facebook-f"></i>
            </a>

            <a href="https://www.instagram.com/smartedusocietyofficial" target="_blank"
               class="w-12 h-12 bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 rounded-full flex items-center justify-center text-white shadow hover:scale-110 transition">
                <i class="fab fa-instagram"></i>
            </a>

            <a href="https://www.tiktok.com/@smartedusocietyofficial" target="_blank"
               class="w-12 h-12 bg-black rounded-full flex items-center justify-center text-white shadow hover:scale-110 transition">
                <i class="fab fa-tiktok"></i>
            </a>

            <a href="https://www.youtube.com/@SMARTEDUCATIONSOCIETY" target="_blank"
               class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white shadow hover:scale-110 transition">
                <i class="fab fa-youtube"></i>
            </a>

        </div>
    </div>

    {{-- 🔹 CALL --}}
    <a href="tel:+60179215543"
       class="w-14 h-14 bg-green-500 text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition">
        <i class="fa-solid fa-phone"></i>
    </a>

    {{-- 🔹 SUPPORT --}}
    <button onclick="toggleModal()"
        class="w-14 h-14 bg-purple-600 text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition">
        <i class="fa-solid fa-headset"></i>
    </button>

</div>

{{-- 🔥 MODAL --}}
<div id="supportModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden animate-fadeIn">

        {{-- HEADER --}}
        <div class="bg-purple-600 text-white px-5 py-4 flex justify-between items-center">
            <h2 class="font-semibold text-lg">Support</h2>
            <button onclick="toggleModal()">✕</button>
        </div>

        {{-- SUCCESS --}}
        <div id="successMsg" class="hidden bg-green-100 text-green-700 text-sm px-4 py-2">
            ✅ Message sent (UI only)
        </div>

        {{-- FORM --}}
        <form onsubmit="submitForm(event)" class="p-5 space-y-4">

            <input id="name" type="text" placeholder="Name"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500 outline-none">

            <input id="phone" type="text" placeholder="Phone"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500 outline-none">

            <textarea id="message" rows="3"
                placeholder="Your message..."
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500 outline-none"></textarea>

            <button class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700">
                Submit
            </button>

        </form>

    </div>
</div>

{{-- 🔹 SCRIPT --}}
<script>
function toggleModal() {
    document.getElementById('supportModal').classList.toggle('hidden');
}

function submitForm(e) {
    e.preventDefault();

    let name = document.getElementById('name').value;
    let phone = document.getElementById('phone').value;
    let message = document.getElementById('message').value;

    if (!name || !phone || !message) {
        alert("Please fill all fields!");
        return;
    }

    document.getElementById('successMsg').classList.remove('hidden');
    e.target.reset();

    setTimeout(() => {
        document.getElementById('successMsg').classList.add('hidden');
    }, 3000);
}
</script>