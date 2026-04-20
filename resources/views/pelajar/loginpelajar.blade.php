<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Login Pelajar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800">
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
            <p class="text-sm uppercase tracking-[0.3em] text-orange-500">Login Pelajar</p>
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

</body>
</html>