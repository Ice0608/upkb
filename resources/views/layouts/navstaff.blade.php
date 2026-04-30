    {{-- 🔹 NAVBAR --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

            {{-- LEFT: LOGO + NAME --}}
            <a href="{{ url('/') }}" class="site-nav-brand flex min-w-0 items-center gap-3 rounded-[1.6rem]">
            <span class="site-nav-brand-badge flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-orange-100/90 bg-[linear-gradient(145deg,#fff7ed,#ffffff)] sm:h-14 sm:w-14">
                <img src="{{ asset('images/icon/seslogoo.png') }}" alt="SES logo" class="site-nav-brand-mark h-9 w-9 object-contain sm:h-10 sm:w-10">
            </span>
            <div class="site-nav-brand-copy min-w-0 leading-tight">
                <p class="site-nav-brand-kicker truncate text-[11px] uppercase tracking-[0.05em] text-orange-500 sm:text-xs">SES</p>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]">SMART Education</h1>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]">Society</h1>
            </div>
        </a>

            {{-- CENTER: MENU --}}
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium navbar-menu">
                {{-- <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Dashboard</a>
                <a href="{{ route('admin.programs') }}" class="{{ request()->routeIs('admin.programs','admin.addprogram','admin.editprogram') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Programs</a>
                <a href="{{ route('admin.institusis') }}" class="{{ request()->routeIs('admin.institusis','admin.addinstitusi','admin.editinstitusi') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Institusi</a>
                <a href="{{ route('admin.messages') }}" class="{{ request()->routeIs('admin.messages','admin.message-detail') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}">Pertanyaan</a> --}}
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