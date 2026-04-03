    {{-- 🔹 NAVBAR --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

            {{-- LEFT: LOGO + NAME --}}
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.jpeg') }}" alt="logo" class="w-12 h-12 object-contain">

                <div class="leading-tight">
                    <h1 class="text-sm font-semibold text-gray-800">
                        Unit Pembangunan
                    </h1>
                    <h1 class="text-sm font-semibold text-gray-800">
                        Kemahiran Belia
                    </h1>
                </div>
            </div>

            {{-- CENTER: MENU --}}
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium navbar-menu">
                <a href="{{ url('/') }}" class="text-orange-500 font-semibold">Utama</a>
                <a href="{{ route('program') }}" class="hover:text-orange-500">Program</a>
                <a href="{{ route('faq') }}" class="hover:text-orange-500">FAQ</a>
                <a href="{{ route('galeri') }}" class="hover:text-orange-500">Galeri</a>
                <a href="{{ route('hubungi') }}" class="hover:text-orange-500">Hubungi</a>
            </div>

            {{-- RIGHT: LOGIN ICON --}}
            <div>
                <a href="/login">
                    <img src="{{ asset('images/loginIcon.png') }}" 
                        alt="login" 
                        class="w-8 h-8 hover:scale-110 transition">
                </a>
            </div>

        </div>
    </nav>