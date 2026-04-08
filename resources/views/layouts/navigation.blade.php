{{-- 🔹 NAVBAR --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

            {{-- LEFT: LOGO + NAME --}}
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/icon/logo.jpeg') }}" alt="logo" class="w-12 h-12 object-contain">
                </a>
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
                {{-- Program Dropdown --}}
                <div class="relative group">
                    <a href="{{ route('program') }}" class="{{ request()->routeIs('program') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }} inline-flex items-center gap-1">
                        Program
                    </a>
                    
                    {{-- Dropdown Menu --}}
                    <div class="absolute left-1/2 -translate-x-1/2 top-full pt-4 opacity-0 group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-4">
                            <div class="flex gap-4 items-center">
                                <a href="{{ route('institusi', ['jenis' => 'TVET']) }}" class="flex-1 text-center px-4 py-2 rounded-lg text-black transition duration-200">
                                    TVET
                                </a>
                                <a href="{{ route('institusi', ['jenis' => 'Diploma']) }}" class="flex-1 text-center px-4 py-2 rounded-lg text-black transition duration-200">
                                    Diploma
                                </a>
                                <a href="{{ route('institusi', ['jenis' => 'Sains Kesihatan']) }}" class="flex-1 text-center px-4 py-2 rounded-lg text-black transition duration-200">
                                    Sains Kesihatan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">FAQ</a>
                <a href="{{ route('hubungi') }}" class="{{ request()->routeIs('hubungi') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Hubungi</a>
            </div>

            {{-- RIGHT: LOGIN ICON --}}
            <div>
                <a href="/login">
                    <img src="{{ asset('images/icon/loginIcon.png') }}" 
                        alt="login" 
                        class="w-8 h-8 hover:scale-110 transition">
                </a>
            </div>

        </div>
    </nav>