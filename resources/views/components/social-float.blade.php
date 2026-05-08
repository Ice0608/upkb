<div
    class="social-float fixed z-[9999] flex flex-col items-end gap-3"
    data-social-float
    style="right: max(1rem, env(safe-area-inset-right)); bottom: calc(env(safe-area-inset-bottom) + 1.5rem);"
>
    <div class="relative">
        <button
            type="button"
            class="flex h-14 w-14 items-center justify-center rounded-full bg-slate-700 text-white shadow-lg transition hover:scale-105 focus:outline-none focus:ring-4 focus:ring-slate-400/30"
            data-social-toggle
            aria-label="Buka pautan sosial"
            aria-expanded="false"
        >
            <i class="fa-solid fa-share-nodes"></i>
        </button>

        <div
            class="social-float-menu pointer-events-none absolute right-16 top-1/2 flex -translate-y-1/2 translate-x-4 flex-col gap-3 opacity-0 transition duration-300"
            data-social-menu
        >
            <a href="https://www.facebook.com/smarteducationsocietyofficial" target="_blank" rel="noopener" class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-white shadow transition hover:scale-110" aria-label="Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>

            <a href="https://www.instagram.com/smartedusocietyofficial" target="_blank" rel="noopener" class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 text-white shadow transition hover:scale-110" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>

            <a href="https://www.tiktok.com/@smartedusocietyofficial" target="_blank" rel="noopener" class="flex h-12 w-12 items-center justify-center rounded-full bg-black text-white shadow transition hover:scale-110" aria-label="TikTok">
                <i class="fab fa-tiktok"></i>
            </a>

            <a href="https://www.youtube.com/@SMARTEDUCATIONSOCIETY" target="_blank" rel="noopener" class="flex h-12 w-12 items-center justify-center rounded-full bg-red-600 text-white shadow transition hover:scale-110" aria-label="YouTube">
                <i class="fab fa-youtube"></i>
            </a>
        </div>
    </div>

    <a href="tel:+60179215543" class="flex h-14 w-14 items-center justify-center rounded-full bg-green-500 text-white shadow-lg transition hover:scale-105" aria-label="Hubungi SES">
        <i class="fa-solid fa-phone"></i>
    </a>

    <button
        type="button"
        onclick="toggleModal()"
        class="flex h-14 w-14 items-center justify-center rounded-full bg-purple-600 text-white shadow-lg transition hover:scale-105"
        aria-label="Buka sokongan"
    >
        <i class="fa-solid fa-headset"></i>
    </button>
</div>

<div id="supportModal" class="fixed inset-0 z-[10000] hidden items-center justify-center bg-black/50 px-4">
    <div class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-800">
        <div class="flex items-center justify-between bg-purple-600 px-5 py-4 text-white">
            <h2 class="text-lg font-semibold">Support</h2>
            <button type="button" onclick="toggleModal()" aria-label="Tutup sokongan">x</button>
        </div>

        <div id="successMsg" class="hidden bg-green-100 px-4 py-2 text-sm text-green-700">
            Message sent (UI only)
        </div>

        <form onsubmit="submitForm(event)" class="space-y-4 p-5">
            <input id="name" type="text" placeholder="Name" class="w-full rounded-lg border p-2 outline-none focus:ring-2 focus:ring-purple-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
            <input id="phone" type="text" placeholder="Phone" class="w-full rounded-lg border p-2 outline-none focus:ring-2 focus:ring-purple-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
            <textarea id="message" rows="3" placeholder="Your message..." class="w-full rounded-lg border p-2 outline-none focus:ring-2 focus:ring-purple-500 dark:border-slate-600 dark:bg-slate-700 dark:text-white"></textarea>

            <button class="w-full rounded-lg bg-purple-600 py-2 text-white hover:bg-purple-700">
                Submit
            </button>
        </form>
    </div>
</div>

<style>
    .social-float {
        position: fixed !important;
        z-index: 9999 !important;
    }

    .social-float[data-open="true"] .social-float-menu,
    .social-float:hover .social-float-menu,
    .social-float:focus-within .social-float-menu {
        pointer-events: auto;
        opacity: 1;
        transform: translate(0, -50%);
    }

    @media (max-width: 640px) {
        .social-float {
            right: max(0.85rem, env(safe-area-inset-right)) !important;
            bottom: calc(env(safe-area-inset-bottom) + 1rem) !important;
            gap: 0.7rem;
        }

        .social-float > a,
        .social-float > button,
        .social-float [data-social-toggle] {
            width: 3.25rem;
            height: 3.25rem;
        }

        .social-float-menu {
            right: 3.8rem;
            gap: 0.7rem;
        }

        .social-float-menu a {
            width: 2.85rem;
            height: 2.85rem;
        }
    }
</style>

<script>
function toggleModal() {
    const modal = document.getElementById('supportModal');
    if (!modal) return;
    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');
}

function submitForm(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    if (!name || !phone || !message) {
        alert('Please fill all fields!');
        return;
    }

    document.getElementById('successMsg').classList.remove('hidden');
    e.target.reset();

    setTimeout(() => {
        document.getElementById('successMsg').classList.add('hidden');
    }, 3000);
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-social-float]').forEach(function (float) {
        const toggle = float.querySelector('[data-social-toggle]');

        if (!toggle) return;

        toggle.addEventListener('click', function (event) {
            event.stopPropagation();
            const isOpen = float.dataset.open === 'true';
            float.dataset.open = isOpen ? 'false' : 'true';
            toggle.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
        });

        document.addEventListener('click', function (event) {
            if (!float.contains(event.target)) {
                float.dataset.open = 'false';
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    });
});
</script>
