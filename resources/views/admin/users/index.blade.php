<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Urus Pengguna</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-up {
            opacity: 0;
            animation: fadeUp 0.55s ease forwards;
        }

        .user-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(94, 234, 212, 0.18);
            background:
                radial-gradient(circle at 12% 18%, rgba(255,255,255,0.18), transparent 24%),
                radial-gradient(circle at 88% 24%, rgba(125, 211, 252, 0.28), transparent 22%),
                radial-gradient(circle at 76% 80%, rgba(94, 234, 212, 0.26), transparent 24%),
                linear-gradient(135deg, #0f172a 0%, #0f766e 44%, #14b8a6 74%, #67e8f9 100%);
            box-shadow:
                0 24px 55px rgba(15, 23, 42, 0.16),
                0 10px 24px rgba(20, 184, 166, 0.14);
        }

        .user-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(120deg, rgba(255,255,255,0.08), transparent 42%),
                repeating-linear-gradient(90deg, rgba(255,255,255,0.08) 0 1px, transparent 1px 18px),
                repeating-linear-gradient(180deg, rgba(255,255,255,0.06) 0 1px, transparent 1px 18px);
            opacity: 0.28;
            pointer-events: none;
        }

        .user-hero::after {
            content: "";
            position: absolute;
            right: -4rem;
            top: -4rem;
            width: 16rem;
            height: 16rem;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.2), rgba(255,255,255,0));
            filter: blur(6px);
            pointer-events: none;
        }

        .user-hero-eyebrow {
            color: rgba(236, 254, 255, 0.82);
        }

        .user-hero-title {
            color: #ffffff;
            text-shadow: 0 10px 22px rgba(15, 23, 42, 0.24);
        }

        .user-hero-copy {
            color: rgba(236, 254, 255, 0.92);
        }

        .user-panel {
            border: 1px solid rgba(15, 23, 42, 0.08);
            background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(248,250,252,0.96));
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        }

        .user-toolbar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .user-search-form {
            display: flex;
            flex: 0 1 auto;
            align-items: center;
            gap: 0.75rem;
        }

        .user-search-input {
            width: min(100%, 20rem);
            border: 1px solid rgba(148, 163, 184, 0.28);
            border-radius: 999px;
            background: rgba(255,255,255,0.94);
            padding: 0.82rem 1rem;
            color: #0f172a;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.92);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .user-search-input:focus {
            outline: none;
            border-color: rgba(20, 184, 166, 0.5);
            box-shadow: 0 0 0 4px rgba(45, 212, 191, 0.12);
        }

        .user-search-btn {
            flex: 0 0 auto;
            border: 0;
            border-radius: 999px;
            background: linear-gradient(120deg, #0f766e, #14b8a6);
            padding: 0.82rem 1.2rem;
            color: #ffffff;
            font-size: 0.84rem;
            font-weight: 700;
            box-shadow: 0 10px 24px rgba(20, 184, 166, 0.2);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .user-search-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 28px rgba(20, 184, 166, 0.24);
        }

        .user-add-btn {
            background: linear-gradient(120deg, #0f766e, #14b8a6);
            box-shadow: 0 10px 24px rgba(20, 184, 166, 0.22);
        }

        .user-add-btn:hover {
            background: linear-gradient(120deg, #115e59, #0f766e);
        }

        .user-row {
            border: 1px solid rgba(15, 23, 42, 0.06);
            background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(248,250,252,0.96));
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }

        .user-row:hover {
            transform: translateY(-2px);
            border-color: rgba(20, 184, 166, 0.18);
            box-shadow: 0 18px 34px rgba(20, 184, 166, 0.08);
        }

        .user-split-section {
            border: 1px solid rgba(15, 23, 42, 0.08);
            background: rgba(255, 255, 255, 0.7);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.9);
        }

        .user-name {
            display: block;
            max-width: 100%;
            word-break: break-word;
            line-height: 1.2;
        }

        .user-meta {
            min-width: 6.5rem;
            text-align: right;
        }

        .user-actions {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-section-chip-admin {
            background: rgba(220, 38, 38, 0.08);
            color: #b91c1c;
            border: 1px solid rgba(252, 165, 165, 0.4);
        }

        .user-section-chip-staff {
            background: rgba(14, 165, 233, 0.08);
            color: #0369a1;
            border: 1px solid rgba(125, 211, 252, 0.42);
        }

        .user-avatar {
            background: linear-gradient(145deg, rgba(204,251,241,0.95), rgba(240,249,255,0.96));
            border: 1px solid rgba(125, 211, 252, 0.32);
            color: #0f766e;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.95), 0 10px 20px rgba(20,184,166,0.08);
        }

        .user-badge-admin {
            background: rgba(220, 38, 38, 0.06);
            color: #dc2626;
            border: 1px solid rgba(252, 165, 165, 0.44);
        }

        .user-badge-staff {
            background: rgba(14, 165, 233, 0.08);
            color: #0369a1;
            border: 1px solid rgba(125, 211, 252, 0.44);
        }

        .user-edit-action {
            color: #0284c7;
        }

        .user-edit-action:hover {
            color: #0369a1;
            background: rgba(14, 165, 233, 0.08);
        }

        .user-delete-action:hover {
            background: rgba(220, 38, 38, 0.06);
        }

        body.admin-dark .user-panel {
            border-color: rgba(148, 163, 184, 0.16);
            background: linear-gradient(180deg, rgba(10, 24, 48, 0.96), rgba(8, 23, 47, 0.92));
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.24);
        }

        body.admin-dark .user-search-input {
            border-color: rgba(148, 163, 184, 0.22);
            background: rgba(8, 23, 47, 0.92);
            color: #e2e8f0;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.03);
        }

        body.admin-dark .user-search-input::placeholder {
            color: #94a3b8;
        }

        body.admin-dark .user-search-input:focus {
            border-color: rgba(45, 212, 191, 0.45);
            box-shadow: 0 0 0 4px rgba(45, 212, 191, 0.12);
        }

        body.admin-dark .user-split-section {
            border-color: rgba(148, 163, 184, 0.12);
            background: rgba(15, 23, 42, 0.52);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.03);
        }

        body.admin-dark .user-row {
            border-color: rgba(148, 163, 184, 0.1);
            background: linear-gradient(180deg, rgba(12, 28, 54, 0.96), rgba(10, 24, 48, 0.96));
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.16);
        }

        body.admin-dark .user-row:hover {
            border-color: rgba(45, 212, 191, 0.2);
            box-shadow: 0 20px 34px rgba(0, 0, 0, 0.22), 0 0 0 1px rgba(45, 212, 191, 0.08);
        }

        body.admin-dark .user-avatar {
            background: linear-gradient(145deg, rgba(20,184,166,0.16), rgba(14,165,233,0.14));
            border-color: rgba(45, 212, 191, 0.24);
            color: #99f6e4;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.05), 0 10px 20px rgba(0,0,0,0.14);
        }

        body.admin-dark .user-section-chip-admin {
            background: rgba(220, 38, 38, 0.14);
            color: #fca5a5;
            border-color: rgba(248, 113, 113, 0.24);
        }

        body.admin-dark .user-section-chip-staff {
            background: rgba(14, 165, 233, 0.14);
            color: #7dd3fc;
            border-color: rgba(56, 189, 248, 0.24);
        }

        body.admin-dark .user-panel .text-gray-400,
        body.admin-dark .user-panel .text-slate-400 {
            color: #94a3b8 !important;
        }

        body.admin-dark .user-panel .text-gray-500,
        body.admin-dark .user-panel .text-slate-500 {
            color: #a8b5c7 !important;
        }

        body.admin-dark .user-panel .text-gray-600 {
            color: #cbd5e1 !important;
        }

        body.admin-dark .user-panel .text-gray-900,
        body.admin-dark .user-panel .text-slate-900 {
            color: #f8fafc !important;
        }

        body.admin-dark .user-edit-action {
            color: #38bdf8;
        }

        body.admin-dark .user-edit-action:hover {
            color: #7dd3fc;
            background: rgba(14, 165, 233, 0.12);
        }

        body.admin-dark .user-delete-action {
            color: #f87171;
        }

        body.admin-dark .user-delete-action:hover {
            background: rgba(220, 38, 38, 0.12);
            color: #fca5a5;
        }

        body.admin-dark .user-panel .bg-white {
            background-color: rgba(10, 24, 48, 0.92) !important;
        }

        body.admin-dark .user-panel .border-gray-200 {
            border-color: rgba(148, 163, 184, 0.14) !important;
        }

    </style>
</head>
<body class="admin-dark">
    @include('layouts.navadmin')

    @php
        $adminUsers = $users->filter(fn ($user) => strtolower((string) $user->level) === 'admin')->values();
        $staffUsers = $users->filter(fn ($user) => strtolower((string) $user->level) === 'staff')->values();
    @endphp

    <main class="max-w-7xl mx-auto px-6 py-16">
        
        {{-- Header Section: Subtle Wash --}}
        
        <div class="user-hero fade-up rounded-[2.25rem] px-6 py-8 sm:px-8 sm:py-10 mb-12">
            <p class="user-hero-eyebrow text-xs font-bold uppercase tracking-[0.3em]">Pengurusan Pengguna</p>
            <h2 class="user-hero-title text-4xl sm:text-5xl lg:text-6xl tracking-[-0.05em] max-w-3xl">
                Akaun Pengguna
            </h2>
            <p class="user-hero-copy mt-5 max-w-2xl text-base sm:text-lg leading-8">
                Halaman pengurusan akaun pengguna.
            </p>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm rounded-r-lg fade-up">
                {{ session('success') }}
            </div>
        @endif

        <div class="user-toolbar fade-up">
            <form method="GET" action="{{ route('admin.users') }}" class="user-search-form">
                <input type="text" name="search" value="{{ request('search') }}" class="user-search-input text-sm">
                <button type="submit" class="user-search-btn">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>
            </form>

            <a href="{{ route('admin.adduser') }}" class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/95 px-5 py-2.5 text-sm font-semibold text-teal-700 shadow-[0_14px_30px_rgba(15,23,42,0.16)] transition hover:-translate-y-1 hover:bg-white hover:shadow-[0_18px_36px_rgba(20,184,166,0.2)]">
                <i class="fas fa-user-plus text-xs"></i>
                Tambah Pengguna
            </a>
        </div>

        <div class="user-panel fade-up rounded-3xl p-2 md:p-8">
            <div class="px-6 py-4 flex items-center justify-between">
                <span class="text-[11px] uppercase tracking-[0.2em] font-bold text-gray-400">Senarai Akaun</span>
                <span class="text-sm font-semibold text-slate-500">Jumlah : {{ $users->count() }}</span>
            </div>

            @if ($users->isEmpty())
                <div class="text-center py-20 bg-white rounded-2xl border-2 border-dashed border-gray-200 m-4">
                    <p class="text-gray-400 text-sm">Tiada pengguna ditemui.</p>
                </div>
            @else
                <div class="grid gap-6 xl:grid-cols-2">
                    <section class="user-split-section fade-up rounded-[1.8rem] p-4 sm:p-5">
                        <div class="mb-4 flex items-center justify-between gap-3 px-2">
                            <h3 class="text-xl font-bold text-slate-900">Admin</h3>
                            <span class="user-section-chip-admin inline-flex items-center rounded-full px-3 py-1 text-xs font-extrabold uppercase tracking-[0.18em]">
                                {{ $adminUsers->count() }} Akaun
                            </span>
                        </div>

                        @if ($adminUsers->isEmpty())
                            <div class="rounded-2xl border border-dashed border-slate-200 bg-white px-5 py-8 text-center text-sm text-slate-400">
                                Tiada akaun admin direkodkan.
                            </div>
                        @else
                            <div class="space-y-2">
                                @foreach ($adminUsers as $i => $user)
                                    <div class="user-row group fade-up flex flex-col gap-4 p-6 rounded-2xl sm:flex-row sm:items-start sm:justify-between" style="animation-delay: {{ 0.06 * ($i % 8) }}s">
                                        <div class="flex min-w-0 flex-1 items-start space-x-4">
                                            <div class="user-avatar h-12 w-12 rounded-full flex items-center justify-center font-bold shrink-0">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <h2 class="user-name text-lg font-bold text-gray-900 mb-1">{{ $user->name }}</h2>
                                                <p class="text-sm text-gray-400 font-mono mt-0.5">@ {{ $user->username }}</p>
                                            </div>
                                        </div>

                                        <div class="flex shrink-0 items-start gap-5">
                                            <div class="user-meta text-right">
                                                <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Sertai</p>
                                                <p class="text-sm font-medium text-gray-600">{{ $user->created_at->format('M d, Y') }}</p>
                                            </div>
                                            
                                            <div class="user-actions">
                                                <a href="{{ route('admin.edituser', $user->id) }}" class="user-edit-action p-2.5 rounded-lg transition-all" title="Edit User">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.deleteuser', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="user-delete-action p-2.5 text-red-400 hover:text-red-600 rounded-lg transition-all" title="Delete User">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </section>

                    <section class="user-split-section fade-up rounded-[1.8rem] p-4 sm:p-5" style="animation-delay: 0.08s;">
                        <div class="mb-4 flex items-center justify-between gap-3 px-2">
                            <h3 class="text-xl font-bold text-slate-900">Staff</h3>
                            <span class="user-section-chip-staff inline-flex items-center rounded-full px-3 py-1 text-xs font-extrabold uppercase tracking-[0.18em]">
                                {{ $staffUsers->count() }} Akaun
                            </span>
                        </div>

                        @if ($staffUsers->isEmpty())
                            <div class="rounded-2xl border border-dashed border-slate-200 bg-white px-5 py-8 text-center text-sm text-slate-400">
                                Tiada akaun staff direkodkan.
                            </div>
                        @else
                            <div class="space-y-2">
                                @foreach ($staffUsers as $i => $user)
                                    <div class="user-row group fade-up flex flex-col gap-4 p-6 rounded-2xl sm:flex-row sm:items-start sm:justify-between" style="animation-delay: {{ 0.06 * ($i % 8) }}s">
                                        <div class="flex min-w-0 flex-1 items-start space-x-4">
                                            <div class="user-avatar h-12 w-12 rounded-full flex items-center justify-center font-bold shrink-0">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <h2 class="user-name text-lg font-bold text-gray-900 mb-1">{{ $user->name }}</h2>
                                                <p class="text-sm text-gray-400 font-mono mt-0.5">@ {{ $user->username }}</p>
                                            </div>
                                        </div>

                                        <div class="flex shrink-0 items-start gap-5">
                                            <div class="user-meta text-right">
                                                <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Sertai</p>
                                                <p class="text-sm font-medium text-gray-600">{{ $user->created_at->format('M d, Y') }}</p>
                                            </div>
                                            
                                            <div class="user-actions">
                                                <a href="{{ route('admin.edituser', $user->id) }}" class="user-edit-action p-2.5 rounded-lg transition-all" title="Edit User">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.deleteuser', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="user-delete-action p-2.5 text-red-400 hover:text-red-600 rounded-lg transition-all" title="Delete User">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </section>
                </div>
            @endif
        </div>
    </main>

    @include('components.social-float')
    @include('layouts.footer-admin')
</body>
</html>
