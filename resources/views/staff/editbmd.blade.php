<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>BMD - Borang Maklumat Diri</title>
    @include('components.dark-mode-init')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.staff-dark-mode')
    <style>
        @media print {
            * {
                margin: 0 !important;
                padding: 0 !important;
                box-sizing: border-box;
            }
            
            html, body {
                height: auto !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            
            body {
                background-color: white !important;
                font-size: 9px !important;
                line-height: 1.1 !important;
            }
            
            nav, footer, .no-print {
                display: none !important;
            }
            
            main {
                padding: 5px !important;
                margin: 0 !important;
                max-width: 100% !important;
            }
            
            .rounded-\[32px\] {
                border: 1px solid #ccc !important;
                box-shadow: none !important;
                padding: 3px !important;
                margin: 0 !important;
                page-break-inside: avoid !important;
            }
            
            .flex, .grid {
                margin: 0 !important;
                gap: 0 !important;
            }
            
            .flex.flex-col.gap-3, 
            .flex.flex-col.gap-3.sm\:flex-row.sm\:items-center.sm\:justify-between {
                display: none !important;
            }
            
            .mt-6, .mt-2, .mt-8, .mb-2, .mb-4 {
                margin: 0 !important;
            }
            
            .space-y-6 > * + * {
                margin-top: 1px !important;
            }
            
            .space-y-6, .space-y-4 {
                gap: 0 !important;
            }
            
            .p-8 { padding: 2px !important; }
            .p-6 { padding: 1px !important; }
            .p-4 { padding: 1px !important; }
            .py-8, .py-6, .py-4, .py-3 { padding-top: 0 !important; padding-bottom: 0 !important; }
            .px-4, .px-5, .px-6 { padding-left: 2px !important; padding-right: 2px !important; }
            
            .pb-4, .pb-6 {
                padding-bottom: 1px !important;
                margin-bottom: 1px !important;
            }
            
            input, select, textarea {
                padding: 1px 2px !important;
                font-size: 8px !important;
                border: 0.5px solid #999 !important;
                margin: 0 !important;
            }
            
            label {
                display: block !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            
            h1 {
                font-size: 14px !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            
            h2 {
                font-size: 11px !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            
            h3 {
                font-size: 10px !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            
            p, span {
                margin: 0 !important;
                padding: 0 !important;
            }
            
            .text-xs { font-size: 7px !important; }
            .text-sm { font-size: 8px !important; }
            .text-lg { font-size: 10px !important; }
            .text-2xl { font-size: 12px !important; }
            .text-3xl { font-size: 14px !important; }
            
            .border-b { 
                border-bottom: 0.5px solid #ccc !important; 
                padding-bottom: 1px !important;
            }
            
            button, a, [type="button"], [type="submit"] {
                display: none !important;
            }
            
            .grid.gap-6 { 
                display: grid !important; 
                gap: 0 !important; 
                page-break-inside: avoid !important;
            }
            
            .sm\:grid-cols-2 {
                grid-template-columns: 1fr 1fr !important;
                gap: 0 !important;
            }
            
            .max-w-6xl {
                max-width: 100% !important;
            }
            
            @page {
                size: A4 portrait;
                margin: 3mm;
            }
            
            /* Hide error messages and success messages */
            .border-emerald-200, .bg-emerald-50, .text-rose-600 {
                display: none !important;
            }
        }
    </style>
</head>
<body class="staff-page bg-[linear-gradient(180deg,#ecf9f7_0%,#eef9f8_48%,#f0fdf9_100%)] text-slate-900">
@include('layouts.navstaff')

<main class="max-w-6xl mx-auto px-4 py-8">
    <div class="rounded-[32px] border border-white/80 bg-white/92 p-8 shadow-[0_24px_70px_rgba(15,23,42,0.12)] backdrop-blur">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-teal-600">BMD</p>
                <h1 class="text-3xl font-semibold text-slate-900">Borang Maklumat Diri</h1>
                @if(isset($event))
                    <p class="mt-2 text-sm text-slate-600">Event: {{ $event->nama_event }} pada {{ $event->tarikh_event?->format('d/m/Y') }}</p>
                @endif
            </div>
            <a href="{{ route('staff.main') }}" class="inline-flex items-center rounded-full border border-slate-300 bg-slate-50 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Kembali</a>
        </div>

        @if(session('success'))
            <div class="mt-6 rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700 shadow-sm">{{ session('success') }}</div>
        @endif

        <form action="{{ route('staff.bmd.update', $pelajar->id) }}" method="POST" class="mt-8 space-y-6">
            @csrf
            @method('PUT')

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
                    <input type="date" name="tarikh_pendaftaran" value="{{ old('tarikh_pendaftaran', $pelajar?->tarikh_pendaftaran?->format('Y-m-d')) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100" required>
                    @error('tarikh_pendaftaran') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. Reff/ Nama Staff</span>
                    <input type="text" name="noreff" value="{{ old('noreff', $pelajar?->noreff) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('noreff') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Program</span>
                    <select name="program" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                        <option value="">Pilih Program</option>
                        <option value="Diploma" {{ old('program', $pelajar?->program) == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                        <option value="TVET" {{ old('program', $pelajar?->program) == 'TVET' ? 'selected' : '' }}>TVET</option>
                        <option value="Sains Kesihatan" {{ old('program', $pelajar?->program) == 'Sains Kesihatan' ? 'selected' : '' }}>Sains Kesihatan</option>
                    </select>
                    @error('program') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Status Perkahwinan</span>
                    <select name="status_perkahwinan" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                        <option value="">Pilih Status</option>
                        <option value="Bujang" {{ old('status_perkahwinan', $pelajar?->status_perkahwinan) == 'Bujang' ? 'selected' : '' }}>Bujang</option>
                        <option value="Berkahwin" {{ old('status_perkahwinan', $pelajar?->status_perkahwinan) == 'Berkahwin' ? 'selected' : '' }}>Berkahwin</option>
                        <option value="Duda" {{ old('status_perkahwinan', $pelajar?->status_perkahwinan) == 'Duda' ? 'selected' : '' }}>Duda</option>
                        <option value="Balu/Janda/Ibu Tunggal" {{ old('status_perkahwinan', $pelajar?->status_perkahwinan) == 'Balu/Janda/Ibu Tunggal' ? 'selected' : '' }}>Balu/Janda/Ibu Tunggal</option>
                    </select>
                    @error('status_perkahwinan') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <label class="block">
                <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Pelajar</span>
                <input type="text" name="nama_pelajar" value="{{ old('nama_pelajar', $pelajar?->nama_pelajar) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100" required>
                @error('nama_pelajar') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. IC</span>
                    <input type="text" name="ic_pelajar" value="{{ old('ic_pelajar', $pelajar?->ic_pelajar) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100" required>
                    @error('ic_pelajar') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Kredit SPM</span>
                    <input type="number" step="0.01" name="spm_credit" value="{{ old('spm_credit', $pelajar?->spm_credit) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('spm_credit') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <label class="block">
                <span class="mb-2 block text-sm font-semibold text-slate-700">Email</span>
                <input type="email" name="email" value="{{ old('email', $pelajar?->email) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                @error('email') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <div class="border-t border-slate-200 pt-6">
                    <h3 class="mt-2 text-lg font-semibold text-slate-900">2. MAKLUMAT ALAMAT</h3>
            </div>
            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Address Line 1</span>
                    <input type="text" name="address_line1" value="{{ old('address_line1', $pelajar?->address_line1) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('address_line1') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Address Line 2</span>
                    <input type="text" name="address_line2" value="{{ old('address_line2', $pelajar?->address_line2) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('address_line2') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-3">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Bandar</span>
                    <input type="text" name="city" value="{{ old('city', $pelajar?->city) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('city') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Negeri</span>
                    <select name="region" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                        <option value="">Pilih Negeri</option>
                        <option value="Johor" {{ old('region', $pelajar?->region) == 'Johor' ? 'selected' : '' }}>Johor</option>
                        <option value="Kedah" {{ old('region', $pelajar?->region) == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                        <option value="Kelantan" {{ old('region', $pelajar?->region) == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                        <option value="Melaka" {{ old('region', $pelajar?->region) == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                        <option value="Negeri Sembilan" {{ old('region', $pelajar?->region) == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                        <option value="Pahang" {{ old('region', $pelajar?->region) == 'Pahang' ? 'selected' : '' }}>Pahang</option>
                        <option value="Perak" {{ old('region', $pelajar?->region) == 'Perak' ? 'selected' : '' }}>Perak</option>
                        <option value="Perlis" {{ old('region', $pelajar?->region) == 'Perlis' ? 'selected' : '' }}>Perlis</option>
                        <option value="Pulau Pinang" {{ old('region', $pelajar?->region) == 'Pulau Pinang' ? 'selected' : '' }}>Pulau Pinang</option>
                        <option value="Sabah" {{ old('region', $pelajar?->region) == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                        <option value="Sarawak" {{ old('region', $pelajar?->region) == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                        <option value="Selangor" {{ old('region', $pelajar?->region) == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                        <option value="Terengganu" {{ old('region', $pelajar?->region) == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
                        <option value="Kuala Lumpur" {{ old('region', $pelajar?->region) == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                        <option value="Labuan" {{ old('region', $pelajar?->region) == 'Labuan' ? 'selected' : '' }}>Labuan</option>
                        <option value="Putrajaya" {{ old('region', $pelajar?->region) == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                    </select>
                    @error('region') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Poskod</span>
                    <input type="text" name="postcode" value="{{ old('postcode', $pelajar?->postcode) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100" placeholder="e.g., 50000">
                    @error('postcode') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

                <div class="border-t border-slate-200 pt-6">
                    <h3 class="mt-2 text-lg font-semibold text-slate-900">2. MAKLUMAT BAPA & IBU</h3>
                </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Bapa</span>
                    <input type="text" name="nama_bapa" value="{{ old('nama_bapa', $pelajar?->nama_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('nama_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">IC Bapa</span>
                    <input type="text" name="ic_bapa" value="{{ old('ic_bapa', $pelajar?->ic_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('ic_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-3">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. Telefon Bapa</span>
                    <input type="text" name="no_tel_bapa" value="{{ old('no_tel_bapa', $pelajar?->no_tel_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('no_tel_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Pekerjaan Bapa</span>
                    <input type="text" name="pekerjaan_bapa" value="{{ old('pekerjaan_bapa', $pelajar?->pekerjaan_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('pekerjaan_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Pendapatan Bapa</span>
                    <input type="text" name="pendapatan_bapa" value="{{ old('pendapatan_bapa', $pelajar?->pendapatan_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('pendapatan_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Ibu</span>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $pelajar?->nama_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('nama_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">IC Ibu</span>
                    <input type="text" name="ic_ibu" value="{{ old('ic_ibu', $pelajar?->ic_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('ic_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-3">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. Telefon Ibu</span>
                    <input type="text" name="no_tel_ibu" value="{{ old('no_tel_ibu', $pelajar?->no_tel_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('no_tel_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Pekerjaan Ibu</span>
                    <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $pelajar?->pekerjaan_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('pekerjaan_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Pendapatan Ibu</span>
                    <input type="text" name="pendapatan_ibu" value="{{ old('pendapatan_ibu', $pelajar?->pendapatan_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                    @error('pendapatan_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <label class="block">
                <span class="mb-2 block text-sm font-semibold text-slate-700">Jumlah Tanggungan</span>
                <input type="number" name="jumlah_tanggungan" min="0" value="{{ old('jumlah_tanggungan', $pelajar?->jumlah_tanggungan ?? 0) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-100">
                @error('jumlah_tanggungan') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <div class="border-t border-slate-200 pt-6">
                    <h3 class="mt-2 text-lg font-semibold text-slate-900">4. KURSUS DIPILIH</h3>
            </div>
            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Kod Institusi</span>
                    <input type="text" name="kod_institusi" value="{{ old('kod_institusi', $pelajar?->kod_institusi) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" readonly>
                    @error('kod_institusi') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Kod Kursus</span>
                    <input type="text" name="kod_kursus" value="{{ old('kod_kursus', $pelajar?->kod_kursus) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" readonly>
                    @error('kod_kursus') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            @error('pilihan') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror

            <div class="flex flex-col gap-3 sm:flex-row sm:justify-between no-print">
                <div class="space-x-3">
                    <a href="{{ route('staff.main') }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-slate-50 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Batal</a>
                    @if(isset($pelajar))
                        <button type="button" onclick="openPrintModal()" class="inline-flex items-center justify-center rounded-full border border-teal-500 bg-teal-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-teal-600">Cetak BMD</button>
                    @endif
                </div>

                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-teal-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-teal-600">Simpan Maklumat</button>
            </div>
        </div>
        </form>

        <!-- Mulakan Temu Duga Button -->
        <div class="mt-6 flex justify-center no-print">
            <a href="{{ route('pelajar.login', ['pelajar_id' => $pelajar->id]) }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-cyan-500 px-8 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-cyan-600">
                <i class="fas fa-play"></i> Mulakan Temu Duga
            </a>
        </div>
    </div>
</main>

@include('layouts.footer')

<!-- Print Modal -->
<div id="printModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden overflow-y-auto">
    <div class="flex items-start justify-center min-h-screen pt-4 px-4">
        <div class="bg-white rounded-lg w-full max-w-4xl max-h-[90vh] overflow-y-auto shadow-xl">
            <div class="sticky top-0 bg-white border-b border-gray-200 p-4 flex justify-between items-center">
                <h3 class="text-lg font-semibold">Preview BMD</h3>
                <button onclick="closePrintModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="printContent" class="p-6">
                <!-- Content will be loaded here -->
            </div>
            <div class="sticky bottom-0 bg-white border-t border-gray-200 p-4 flex gap-3 justify-end">
                <button onclick="closePrintModal()" class="px-6 py-2 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-50">Tutup</button>
                <button onclick="printBmdModal()" class="px-6 py-2 bg-teal-500 text-white rounded-full hover:bg-teal-600">Cetak / Simpan PDF</button>
            </div>
        </div>
    </div>
</div>

<!-- Receipt Modal -->
<div id="receiptModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden overflow-y-auto">
    <div class="flex items-start justify-center min-h-screen pt-4 px-4">
        <div class="bg-white rounded-lg w-full max-w-4xl max-h-[90vh] overflow-y-auto shadow-xl">
            <div class="sticky top-0 bg-white border-b border-gray-200 p-4 flex justify-between items-center">
                <h3 class="text-lg font-semibold">Preview Resit</h3>
                <button onclick="closeReceiptModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="receiptContent" class="p-6">
                <!-- Content will be loaded here -->
            </div>
            <div class="sticky bottom-0 bg-white border-t border-gray-200 p-4 flex gap-3 justify-end">
                <button onclick="closeReceiptModal()" class="px-6 py-2 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-50">Tutup</button>
                <button onclick="printReceiptModal()" class="px-6 py-2 bg-teal-500 text-white rounded-full hover:bg-teal-600">Cetak / Simpan PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
function printHtmlFragment(title, html) {
    const iframe = document.createElement('iframe');
    iframe.style.position = 'fixed';
    iframe.style.right = '0';
    iframe.style.bottom = '0';
    iframe.style.width = '0';
    iframe.style.height = '0';
    iframe.style.border = '0';
    document.body.appendChild(iframe);

    const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
    iframeDoc.open();
    iframeDoc.write(`<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>${title}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fff;
        }

        @media print {
            body {
                background: #fff;
            }
        }
    </style>
</head>
<body>${html}</body>
</html>`);
    iframeDoc.close();

    setTimeout(() => {
        iframe.contentWindow.focus();
        iframe.contentWindow.print();

        setTimeout(() => {
            iframe.remove();
        }, 1000);
    }, 250);
}

function openPrintModal() {
    console.log('openPrintModal called');
    const modal = document.getElementById('printModal');
    const printContent = document.getElementById('printContent');
    
    modal.classList.remove('hidden'); // Show modal immediately
    
    // Fetch the print content
    fetch(`{{ route('staff.bmd.print', $pelajar) }}?modal=1`)
        .then(response => response.text())
        .then(html => {
            printContent.innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            printContent.innerHTML = '<p>Error loading preview. Please check your connection and try again.</p>';
        });
}

function closePrintModal() {
    const modal = document.getElementById('printModal');
    modal.classList.add('hidden');
}

function printBmdModal() {
    const printContent = document.getElementById('printContent');
    printHtmlFragment('Preview BMD', printContent.innerHTML);
}

// Receipt Modal Functions
function openReceiptModal() {
    console.log('openReceiptModal called');
    const modal = document.getElementById('receiptModal');
    const receiptContent = document.getElementById('receiptContent');
    
    modal.classList.remove('hidden'); // Show modal immediately
    
    // Fetch the receipt content
    fetch(`{{ route('receipt') }}?modal=1`)
        .then(response => response.text())
        .then(html => {
            receiptContent.innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            receiptContent.innerHTML = '<p>Error loading preview. Please check your connection and try again.</p>';
        });
}

function closeReceiptModal() {
    const modal = document.getElementById('receiptModal');
    modal.classList.add('hidden');
}

function printReceiptModal() {
    const receiptContent = document.getElementById('receiptContent');
    printHtmlFragment('Preview Resit', receiptContent.innerHTML);
}

// Update button onclick
document.addEventListener('DOMContentLoaded', function() {
    const printButton = document.querySelector('a[href*="/print"]');
    if (printButton) {
        printButton.onclick = function(e) {
            e.preventDefault();
            openPrintModal();
        };
    }
});
</script>

</body>
</html>
