<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Manage Users</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 antialiased">
    @include('layouts.navadmin')

    <main class="max-w-7xl mx-auto px-6 py-16">
        
        {{-- Header Section: Subtle Wash --}}
        
        <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">Akaun Pengguna</h1>
                    <p class="mt-3 text-lg text-orange-100">Halaman pengurusan akaun pengguna.</p>
                </div>
                <a href="{{ route('admin.adduser') }}" class="w-14 h-14 rounded-full bg-white text-orange-600 shadow-md hover:shadow-lg transition flex items-center justify-center">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
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
                <span class="text-xs text-gray-400">{{ $users->count() }} Total</span>
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