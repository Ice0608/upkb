<div class="fixed right-4 top-1/2 -translate-y-1/2 z-50 flex flex-col items-end gap-3">
    <button onclick="toggleSocial()" class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-600 text-white shadow-lg hover:scale-110 transition">🔗</button>

    <div id="socialMenu" class="flex flex-col gap-3 max-h-0 overflow-hidden transition-all duration-500">
        <a href="https://facebook.com" target="_blank" class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-600 text-white shadow-lg hover:scale-110 transition">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://instagram.com" target="_blank" class="w-12 h-12 flex items-center justify-center rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 text-white shadow-lg hover:scale-110 transition">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://tiktok.com" target="_blank" class="w-12 h-12 flex items-center justify-center rounded-full bg-black text-white shadow-lg hover:scale-110 transition">
            <i class="fab fa-tiktok"></i>
        </a>
        <a href="https://youtube.com" target="_blank" class="w-12 h-12 flex items-center justify-center rounded-full bg-red-600 text-white shadow-lg hover:scale-110 transition">
            <i class="fab fa-youtube"></i>
        </a>
    </div>

    <a href="tel:+60179215543" class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-700 text-white shadow-lg hover:scale-110 transition">📞</a>

    <button onclick="openSupport()" class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-500 text-white shadow-lg hover:scale-110 transition">🎧</button>
</div>

<script>
function toggleSocial() {
    const menu = document.getElementById('socialMenu');
    if (!menu) return;

    if (menu.classList.contains('max-h-0')) {
        menu.classList.remove('max-h-0');
        menu.classList.add('max-h-96');
    } else {
        menu.classList.remove('max-h-96');
        menu.classList.add('max-h-0');
    }
}

function openSupport() {
    window.location.href = 'mailto:info@upkb.my?subject=Support Request';
}
</script>