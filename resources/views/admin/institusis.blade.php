<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Admin Institusi</title>
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

        .hero-admin {
            position: relative;
            overflow: hidden;
            border-radius: 1.85rem;
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

        .hero-admin::before,
        .hero-admin::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .hero-admin::before {
            inset: 0;
            background:
                linear-gradient(120deg, rgba(255,255,255,0.08), transparent 42%),
                repeating-linear-gradient(90deg, rgba(255,255,255,0.08) 0 1px, transparent 1px 18px),
                repeating-linear-gradient(180deg, rgba(255,255,255,0.06) 0 1px, transparent 1px 18px);
            opacity: 0.28;
        }

        .hero-admin::after {
            right: -4rem;
            top: -4rem;
            width: 16rem;
            height: 16rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255,255,255,0.2), rgba(255,255,255,0));
            filter: blur(6px);
        }

        .filter-shell {
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 1.7rem;
            background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(248,250,252,0.96));
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        }

        .filter-input,
        .filter-select {
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(255,255,255,0.92);
            color: #0f172a;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.9);
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .filter-input:focus,
        .filter-select:focus {
            border-color: rgba(20, 184, 166, 0.5);
            box-shadow: 0 0 0 4px rgba(45, 212, 191, 0.12);
            outline: none;
        }

        .btn-primary-filter {
            background: linear-gradient(120deg, #0f766e, #14b8a6);
            box-shadow: 0 10px 24px rgba(20, 184, 166, 0.22);
        }

        .btn-primary-filter:hover {
            background: linear-gradient(120deg, #115e59, #0f766e);
        }

        .btn-toggle-filter-active {
            border-color: transparent;
            background: linear-gradient(120deg, #0f766e, #14b8a6);
            color: #ffffff;
            box-shadow: 0 10px 24px rgba(20, 184, 166, 0.2);
        }

        .btn-toggle-filter {
            border-color: rgba(45, 212, 191, 0.38);
            background: rgba(255,255,255,0.92);
            color: #0f766e;
        }

        .btn-toggle-filter:hover {
            background: rgba(236,253,245,0.96);
        }

        .inst-card {
            display: flex;
            height: 100%;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 1.75rem;
            background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(248,250,252,0.96));
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
            transition: transform 0.3s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .inst-card:hover {
            transform: translateY(-6px);
            border-color: rgba(20, 184, 166, 0.24);
            box-shadow: 0 22px 44px rgba(20, 184, 166, 0.13), 0 8px 18px rgba(15, 23, 42, 0.07);
        }

        .inst-card-image {
            position: relative;
            overflow: hidden;
        }

        .inst-card-image::after {
            content: "";
            position: absolute;
            inset: auto 0 0;
            height: 42%;
            background: linear-gradient(180deg, rgba(15,23,42,0), rgba(15,23,42,0.42));
            pointer-events: none;
        }

        .inst-card-badge {
            display: inline-flex;
            width: fit-content;
            align-items: center;
            gap: 0.35rem;
            border-radius: 999px;
            background: rgba(20, 184, 166, 0.08);
            padding: 0.42rem 0.8rem;
            color: #0f766e;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .inst-location {
            color: rgba(15,23,42,0.5);
        }

        .inst-desc {
            color: rgba(15,23,42,0.62);
            line-height: 1.7;
        }

        .inst-card-footer {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-top: auto;
            padding-top: 1.5rem;
        }

        .btn-edit-inst,
        .btn-delete-inst {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 0.62rem 1rem;
            font-size: 0.83rem;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .btn-edit-inst {
            background: rgba(14, 165, 233, 0.08);
            color: #0369a1;
            box-shadow: inset 0 0 0 1px rgba(125, 211, 252, 0.58);
        }

        .btn-edit-inst:hover {
            background: rgba(14, 165, 233, 0.14);
            color: #075985;
        }

        .btn-delete-inst {
            background: rgba(220, 38, 38, 0.05);
            color: rgba(220, 38, 38, 0.82);
            box-shadow: inset 0 0 0 1px rgba(252, 165, 165, 0.52);
        }

        .btn-delete-inst:hover {
            background: rgba(220, 38, 38, 0.1);
            color: #dc2626;
        }

        .empty-state {
            border: 1px dashed rgba(15,23,42,0.14);
            border-radius: 1.5rem;
            background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(248,250,252,0.98));
            padding: 3rem 1.5rem;
            text-align: center;
            color: #64748b;
            box-shadow: 0 12px 28px rgba(15,23,42,0.05);
        }

        body.admin-dark .filter-shell {
            border-color: rgba(148, 163, 184, 0.16);
            background: linear-gradient(180deg, rgba(10, 24, 48, 0.96), rgba(8, 23, 47, 0.92));
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.24);
        }

        body.admin-dark .filter-input,
        body.admin-dark .filter-select {
            border-color: rgba(148, 163, 184, 0.22);
            background: rgba(8, 23, 47, 0.92);
            color: #e2e8f0;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.03);
        }

        body.admin-dark .filter-input::placeholder {
            color: #94a3b8;
        }

        body.admin-dark .filter-select option {
            background: #0b1f3d;
            color: #e2e8f0;
        }

        body.admin-dark .filter-input:focus,
        body.admin-dark .filter-select:focus {
            border-color: rgba(45, 212, 191, 0.45);
            box-shadow: 0 0 0 4px rgba(45, 212, 191, 0.12);
        }

        body.admin-dark .btn-toggle-filter {
            border-color: rgba(45, 212, 191, 0.26);
            background: rgba(8, 23, 47, 0.92);
            color: #99f6e4;
        }

        body.admin-dark .btn-toggle-filter:hover {
            background: rgba(15, 35, 63, 0.96);
        }

        body.admin-dark .inst-card {
            border-color: rgba(148, 163, 184, 0.14);
            background: linear-gradient(180deg, rgba(10, 24, 48, 0.96), rgba(8, 23, 47, 0.94));
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.24);
        }

        body.admin-dark .inst-card:hover {
            border-color: rgba(45, 212, 191, 0.22);
            box-shadow: 0 24px 44px rgba(0, 0, 0, 0.28), 0 0 0 1px rgba(45, 212, 191, 0.08);
        }

        body.admin-dark .inst-card-badge {
            background: rgba(20, 184, 166, 0.12);
            color: #99f6e4;
        }

        body.admin-dark .inst-location {
            color: #a8b5c7;
        }

        body.admin-dark .inst-desc {
            color: #cbd5e1;
        }

        body.admin-dark .btn-edit-inst {
            background: rgba(14, 165, 233, 0.14);
            color: #7dd3fc;
            box-shadow: inset 0 0 0 1px rgba(56, 189, 248, 0.24);
        }

        body.admin-dark .btn-edit-inst:hover {
            background: rgba(14, 165, 233, 0.18);
            color: #bae6fd;
        }

        body.admin-dark .btn-delete-inst {
            background: rgba(220, 38, 38, 0.12);
            color: #fca5a5;
            box-shadow: inset 0 0 0 1px rgba(248, 113, 113, 0.22);
        }

        body.admin-dark .btn-delete-inst:hover {
            background: rgba(220, 38, 38, 0.16);
            color: #fecaca;
        }

        body.admin-dark .empty-state {
            border-color: rgba(148, 163, 184, 0.16);
            background: linear-gradient(180deg, rgba(10, 24, 48, 0.94), rgba(8, 23, 47, 0.92));
            color: #94a3b8;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.22);
        }

        body.admin-dark .bg-white {
            background-color: rgba(10, 24, 48, 0.92) !important;
        }

        body.admin-dark .text-slate-900 {
            color: #f8fafc !important;
        }

        body.admin-dark .text-green-700 {
            color: #bbf7d0 !important;
        }

        body.admin-dark .border-green-200 {
            border-color: rgba(34, 197, 94, 0.22) !important;
        }
    </style>
</head>
<body class="admin-dark">

@include('layouts.navadmin')
    @php
        $adminProgramType = strtolower((string) request('jenis', ''));
        $adminIsTvet = $adminProgramType === 'tvet';
        $adminIsDiploma = $adminProgramType === 'diploma';
        $adminIsSainsKesihatan = $adminProgramType === 'sains kesihatan';
        $adminEntityLabel = $adminIsTvet ? 'Pusat Bertauliah' : 'Institusi';
        $adminEntityLabelLower = strtolower($adminEntityLabel);
    @endphp

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="hero-admin mb-8 p-8 md:p-10 fade-up">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <span class="mb-3 inline-block text-xs font-bold uppercase tracking-widest text-cyan-50/90">// Pengurusan Institusi</span>
                    <h1 class="text-4xl font-bold leading-tight text-white md:text-5xl">Admin {{ $adminEntityLabel }} {{ request('jenis') ? request('jenis') : '' }}</h1>
                    <p class="mt-3 max-w-2xl text-base text-cyan-50/90">Urus semua {{ $adminEntityLabelLower }} di sini. Tambah, kemaskini dan hapus data {{ $adminEntityLabelLower }} dengan lebih kemas dari satu paparan yang jelas.</p>
                </div>
                <a href="{{ route('admin.addinstitusi') }}" class="inline-flex shrink-0 items-center gap-2 rounded-full border border-white/30 bg-white/95 px-6 py-3 text-sm font-bold text-teal-700 shadow-[0_14px_30px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:bg-white hover:shadow-[0_18px_36px_rgba(20,184,166,0.2)]">
                    <i class="fas fa-plus"></i> Tambah {{ $adminEntityLabel }}
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-white p-5 text-green-700 shadow-sm fade-up">
            {{ session('success') }}
        </div>
        @endif

        <div class="filter-shell mb-8 p-4 sm:p-5 fade-up">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center">
            <form method="GET" class="grid w-full grid-cols-1 gap-3 md:grid-cols-4 lg:grid-cols-7">
                <input type="text" name="cari" placeholder="Cari {{ $adminEntityLabel }}..." value="{{ request('cari') }}" class="filter-input col-span-1 w-full rounded-full px-4 py-2.5 text-sm md:col-span-2 lg:col-span-2">

                <select name="jenis" class="filter-select col-span-1 w-full rounded-full px-4 py-2.5 text-sm lg:col-span-2">
                    <option value="">Semua Jenis</option>
                    <option value="TVET" {{ request('jenis') == 'TVET' ? 'selected' : '' }}>TVET</option>
                    <option value="DIPLOMA" {{ request('jenis') == 'DIPLOMA' ? 'selected' : '' }}>DIPLOMA</option>
                    <option value="SAINS KESIHATAN" {{ request('jenis') == 'SAINS KESIHATAN' ? 'selected' : '' }}>SAINS KESIHATAN</option>
                </select>
                
                <select name="negeri" class="filter-select col-span-1 w-full rounded-full px-4 py-2.5 text-sm lg:col-span-2">
                    <option value="">Semua Negeri</option>
                    <option value="Johor" {{ request('negeri') == 'Johor' ? 'selected' : '' }}>Johor</option>
                    <option value="Kedah" {{ request('negeri') == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                    <option value="Kelantan" {{ request('negeri') == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                    <option value="Melaka" {{ request('negeri') == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                    <option value="Negeri Sembilan" {{ request('negeri') == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                    <option value="Pahang" {{ request('negeri') == 'Pahang' ? 'selected' : '' }}>Pahang</option>
                    <option value="Perak" {{ request('negeri') == 'Perak' ? 'selected' : '' }}>Perak</option>
                    <option value="Perlis" {{ request('negeri') == 'Perlis' ? 'selected' : '' }}>Perlis</option>
                    <option value="Pulau Pinang" {{ request('negeri') == 'Pulau Pinang' ? 'selected' : '' }}>Pulau Pinang</option>
                    <option value="Sabah" {{ request('negeri') == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                    <option value="Sarawak" {{ request('negeri') == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                    <option value="Selangor" {{ request('negeri') == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                    <option value="Terengganu" {{ request('negeri') == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
                    <option value="Kuala Lumpur" {{ request('negeri') == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                    <option value="Labuan" {{ request('negeri') == 'Labuan' ? 'selected' : '' }}>Labuan</option>
                    <option value="Putrajaya" {{ request('negeri') == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                </select>

                <button type="submit" class="btn-primary-filter col-span-1 inline-flex w-full items-center justify-center rounded-full px-6 py-2.5 text-sm font-semibold text-white transition lg:w-[9rem]">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>

            </form>

            <form method="GET" class="w-full lg:w-auto lg:flex-shrink-0">
                @if(request('jenis'))
                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                @endif
                @if(request('negeri'))
                    <input type="hidden" name="negeri" value="{{ request('negeri') }}">
                @endif
                @if(request('cari'))
                    <input type="hidden" name="cari" value="{{ request('cari') }}">
                @endif
                <button type="submit" name="kuota" value="{{ request('kuota') ? 0 : 1 }}" class="inline-flex w-full items-center justify-center rounded-full border px-6 py-2.5 text-sm font-semibold transition lg:w-[9rem] {{ request('kuota') ? 'btn-toggle-filter-active' : 'btn-toggle-filter' }}">
                    Kuota
                </button>
            </form>
        </div>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse($institusis as $i => $institusi)
            <article class="inst-card fade-up" style="animation-delay: {{ 0.08 * ($i % 6) }}s">
                <div class="inst-card-image relative h-52 overflow-hidden">
                    <img src="{{ asset($institusi->gambar_institusi) }}" alt="{{ $institusi->nama_institusi }}" class="h-full w-full object-cover">
                </div>
                <div class="flex flex-1 flex-col p-8">
                    <span class="inst-card-badge mb-4"><i class="fas fa-building"></i>{{ $institusi->jenis_institusi }}</span>
                    <h2 class="mb-2 text-2xl font-extrabold text-slate-900">{{ $institusi->nama_institusi }}</h2>
                    <p class="inst-location mb-4 text-sm font-semibold uppercase"><i class="fas fa-map-marker-alt mr-2"></i>{{ $institusi->alamat }}</p>
                    <p class="inst-desc text-sm">{{ Illuminate\Support\Str::limit($institusi->mengenai_institusi, 100) }}</p>
                    <div class="inst-card-footer">
                        <a href="{{ route('admin.editinstitusi', $institusi->id) }}" class="btn-edit-inst">
                            <i class="fas fa-pen-to-square mr-2"></i> Edit
                        </a>
                        <form action="{{ route('admin.deleteinstitusi', $institusi->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this {{ $adminEntityLabelLower }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-inst">
                                <i class="fas fa-trash mr-2"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </article>
            @empty
            <div class="empty-state col-span-3 fade-up">
                Tiada {{ $adminEntityLabelLower }} ditemui.
            </div>
            @endforelse
        </div>
    </section>

    @include('components.social-float')

    @include('layouts.footer-admin')

</body>
</html>
