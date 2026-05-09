<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Manage Users</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .user-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 227, 170, 0.48);
            background:
                linear-gradient(90deg, #ff7a00 0%, #ff9924 56%, #ffd24a 100%);
            box-shadow:
                inset 0 1px 0 rgba(255, 250, 236, 0.44),
                0 24px 55px rgba(205, 112, 24, 0.22),
                0 0 46px rgba(255, 177, 60, 0.2);
            animation: faqFloat 6.6s var(--xmb-ease-soft) infinite;
        }

        .user-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 84% 30%, rgba(255, 249, 235, 0.3), transparent 18%),
                linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.18), transparent 72%),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 14px),
                repeating-linear-gradient(180deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 14px);
            background-size: auto, auto, 8rem 5.8rem, 8rem 5.8rem;
            background-position: center, center, 1.25rem calc(100% - 0.95rem), 1.25rem calc(100% - 0.95rem);
            background-repeat: no-repeat;
            opacity: 0.9;
            pointer-events: none;
        }

        .user-hero::after {
            content: "";
            position: absolute;
            right: 6%;
            top: -2.25rem;
            width: 12rem;
            height: 12rem;
            border-radius: 50%;
            border: 1px solid rgba(255, 241, 209, 0.22);
            box-shadow:
                0 0 0 1rem rgba(255, 241, 209, 0.08),
                0 0 0 2rem rgba(255, 241, 209, 0.04);
            opacity: 0.92;
            pointer-events: none;
        }

        .user-hero-eyebrow {
            color: rgba(255, 244, 228, 0.74);
        }

        .user-hero-title {
            color: #ffffff;
            text-shadow: 0 10px 22px rgba(160, 74, 0, 0.24);
        }

        .user-hero-copy {
            color: rgba(255, 247, 235, 0.92);
        }

    </style>
</head>
<body class="bg-white text-gray-900 antialiased">
    @include('layouts.navadmin')

    <main class="max-w-7xl mx-auto px-6 py-16">
        
        {{-- Header Section: Subtle Wash --}}
        
        <div class="user-hero rounded-[2.25rem] px-6 py-8 sm:px-8 sm:py-10 mb-12">
            <h2 class="user-hero-title text-4xl sm:text-5xl lg:text-6xl tracking-[-0.05em] max-w-3xl">
                Akaun Pengguna
            </h2>
            <p class="user-hero-copy mt-5 max-w-2xl text-base sm:text-lg leading-8">
                Halaman pengurusan akaun pengguna.
            </p>
            <a href="{{ route('admin.adduser') }}" class="mt-6 inline-flex items-center gap-2 rounded-full border border-white/45 bg-white/20 px-5 py-2.5 text-sm font-semibold text-white backdrop-blur-sm transition hover:bg-white/28 hover:border-white/60">
                <i class="fas fa-user-plus text-xs"></i>
                Tambah Pengguna
            </a>
        </div>

        {{-- Alerts --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm rounded-r-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- User List Section: Subtle Wash --}}
        <div class="bg-gray-100 rounded-3xl p-2 md:p-8">
            {{-- Section Label --}}
            <div class="px-6 py-4 flex items-center justify-between">
                <span class="text-[11px] uppercase tracking-[0.2em] font-bold text-gray-400">Senarai Akaun</span>
                <div class="flex items-center gap-3">
                    <span class="text-xs text-gray-400">{{ $users->count() }} Total</span>
                    <a href="{{ route('admin.adduser') }}" class="inline-flex items-center gap-2 rounded-full bg-orange-500 px-4 py-2 text-xs font-bold uppercase tracking-wide text-white transition hover:bg-orange-600">
                        <i class="fas fa-plus text-[10px]"></i>
                        Add User
                    </a>
                </div>
            </div>

            @if ($users->isEmpty())
                <div class="text-center py-20 bg-white rounded-2xl border-2 border-dashed border-gray-200 m-4">
                    <p class="text-gray-400 text-sm">No registered users found.</p>
                </div>
            @else
                <div class="space-y-2">
                    @foreach ($users as $user)
                        <div class="group flex flex-col sm:flex-row sm:items-center justify-between p-6 bg-white rounded-2xl transition-all hover:shadow-md border border-transparent hover:border-gray-100">
                            <div class="flex items-center space-x-4">
                                {{-- Avatar Placeholder --}}
                                <div class="h-12 w-12 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 font-bold shrink-0">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h2 class="text-lg font-bold text-gray-900 leading-tight">{{ $user->name }}</h2>
                                        <span class="text-[10px] uppercase tracking-widest font-extrabold px-2 py-0.5 rounded {{ $user->level === 'admin' ? 'bg-red-50 text-red-600 border border-red-100' : 'bg-blue-50 text-blue-600 border border-blue-100' }}">
                                            {{ $user->level }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-400 font-mono mt-0.5">@ {{ $user->username }}</p>
                                </div>
                            </div>

                            <div class="mt-4 sm:mt-0 flex items-center gap-8">
                                <div class="hidden lg:block text-right">
                                    <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Sertai</p>
                                    <p class="text-sm font-medium text-gray-600">{{ $user->created_at->format('M d, Y') }}</p>
                                </div>
                                
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.edituser', $user->id) }}" class="p-2.5 text-blue-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all" title="Edit User">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.deleteuser', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2.5 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Delete User">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>

    @include('components.social-float')
    @include('layouts.footer-admin')
</body>
</html>