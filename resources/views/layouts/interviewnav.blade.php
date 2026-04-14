{{-- 🔹 NAVBAR --}}
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        {{-- LEFT: LOGO + NAME --}}
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/icon/logo.jpeg') }}" alt="logo" class="w-12 h-12 object-contain">

            <div class="leading-tight">
                <h1 class="text-sm font-semibold text-gray-800">
                    Unit Pembangunan
                </h1>
                <h1 class="text-sm font-semibold text-gray-800">
                    Kemahiran Belia
                </h1>
            </div>
        </div>

        {{-- CENTER: BREADCRUMB --}}
        <div class="hidden md:flex items-center space-x-2 text-sm">
            <a href="{{ route('staff.main') }}" class="text-gray-600 hover:text-orange-500">Main</a>
            <span class="text-gray-400">></span>
            <a href="{{ route('staff.bmd.edit', $pelajar->id) }}" class="text-gray-600 hover:text-orange-500">BMD</a>
            <span class="text-gray-400">></span>
            <span class="text-orange-500 font-semibold">Temu Duga</span>
        </div>

        {{-- RIGHT: LOGOUT --}}
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-600 hover:text-orange-500">Logout</button>
            </form>
        </div>

    </div>
</nav>