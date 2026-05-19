<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>BMD - Borang Maklumat Diri</title>
    <style>
        input[type="text"], select {
            text-transform: uppercase;
        }
        select option {
            text-transform: uppercase;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">

<main class="max-w-6xl mx-auto px-4 py-8">
    <div class="rounded-[32px] bg-white p-8 shadow-sm border border-slate-200">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-orange-500">BMD</p>
                <h1 class="text-3xl font-semibold text-slate-900">Borang Maklumat Diri</h1>
                @if(isset($event))
                    <p class="mt-2 text-sm text-slate-600">Acara: {{ $event->nama_event }} pada {{ $event->tarikh_event?->format('d/m/Y') }}</p>
                @endif
            </div>
            <a href="{{ route('pelajar.senarainama') }}" class="inline-flex items-center rounded-full border border-slate-300 bg-slate-50 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Kembali ke Senarai Nama</a>
        </div>

        @if(session('success'))
            <div class="mt-6 rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700 shadow-sm">{{ session('success') }}</div>
        @endif

        <form action="{{ route('bmd.store') }}" method="POST" class="mt-8 space-y-6">
            @csrf
            @if(isset($event))
                <input type="hidden" name="event_id" value="{{ $event->id }}">
            @endif

            <div class="rounded-[32px] border border-slate-300 bg-slate-50 p-6">
                <div class="text-center space-y-1">
                    <h2 class="text-2xl font-semibold uppercase tracking-[0.15em] text-slate-900">Borang Permohonan dan Temu Duga</h2>
                </div>
            </div>

            <div class="rounded-[32px] border border-slate-300 bg-white p-6 space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h3 class="mt-2 text-lg font-semibold text-slate-900">1. MAKLUMAT PEMOHON</h3>
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <label class="block">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">Tarikh Pendaftaran</span>
                        <input type="date" name="tarikh_pendaftaran" value="{{ old('tarikh_pendaftaran', $event?->tarikh_event?->format('Y-m-d') ?? $pelajar?->tarikh_pendaftaran?->format('Y-m-d')) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100" @if(isset($event)) readonly @endif required>
                        @error('tarikh_pendaftaran') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. Rujukan</span>
                    <input type="text" name="noreff" value="{{ old('noreff', $pelajar?->noreff) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('noreff') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-1">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Program</span>
                    <select name="program" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        <option value="">Pilih Program</option>
                        <option value="Diploma" {{ old('program', $pelajar?->program) == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                        <option value="TVET" {{ old('program', $pelajar?->program) == 'TVET' ? 'selected' : '' }}>TVET</option>
                        <option value="Sains Kesihatan" {{ old('program', $pelajar?->program) == 'Sains Kesihatan' ? 'selected' : '' }}>Sains Kesihatan</option>
                    </select>
                    @error('program') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <label class="block">
                <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Pelajar</span>
                <input type="text" name="nama_pelajar" value="{{ old('nama_pelajar', $pelajar?->nama_pelajar) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100" required>
                @error('nama_pelajar') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. K/P</span>
                    <input type="text" name="ic_pelajar" value="{{ old('ic_pelajar', $pelajar?->ic_pelajar) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100" required>
                    @error('ic_pelajar') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. Telefon Pelajar</span>
                    <input type="text" name="no_tel" value="{{ old('no_tel', $pelajar?->no_tel) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('no_tel') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <label class="block">
                <span class="mb-2 block text-sm font-semibold text-slate-700">E-mel</span>
                <input type="email" name="email" value="{{ old('email', $pelajar?->email) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                @error('email') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <div class="border-t border-slate-200 pt-6">
                    <h3 class="mt-2 text-lg font-semibold text-slate-900">2. MAKLUMAT ALAMAT</h3>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Alamat Baris 1</span>
                    <input type="text" name="address_line1" value="{{ old('address_line1', $pelajar?->address_line1) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('address_line1') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Alamat Baris 2</span>
                    <input type="text" name="address_line2" value="{{ old('address_line2', $pelajar?->address_line2) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('address_line2') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

                

            <div class="grid gap-6 sm:grid-cols-3">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Bandar</span>
                    <input type="text" name="city" value="{{ old('city', $pelajar?->city) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('city') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Negeri</span>
                    <select name="region" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        <option value="">PILIH NEGERI</option>
                        <option value="JOHOR" {{ strtoupper((string) old('region', $pelajar?->region)) == 'JOHOR' ? 'selected' : '' }}>JOHOR</option>
                        <option value="KEDAH" {{ strtoupper((string) old('region', $pelajar?->region)) == 'KEDAH' ? 'selected' : '' }}>KEDAH</option>
                        <option value="KELANTAN" {{ strtoupper((string) old('region', $pelajar?->region)) == 'KELANTAN' ? 'selected' : '' }}>KELANTAN</option>
                        <option value="MELAKA" {{ strtoupper((string) old('region', $pelajar?->region)) == 'MELAKA' ? 'selected' : '' }}>MELAKA</option>
                        <option value="NEGERI SEMBILAN" {{ strtoupper((string) old('region', $pelajar?->region)) == 'NEGERI SEMBILAN' ? 'selected' : '' }}>NEGERI SEMBILAN</option>
                        <option value="PAHANG" {{ strtoupper((string) old('region', $pelajar?->region)) == 'PAHANG' ? 'selected' : '' }}>PAHANG</option>
                        <option value="PERAK" {{ strtoupper((string) old('region', $pelajar?->region)) == 'PERAK' ? 'selected' : '' }}>PERAK</option>
                        <option value="PERLIS" {{ strtoupper((string) old('region', $pelajar?->region)) == 'PERLIS' ? 'selected' : '' }}>PERLIS</option>
                        <option value="PULAU PINANG" {{ strtoupper((string) old('region', $pelajar?->region)) == 'PULAU PINANG' ? 'selected' : '' }}>PULAU PINANG</option>
                        <option value="SABAH" {{ strtoupper((string) old('region', $pelajar?->region)) == 'SABAH' ? 'selected' : '' }}>SABAH</option>
                        <option value="SARAWAK" {{ strtoupper((string) old('region', $pelajar?->region)) == 'SARAWAK' ? 'selected' : '' }}>SARAWAK</option>
                        <option value="SELANGOR" {{ strtoupper((string) old('region', $pelajar?->region)) == 'SELANGOR' ? 'selected' : '' }}>SELANGOR</option>
                        <option value="TERENGGANU" {{ strtoupper((string) old('region', $pelajar?->region)) == 'TERENGGANU' ? 'selected' : '' }}>TERENGGANU</option>
                        <option value="KUALA LUMPUR" {{ strtoupper((string) old('region', $pelajar?->region)) == 'KUALA LUMPUR' ? 'selected' : '' }}>KUALA LUMPUR</option>
                        <option value="LABUAN" {{ strtoupper((string) old('region', $pelajar?->region)) == 'LABUAN' ? 'selected' : '' }}>LABUAN</option>
                        <option value="PUTRAJAYA" {{ strtoupper((string) old('region', $pelajar?->region)) == 'PUTRAJAYA' ? 'selected' : '' }}>PUTRAJAYA</option>
                    </select>
                    @error('region') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Poskod</span>
                    <input type="text" name="postcode" value="{{ old('postcode', $pelajar?->postcode) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="cth., 50000">
                    @error('postcode') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

                <div class="border-t border-slate-200 pt-6">
                    <h3 class="mt-2 text-lg font-semibold text-slate-900">3. MAKLUMAT IBU BAPA</h3>
                </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="block">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Bapa</span>
                        <input type="text" name="nama_bapa" value="{{ old('nama_bapa', $pelajar?->nama_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        @error('nama_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                    <label class="block mt-6">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">No. K/P Bapa</span>
                        <input type="text" name="ic_bapa" value="{{ old('ic_bapa', $pelajar?->ic_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        @error('ic_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                    <label class="block mt-6">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">No. Telefon Bapa</span>
                        <input type="text" name="no_tel_bapa" value="{{ old('no_tel_bapa', $pelajar?->no_tel_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        @error('no_tel_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                    <label class="block mt-6">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">E-mel Bapa</span>
                        <input type="email" name="email_bapa" value="{{ old('email_bapa', $pelajar?->email_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        @error('email_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                </div>
                <div>
                    <label class="block">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Ibu</span>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $pelajar?->nama_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        @error('nama_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                    <label class="block mt-6">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">No. K/P Ibu</span>
                        <input type="text" name="ic_ibu" value="{{ old('ic_ibu', $pelajar?->ic_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        @error('ic_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                    <label class="block mt-6">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">No. Telefon Ibu</span>
                        <input type="text" name="no_tel_ibu" value="{{ old('no_tel_ibu', $pelajar?->no_tel_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        @error('no_tel_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                    <label class="block mt-6">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">E-mel Ibu</span>
                        <input type="email" name="email_ibu" value="{{ old('email_ibu', $pelajar?->email_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                        @error('email_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                    </label>
                </div>
            </div>

            <label class="block">
                <span class="mb-2 block text-sm font-semibold text-slate-700">Jumlah Tanggungan</span>
                <input type="number" name="jumlah_tanggungan" min="0" value="{{ old('jumlah_tanggungan', $pelajar?->jumlah_tanggungan ?? 0) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                @error('jumlah_tanggungan') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <label class="inline-flex items-center gap-3 rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700">
                <span>Penerima STR?</span>
                <input type="checkbox" name="str" value="1" {{ old('str', $pelajar?->str ?? false) ? 'checked' : '' }} class="h-5 w-5 rounded border-slate-300 text-orange-500 focus:ring-orange-400">
            </label>

            <div class="flex flex-col gap-3 sm:flex-row sm:justify-between">
                <div class="space-x-3">
                    <a href="{{ url('/') }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-slate-50 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Batal</a>
                </div>

                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-orange-600">Simpan Maklumat</button>
            </div>
        </div>
        </form>
    </div>
</main>

@include('components.social-float')

@include('layouts.footer-pelajar')

@if(request()->query('print') && isset($pelajar))
    <script>window.print();</script>
@else
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selects = [
                document.querySelector('select[name="pilihan_pertama"]'),
                document.querySelector('select[name="pilihan_kedua"]'),
                document.querySelector('select[name="pilihan_ketiga"]')
            ];

            function updateOptions() {
                const selectedValues = selects.map(select => select.value).filter(val => val);

                selects.forEach(select => {
                    const currentValue = select.value;
                    Array.from(select.options).forEach(option => {
                        if (option.value && option.value !== currentValue) {
                            option.disabled = selectedValues.includes(option.value);
                        } else {
                            option.disabled = false;
                        }
                    });
                });
            }

            selects.forEach(select => {
                select.addEventListener('change', updateOptions);
            });

            // Initial update
            updateOptions();

            const textInputs = document.querySelectorAll('input[type="text"]');
            textInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const start = this.selectionStart;
                    const end = this.selectionEnd;
                    this.value = this.value.toUpperCase();
                    this.setSelectionRange(start, end);
                });

                input.addEventListener('paste', function(event) {
                    event.preventDefault();
                    const paste = (event.clipboardData || window.clipboardData).getData('text');
                    const upper = paste.toUpperCase();
                    const { selectionStart: start, selectionEnd: end } = this;
                    const value = this.value;
                    this.value = value.slice(0, start) + upper + value.slice(end);
                    this.setSelectionRange(start + upper.length, start + upper.length);
                });
            });
        });
    </script>
@endif

</body>
</html>
