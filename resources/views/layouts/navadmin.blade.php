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

            {{-- CENTER: MENU --}}
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium navbar-menu">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Dashboard</a>
                <a href="{{ route('admin.programs') }}" class="{{ request()->routeIs('admin.programs','admin.addprogram','admin.editprogram') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Programs</a>
                <a href="{{ route('admin.institusis') }}" class="{{ request()->routeIs('admin.institusis','admin.addinstitusi','admin.editinstitusi') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Institusi</a>
                <a href="{{ route('admin.messages') }}" class="{{ request()->routeIs('admin.messages','admin.message-detail') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Pertanyaan</a>
                <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users','admin.adduser','admin.edituser') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Users</a>
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