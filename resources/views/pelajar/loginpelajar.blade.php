<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Login Pelajar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    <style>
        /* Dark Mode Styles */
        html.dark body {
            background-color: #0f172a;
            color: #f1f5f9;
        }

        html.dark .text-orange-500 {
            color: #fb923c;
        }

        html.dark .text-slate-900 {
            color: #f1f5f9;
        }

        html.dark .text-slate-600 {
            color: #cbd5e1;
        }

        html.dark .rounded-\[32px\].bg-white {
            background-color: #1e293b;
            border-color: #334155;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        html.dark .rounded-\[32px\].border-rose-200 {
            background-color: rgba(244, 63, 94, 0.1);
            border-color: #f43f5e;
        }

        html.dark .bg-emerald-50 {
            background-color: rgba(5, 150, 105, 0.1);
            border-color: #10b981;
        }

        html.dark .text-emerald-700 {
            color: #6ee7b7;
        }

        html.dark .text-rose-700 {
            color: #fca5a5;
        }

        html.dark .border-slate-200 {
            border-color: #334155;
        }

        html.dark .border-slate-300 {
            border-color: #334155;
        }

        html.dark .bg-slate-50 {
            background-color: #0f172a;
            border-color: #334155;
        }

        html.dark .text-sm.font-semibold.text-slate-700 {
            color: #e2e8f0;
        }

        html.dark input[type="text"] {
            background-color: #1e293b;
            border-color: #334155;
            color: #f1f5f9;
        }

        html.dark input[type="text"]:focus {
            background-color: #1e293b;
            border-color: #fb923c;
            box-shadow: 0 0 0 2px rgba(251, 146, 60, 0.1);
        }

        html.dark input[readonly] {
            background-color: #0f172a;
            color: #cbd5e1;
        }

        html.dark .inline-flex.items-center.rounded-full.border.border-slate-300.bg-slate-50 {
            background-color: #1e293b;
            border-color: #334155;
            color: #cbd5e1;
        }

        html.dark .inline-flex.items-center.rounded-full.border.border-slate-300.bg-slate-50:hover {
            background-color: #334155;
        }

        html.dark .text-slate-700 {
            color: #cbd5e1;
        }

        html.dark .bg-orange-500 {
            background-color: #f97316;
        }

        html.dark .hover\:bg-orange-600:hover {
            background-color: #ea580c;
        }

        html.dark .text-white {
            color: #ffffff;
        }

        html.dark .text-xs.text-rose-600 {
            color: #fca5a5;
        }

        html.dark h2 {
            color: #f1f5f9;
        }

        html.dark .transition {
            transition: background-color 0.2s, border-color 0.2s;
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800">

@include('layouts.navpelajar')

<main class="max-w-7xl mx-auto px-4 py-6 space-y-6">
    @if(session('success'))
        <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="rounded-3xl border border-rose-200 bg-rose-50 p-4 text-rose-700 shadow-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.15em] text-orange-500">Login Pelajar</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Sahkan Identiti</h1>
            <p class="mt-2 text-sm text-slate-600">Masukkan No. IC untuk mengesahkan identiti.</p>
        </div>
    </div>

    @if($pelajar)
        <div class="rounded-[32px] bg-white p-8 shadow-sm border border-slate-200 max-w-xl">
            <form action="{{ route('pelajar.verify-ic') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="pelajar_id" value="{{ $pelajar->id }}">

                <div>
                    <label class="block">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Pelajar</span>
                        <div class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900">
                            {{ $pelajar->nama_pelajar }}
                        </div>
                    </label>
                </div>

                <div>
                    <label class="block">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">No. IC</span>
                        <input type="text" name="ic_pelajar" value="{{ old('ic_pelajar') }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100" required>
                        @error('ic_pelajar') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:justify-between">
                    <a href="{{ route('pelajar.senarainama', ['pelajar_id' => $pelajar->id]) }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-slate-50 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Kembali</a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-orange-600">Sahkan</button>
                </div>
            </form>
        </div>
    @else
        <div class="rounded-[32px] bg-white p-8 shadow-sm border border-rose-200 text-rose-700 max-w-xl">
            <h2 class="text-xl font-semibold mb-2">Pelajar tidak dijumpai</h2>
            <p>Sila kembali ke senarai nama dan pilih pelajar yang sah.</p>
            <a href="{{ route('pelajar.senarainama') }}" class="mt-4 inline-flex items-center justify-center rounded-full border border-slate-300 bg-slate-50 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Kembali ke Senarai Nama</a>
        </div>
    @endif
</main>

@include('layouts.footer-pelajar')

</body>
</html>