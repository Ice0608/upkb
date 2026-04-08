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
            <div class="hidden md:flex items-center space-x-8 text-sm font-medium navbar-menu ml-auto mr-8">
                {{-- Program Dropdown --}}
                <div class="relative group">
                    <a href="{{ route('program') }}" class="{{ request()->routeIs('program') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }} inline-flex items-center gap-1">
                        Program
                    </a>

                    <!-- DROPDOWN -->
                    <div class="absolute left-1/2 -translate-x-1/2 top-full pt-4
                    opacity-0 invisible translate-y-4 scale-95 blur-sm
                    group-hover:opacity-100 group-hover:visible 
                    group-hover:translate-y-0 group-hover:scale-100 group-hover:blur-0
                    transition-all duration-300 ease-out delay-100">

                        <div class="backdrop-blur-md bg-white/40 rounded-xl shadow-md p-1 border border-white/30">

                            <div class="flex overflow-hidden rounded-lg">

                                <!-- TVET -->
                                <a href="{{ route('institusi', ['jenis' => 'TVET']) }}"
                                class="flex-1 text-center py-2 px-4 text-white text-sm font-medium
                                bg-orange-500/80 hover:bg-orange-500
                                transition duration-300">
                                    TVET
                                </a>

                                <!-- Diploma -->
                                <a href="{{ route('institusi', ['jenis' => 'Diploma']) }}"
                                class="flex-1 text-center py-2 px-4 text-white text-sm font-medium
                                bg-purple-500/80 hover:bg-purple-500
                                transition duration-300">
                                    Diploma
                                </a>

                                <!-- Sains Kesihatan -->
                                <a href="{{ route('institusi', ['jenis' => 'Sains Kesihatan']) }}"
                                class="flex-1 text-center py-2 px-4 text-white text-sm font-medium leading-tight
                                bg-blue-500/80 hover:bg-blue-500
                                transition duration-300">
                                    Sains<br>Kesihatan
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

        <div class="absolute bottom-0 left-0 w-full h-[2px] bg-gradient-to-r from-orange-400 via-orange-500 to-orange-400 opacity-70"></div>
    </nav>
    