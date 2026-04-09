<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

<main class="max-w-7xl mx-auto px-4 py-8 space-y-8">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-orange-500">Admin Dashboard</p>
            <h1 class="text-3xl font-semibold text-gray-900">Ringkasan Sistem</h1>
            <p class="mt-2 text-sm text-gray-600">Maklumat terkini mengenai event, pelajar, institusi dan kursus.</p>
        </div>
        <div class="text-sm text-gray-500">
            Hari ini: {{ now()->format('d M Y') }}
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Pelajar -->
        <div class="rounded-[32px] bg-white p-6 shadow-sm border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-gray-500">Total Pelajar</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalPelajar) }}</p>
                </div>
            </div>
        </div>

        <!-- Pelajar Hari Ini -->
        <div class="rounded-[32px] bg-white p-6 shadow-sm border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                    <i class="fas fa-user-plus text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-gray-500">Pelajar Hari Ini</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($todayPelajar) }}</p>
                </div>
            </div>
        </div>

        <!-- Total Institusi -->
        <div class="rounded-[32px] bg-white p-6 shadow-sm border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-100">
                    <i class="fas fa-building text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-gray-500">Total Institusi</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalInstitusi) }}</p>
                </div>
            </div>
        </div>

        <!-- Total Kursus -->
        <div class="rounded-[32px] bg-white p-6 shadow-sm border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-orange-100">
                    <i class="fas fa-graduation-cap text-orange-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-gray-500">Total Kursus</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalKursus) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Today's Events -->
    <div class="rounded-[32px] bg-white p-8 shadow-sm border border-gray-200">
        <div class="flex items-center gap-3 mb-6">
            <i class="fas fa-calendar-day text-orange-500 text-xl"></i>
            <h2 class="text-xl font-semibold text-gray-900">Event Hari Ini</h2>
        </div>

        @if($todayEvents->count() > 0)
            <div class="space-y-4">
                @foreach($todayEvents as $event)
                    <div class="flex items-center justify-between p-4 rounded-2xl border border-gray-100 bg-gray-50">
                        <div class="flex items-center gap-4">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-orange-100">
                                <i class="fas fa-calendar text-orange-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $event->nama_event }}</h3>
                                <p class="text-sm text-gray-600">{{ $event->lokasi }} • {{ $event->masa_event }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">{{ $event->PIC }}</p>
                            <p class="text-xs text-gray-500">PIC</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-calendar-times text-gray-300 text-4xl mb-4"></i>
                <p class="text-gray-500">Tiada event pada hari ini</p>
            </div>
        @endif
    </div>
</main>

@include('components.social-float')

<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-10 text-sm text-gray-400">© {{ date('Y') }} Unit Pembangunan Kemahiran Belia.</div>
</footer>

</body>
</html>
