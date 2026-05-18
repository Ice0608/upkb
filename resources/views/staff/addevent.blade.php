<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Tambah Event</title>
    @include('components.dark-mode-init')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.staff-dark-mode')
</head>
<body class="staff-page bg-[linear-gradient(180deg,#ecf9f7_0%,#eef9f8_48%,#f0fdf9_100%)] text-slate-900">
@include('layouts.navstaff')

<main class="max-w-4xl mx-auto px-4 py-8">
    <div class="rounded-[32px] border border-white/80 bg-white/90 p-8 shadow-[0_24px_70px_rgba(15,23,42,0.12)] backdrop-blur">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-teal-600">Staff Event</p>
                <h1 class="text-3xl font-semibold text-slate-900">Tambah Event Baru</h1>
            </div>
            <a href="{{ route('staff.main') }}" class="inline-flex items-center rounded-full border border-slate-300 bg-slate-50 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Kembali</a>
        </div>

        <form action="{{ route('staff.event.store') }}" method="POST" class="mt-8 space-y-6">
            @csrf

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Event</span>
                    <input type="text" name="nama_event" value="{{ old('nama_event') }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100" placeholder="Masukkan nama event" required>
                    @error('nama_event') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>

                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Lokasi</span>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100" placeholder="Contoh: Dewan Serbaguna" required>
                    @error('lokasi') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Tarikh Event</span>
                    <input type="date" name="tarikh_event" value="{{ old('tarikh_event') }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100" required>
                    @error('tarikh_event') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>

                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Masa Event</span>
                    <input type="time" name="masa_event" value="{{ old('masa_event') }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100" required>
                    @error('masa_event') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <label class="block">
                <span class="mb-2 block text-sm font-semibold text-slate-700">PIC</span>
                <input type="text" name="PIC" value="{{ old('PIC') }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100" placeholder="Nama PIC event" required>
                @error('PIC') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('staff.main') }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-slate-50 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Batal</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-teal-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-teal-600">Simpan Event</button>
            </div>
        </form>
    </div>
</main>

@include('components.social-float')

@include('layouts.footer')

</body>
</html>
