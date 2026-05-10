<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>BMD - Borang Maklumat Diri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    <style>
        @media print {
            body {
                background-color: white;
            }
            nav, footer {
                display: none !important;
            }
            main {
                padding: 0;
            }
            .rounded-\[32px\] {
                border: none;
                box-shadow: none;
                padding: 0;
            }
            .flex.flex-col.gap-3.sm\:flex-row.sm\:items-center.sm\:justify-between {
                display: none;
            }
            .no-print {
                display: none !important;
            }
            .mt-6 {
                display: none;
            }
            .bg-white {
                background-color: white;
            }
            .grid.gap-6 {
                page-break-inside: avoid;
            }
            .grid.gap-6.sm\:grid-cols-2 {
                page-break-inside: avoid;
            }
        }

        /* Dark Mode Styles */
        html.dark body {
            background-color: #0f172a;
            color: #f1f5f9;
        }

        html.dark .rounded-\[32px\].bg-white {
            background-color: #1e293b;
            border-color: #334155;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        html.dark .text-orange-500 {
            color: #fb923c;
        }

        html.dark .text-slate-900,
        html.dark h1.text-slate-900,
        html.dark h2.text-slate-900,
        html.dark h3.text-slate-900 {
            color: #f1f5f9;
        }

        html.dark .text-slate-600 {
            color: #cbd5e1;
        }

        html.dark .bg-slate-50,
        html.dark .rounded-\[32px\].bg-slate-50 {
            background-color: #0f172a;
            border-color: #334155;
        }

        html.dark .border-slate-200,
        html.dark .border-slate-300 {
            border-color: #334155;
        }

        html.dark .bg-emerald-50 {
            background-color: rgba(5, 150, 105, 0.1);
            border-color: #10b981;
        }

        html.dark .text-emerald-700 {
            color: #6ee7b7;
        }

        html.dark input[type="text"],
        html.dark input[type="email"],
        html.dark input[type="number"],
        html.dark input[type="date"],
        html.dark select,
        html.dark textarea {
            background-color: #1e293b;
            border-color: #334155;
            color: #f1f5f9;
        }

        html.dark input[type="text"]:focus,
        html.dark input[type="email"]:focus,
        html.dark input[type="number"]:focus,
        html.dark input[type="date"]:focus,
        html.dark select:focus,
        html.dark textarea:focus {
            background-color: #1e293b;
            border-color: #fb923c;
            box-shadow: 0 0 0 2px rgba(251, 146, 60, 0.1);
        }

        html.dark input[type="text"]::placeholder,
        html.dark input[type="email"]::placeholder,
        html.dark input[type="number"]::placeholder,
        html.dark input[type="date"]::placeholder,
        html.dark select::placeholder {
            color: #64748b;
        }

        html.dark input[readonly] {
            background-color: #0f172a;
            color: #94a3b8;
        }

        html.dark .text-sm.font-semibold.text-slate-700 {
            color: #e2e8f0;
        }

        html.dark .text-xs.text-rose-600 {
            color: #fca5a5;
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

        html.dark .bg-blue-500 {
            background-color: #3b82f6;
        }

        html.dark .hover\:bg-blue-600:hover {
            background-color: #2563eb;
        }

        html.dark .bg-emerald-500 {
            background-color: #10b981;
        }

        html.dark .hover\:bg-emerald-600:hover {
            background-color: #059669;
        }

        html.dark .text-white {
            color: #ffffff;
        }

        html.dark .shadow-lg {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.4);
        }

        html.dark .bg-white {
            background-color: #1e293b;
            border-color: #334155;
        }

        html.dark select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%2364748b' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        html.dark select option {
            background-color: #1e293b;
            color: #f1f5f9;
        }

        html.dark .border-t.border-slate-200 {
            border-top-color: #334155;
        }

        html.dark .pt-6 {
            color: #f1f5f9;
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-900">

@include('layouts.navpelajar')

<main class="max-w-6xl mx-auto px-4 py-8">
    <div class="rounded-[32px] bg-white p-8 shadow-sm border border-slate-200">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-orange-500">BMD</p>
                <h1 class="text-3xl font-semibold text-slate-900">Borang Maklumat Diri</h1>
                @if(isset($event))
                    <p class="mt-2 text-sm text-slate-600">Event: {{ $event->nama_event }} pada {{ $event->tarikh_event?->format('d/m/Y') }}</p>
                @endif
            </div>
            <a href="{{ route('pelajar.senarainama', ['pelajar_id' => $pelajar->id]) }}" class="inline-flex items-center rounded-full border border-slate-300 bg-slate-50 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Kembali</a>
        </div>

        @if(session('success'))
            <div class="mt-6 rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-700 shadow-sm">{{ session('success') }}</div>
        @endif

        <form action="{{ route('pelajar.updatebmd', $pelajar->id) }}" method="POST" class="mt-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="rounded-[32px] border border-slate-300 bg-slate-50 p-6">
                <div class="text-center space-y-1">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-600">BORANG PERMOHONAN & TEMUDUGA</p>
                    <h2 class="text-2xl font-semibold uppercase tracking-[0.15em] text-slate-900">Borang Permohonan dan Temu Duga</h2>
                </div>
            </div>

            <div class="rounded-[32px] border border-slate-300 bg-white p-6 space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-600">1. Maklumat Pemohon</p>
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <label class="block">
                        <span class="mb-2 block text-sm font-semibold text-slate-700">Tarikh Pendaftaran</span>
                    <input type="date" name="tarikh_pendaftaran" value="{{ old('tarikh_pendaftaran', $pelajar?->tarikh_pendaftaran?->format('Y-m-d')) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100" required>
                    @error('tarikh_pendaftaran') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. Reff/ Nama Staff</span>
                    <input type="text" name="noreff" value="{{ old('noreff', $pelajar?->noreff) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('noreff') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
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
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Status Perkahwinan</span>
                    <select name="status_perkahwinan" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
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
                <input type="text" name="nama_pelajar" value="{{ old('nama_pelajar', $pelajar?->nama_pelajar) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100" required>
                @error('nama_pelajar') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. IC</span>
                    <input type="text" name="ic_pelajar" value="{{ old('ic_pelajar', $pelajar?->ic_pelajar) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100" required>
                    @error('ic_pelajar') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">SPM Credit</span>
                    <input type="number" step="0.01" name="spm_credit" value="{{ old('spm_credit', $pelajar?->spm_credit) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('spm_credit') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <label class="block">
                <span class="mb-2 block text-sm font-semibold text-slate-700">Email</span>
                <input type="email" name="email" value="{{ old('email', $pelajar?->email) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                @error('email') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <div class="border-t border-slate-200 pt-6">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-600">2. Maklumat Alamat</p>
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
                    <input type="text" name="postcode" value="{{ old('postcode', $pelajar?->postcode) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100" placeholder="e.g., 50000">
                    @error('postcode') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

                <div class="border-t border-slate-200 pt-6">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-600">3. Maklumat Bapa & Ibu</p>
                </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Bapa</span>
                    <input type="text" name="nama_bapa" value="{{ old('nama_bapa', $pelajar?->nama_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('nama_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">IC Bapa</span>
                    <input type="text" name="ic_bapa" value="{{ old('ic_bapa', $pelajar?->ic_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('ic_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-3">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. Telefon Bapa</span>
                    <input type="text" name="no_tel_bapa" value="{{ old('no_tel_bapa', $pelajar?->no_tel_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('no_tel_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Pekerjaan Bapa</span>
                    <input type="text" name="pekerjaan_bapa" value="{{ old('pekerjaan_bapa', $pelajar?->pekerjaan_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('pekerjaan_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Pendapatan Bapa</span>
                    <input type="text" name="pendapatan_bapa" value="{{ old('pendapatan_bapa', $pelajar?->pendapatan_bapa) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('pendapatan_bapa') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Nama Ibu</span>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $pelajar?->nama_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('nama_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">IC Ibu</span>
                    <input type="text" name="ic_ibu" value="{{ old('ic_ibu', $pelajar?->ic_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('ic_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-3">
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">No. Telefon Ibu</span>
                    <input type="text" name="no_tel_ibu" value="{{ old('no_tel_ibu', $pelajar?->no_tel_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('no_tel_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Pekerjaan Ibu</span>
                    <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $pelajar?->pekerjaan_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('pekerjaan_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-semibold text-slate-700">Pendapatan Ibu</span>
                    <input type="text" name="pendapatan_ibu" value="{{ old('pendapatan_ibu', $pelajar?->pendapatan_ibu) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                    @error('pendapatan_ibu') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
                </label>
            </div>

            <label class="block">
                <span class="mb-2 block text-sm font-semibold text-slate-700">Jumlah Tanggungan</span>
                <input type="number" name="jumlah_tanggungan" min="0" value="{{ old('jumlah_tanggungan', $pelajar?->jumlah_tanggungan ?? 0) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                @error('jumlah_tanggungan') <p class="mt-2 text-xs text-rose-600">{{ $message }}</p> @enderror
            </label>

            <div class="border-t border-slate-200 pt-6">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-600">4. Kursus Dipilih</p>
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
                    <a href="{{ route('pelajar.senarainama', ['pelajar_id' => $pelajar->id]) }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-slate-50 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Batal</a>
                </div>

                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-orange-600">Simpan Maklumat</button>
            </div>
        </div>
        </form>

        <!-- Temu Duga / Pembayaran Buttons -->
        <div class="mt-6 flex justify-center gap-4 no-print">
            <a href="{{ route('pelajar.welcome', $pelajar->id) }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-blue-500 px-8 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-blue-600">
                <i class="fas fa-play"></i> Mulakan Temu Duga
            </a>
            
            @if($pelajar->kod_institusi && $pelajar->kod_kursus)
                <a href="{{ route('pelajar.pembayaran', $pelajar->id) }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-emerald-500 px-8 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-emerald-600">
                    <i class="fas fa-money-bill-wave"></i> Teruskan ke Pembayaran
                </a>
            @endif
        </div>
    </div>
</main>

@if(request()->query('print') && isset($pelajar))
    <script>window.print();</script>
@endif

@include('components.social-float')
@include('layouts.footer-pelajar')

</body>
</html>
