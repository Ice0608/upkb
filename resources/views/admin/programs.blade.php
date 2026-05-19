<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Admin Program</title>
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
            background:
                radial-gradient(circle at top right, rgba(255,255,255,0.18), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255,255,255,0.10), transparent 22%),
                linear-gradient(135deg, #ea580c 0%, #f97316 52%, #fb923c 100%);
        }

        body.admin-dark .hero-admin {
            background:
                radial-gradient(circle at top right, rgba(255,255,255,0.08), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255,255,255,0.06), transparent 22%),
                linear-gradient(135deg, #1b3256 0%, #12214d 45%, #09182d 100%);
        }

        body.admin-dark .prog-card {
            background: #071a34;
            border-color: rgba(148, 163, 184, 0.18);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
        }

        body.admin-dark .prog-card-footer {
            background: rgba(5, 17, 39, 0.95);
            border-color: rgba(148, 163, 184, 0.10);
        }

        body.admin-dark .prog-card-top,
        body.admin-dark .empty-programs {
            background: transparent;
        }

        body.admin-dark .prog-card-kicker {
            background: rgba(249, 115, 22, 0.12);
            color: #fbbf24;
        }

        body.admin-dark .prog-title {
            color: #f8fafc;
        }

        body.admin-dark .prog-desc-short,
        body.admin-dark .prog-desc-full,
        body.admin-dark .prog-meta {
            color: #cbd5e1;
        }

        body.admin-dark .btn-edit {
            background: rgba(148, 163, 184, 0.08);
            color: #e2e8f0;
            border-color: rgba(148, 163, 184, 0.24);
        }

        body.admin-dark .btn-edit:hover {
            background: rgba(148, 163, 184, 0.14);
            color: #fff;
        }

        body.admin-dark .btn-delete {
            background: rgba(248, 113, 113, 0.1);
            color: #fecaca;
        }

        body.admin-dark .btn-delete:hover {
            background: rgba(248, 113, 113, 0.16);
            color: #f87171;
        }

        .stat-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.24);
            background: rgba(255,255,255,0.16);
            padding: 0.4rem 1rem;
            font-size: 0.78rem;
            font-weight: 700;
            color: #fff;
            backdrop-filter: blur(8px);
        }

        .toast-success {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            border: 1px solid #86efac;
            border-radius: 1rem;
            background: #f0fdf4;
            padding: 0.95rem 1.25rem;
            color: #166534;
            font-size: 0.86rem;
            font-weight: 600;
        }

        .prog-card {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid rgba(15,23,42,0.07);
            border-radius: 1.6rem;
            background: #fff;
            box-shadow: 0 2px 16px rgba(15,23,42,0.06);
            transition: transform 0.3s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .prog-card:hover {
            transform: translateY(-6px);
            border-color: rgba(249,115,22,0.28);
            box-shadow: 0 18px 40px rgba(249,115,22,0.13), 0 4px 12px rgba(15,23,42,0.06);
        }

        .prog-card-top {
            flex: 1;
            padding: 1.6rem 1.6rem 1rem;
        }

        .prog-card-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            margin-bottom: 1rem;
            border-radius: 999px;
            background: rgba(249,115,22,0.08);
            padding: 0.42rem 0.8rem;
            color: #ea580c;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .prog-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 3.15rem;
            height: 3.15rem;
            margin-bottom: 1rem;
            border-radius: 0.95rem;
            background: rgba(249,115,22,0.1);
            color: #f97316;
            font-size: 1.2rem;
        }

        .prog-title {
            margin-bottom: 0.55rem;
            color: #0f172a;
            font-size: 1.08rem;
            font-weight: 800;
            line-height: 1.3;
        }

        .prog-desc-short,
        .prog-desc-full {
            color: rgba(15,23,42,0.56);
            font-size: 0.83rem;
            line-height: 1.65;
        }

        .prog-desc-full {
            display: none;
            margin-top: 0.45rem;
        }

        .prog-desc-full.open {
            display: block;
        }

        .prog-meta {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            margin-top: 1rem;
            color: rgba(15,23,42,0.42);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .read-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            margin-top: 0.45rem;
            padding: 0;
            border: none;
            background: none;
            color: #f97316;
            font-size: 0.75rem;
            font-weight: 700;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .read-more-btn:hover {
            color: #ea580c;
        }

        .prog-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.75rem;
            border-top: 1px solid rgba(15,23,42,0.06);
            background: linear-gradient(180deg, #fafafa 0%, #f8fafc 100%);
            padding: 1rem 1.5rem 1.4rem;
        }

        .prog-card-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.6rem;
        }

        .btn-explore,
        .btn-edit,
        .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .btn-explore {
            background: linear-gradient(120deg, #f97316, #ea580c);
            color: #fff;
            padding: 0.48rem 1rem;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(249,115,22,0.28);
        }

        .btn-explore:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(249,115,22,0.38);
        }

        .btn-edit {
            border: 1px solid rgba(15,23,42,0.08);
            background: rgba(15,23,42,0.05);
            color: #475569;
            padding: 0.48rem 1rem;
            text-decoration: none;
        }

        .btn-edit:hover {
            background: rgba(15,23,42,0.09);
            color: #1e293b;
        }

        .btn-delete {
            border: none;
            background: rgba(220,38,38,0.05);
            color: rgba(220,38,38,0.82);
            padding: 0.48rem 0.95rem;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: rgba(220,38,38,0.1);
            color: #dc2626;
        }

        .empty-programs {
            border: 1px dashed rgba(15,23,42,0.14);
            border-radius: 1.5rem;
            background: #fff;
            padding: 3rem 1.5rem;
            text-align: center;
            color: #64748b;
        }
    </style>
</head>
<body class="admin-dark">
@include('layouts.navadmin')

<main class="max-w-7xl mx-auto px-6 py-10">

    @if(session('success'))
    <div class="toast-success fade-up">
        <i class="fas fa-circle-check text-green-500 text-lg"></i>
        {{ session('success') }}
    </div>
    @endif

    <div class="hero-admin mb-10 p-8 md:p-10 fade-up">
        <div class="relative z-10 flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="mb-3 inline-block text-xs font-bold uppercase tracking-widest text-orange-100">// Pengurusan Sistem</span>
                <h1 class="text-3xl font-black leading-tight text-white md:text-4xl">
                    Urus <span class="underline decoration-white/40 decoration-wavy underline-offset-4">Program</span>
                </h1>
                <p class="mt-2 max-w-md text-sm text-orange-100">Tambah, kemaskini atau padam program dengan lebih kemas dari satu paparan yang jelas.</p>

                <div class="mt-5 flex flex-wrap gap-2">
                    <span class="stat-chip"><i class="fas fa-layer-group"></i> {{ $programs->count() }} Program Aktif</span>
                    <span class="stat-chip"><i class="fas fa-check-circle"></i> Semua Terurus</span>
                </div>
            </div>

            <a href="{{ route('admin.addprogram') }}"
               class="inline-flex shrink-0 items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-orange-600 shadow-lg transition duration-200 hover:-translate-y-1 hover:shadow-xl">
                <i class="fas fa-plus"></i> Tambah Program
            </a>
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($programs as $i => $program)
        <article class="prog-card fade-up" style="animation-delay: {{ 0.08 * ($i % 6) }}s">
            <div class="prog-card-top">
                <div class="prog-card-kicker">
                    <i class="fas fa-layer-group"></i> Program
                </div>

                <div class="prog-icon">
                    <i class="{{ $program->icon }}"></i>
                </div>

                <h2 class="prog-title">{{ $program->jenis_program }}</h2>

                @php
                    $words = explode(' ', $program->info_program);
                    $short = implode(' ', array_slice($words, 0, 18));
                    $hasMore = count($words) > 18;
                @endphp

                <p class="prog-desc-short">{{ $short }}{{ $hasMore ? '...' : '' }}</p>
                <div class="prog-meta">
                    <i class="fas fa-pen-ruler"></i> Info Program
                </div>

                @if($hasMore)
                <p class="prog-desc-full" id="desc-{{ $program->id }}">{{ $program->info_program }}</p>
                <button class="read-more-btn" onclick="toggleDesc({{ $program->id }}, this)">
                    Baca lebih <i class="fas fa-chevron-down text-[10px]"></i>
                </button>
                @endif
            </div>

            <div class="prog-card-footer">
                <a href="{{ route('admin.institusis', ['jenis' => $program->jenis_program]) }}" class="btn-explore">
                    <i class="fas fa-compass"></i> Teroka Program
                </a>

                <div class="prog-card-actions">
                    <a href="{{ route('admin.editprogram', $program->id) }}" class="btn-edit">
                        <i class="fas fa-pen"></i> Edit
                    </a>
                    <form action="{{ route('admin.deleteprogram', $program->id) }}" method="POST" class="inline"
                          onsubmit="return confirm('Padam program ini secara kekal?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            <i class="fas fa-trash-alt"></i> Padam
                        </button>
                    </form>
                </div>
            </div>
        </article>
        @empty
        <div class="empty-programs md:col-span-2 lg:col-span-3">
            <i class="fas fa-folder-open text-3xl text-slate-300"></i>
            <p class="mt-4 text-lg font-semibold text-slate-700">Tiada program direkodkan lagi.</p>
            <p class="mt-2 text-sm">Tambah program pertama untuk mula mengurus kategori kursus.</p>
        </div>
        @endforelse
    </div>

</main>

@include('components.social-float')
@include('layouts.footer-admin')

<script>
function toggleDesc(id, btn) {
    const el = document.getElementById('desc-' + id);
    const short = btn.previousElementSibling;
    const isOpen = el.classList.contains('open');

    el.classList.toggle('open');
    short.style.display = isOpen ? '' : 'none';
    btn.innerHTML = isOpen
        ? 'Baca lebih <i class="fas fa-chevron-down text-[10px]"></i>'
        : 'Tutup <i class="fas fa-chevron-up text-[10px]"></i>';
}
</script>

</body>
</html>

