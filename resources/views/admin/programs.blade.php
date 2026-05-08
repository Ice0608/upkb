<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Admin Programs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* ── FADE-IN ANIMATION ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up {
            opacity: 0;
            animation: fadeUp 0.55s ease forwards;
        }
        .fade-up-1 { animation-delay: 0.05s; }
        .fade-up-2 { animation-delay: 0.15s; }
        .fade-up-3 { animation-delay: 0.25s; }

        /* ── HERO ── */
        .hero-admin {
            background: linear-gradient(135deg, #ea580c 0%, #f97316 50%, #fb923c 100%);
            position: relative;
            overflow: hidden;
            border-radius: 1.75rem;
        }
        .hero-admin::before {
            content: '';
            position: absolute;
            top: -3rem; right: -3rem;
            width: 16rem; height: 16rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255,255,255,0.18), transparent 65%);
            pointer-events: none;
        }
        .hero-admin::after {
            content: '';
            position: absolute;
            bottom: -2rem; left: 30%;
            width: 10rem; height: 10rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255,255,255,0.1), transparent 65%);
            pointer-events: none;
        }

        /* ── STAT CHIP ── */
        .stat-chip {
            background: rgba(255,255,255,0.18);
            border: 1px solid rgba(255,255,255,0.28);
            border-radius: 999px;
            padding: 0.35rem 1rem;
            font-size: 0.78rem;
            font-weight: 600;
            color: #fff;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            backdrop-filter: blur(6px);
        }

        /* ── PROGRAM CARD ── */
        .prog-card {
            background: #fff;
            border: 1px solid rgba(15,23,42,0.07);
            border-radius: 1.5rem;
            box-shadow: 0 2px 16px rgba(15,23,42,0.06);
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.23,1,0.32,1),
                        box-shadow 0.3s ease,
                        border-color 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .prog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(249,115,22,0.13), 0 4px 12px rgba(15,23,42,0.07);
            border-color: rgba(249,115,22,0.3);
        }
        .prog-card-top {
            padding: 1.75rem 1.75rem 1rem;
            flex: 1;
        }
        .prog-card-footer {
            padding: 1rem 1.75rem 1.5rem;
            border-top: 1px solid rgba(15,23,42,0.06);
            background: #fafafa;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex-wrap: wrap;
        }
        .prog-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 0.9rem;
            background: rgba(249,115,22,0.1);
            color: #f97316;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            flex-shrink: 0;
        }
        .prog-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.05rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }
        .prog-desc-short {
            font-size: 0.82rem;
            color: rgba(15,23,42,0.52);
            line-height: 1.6;
        }
        .prog-desc-full {
            display: none;
            font-size: 0.82rem;
            color: rgba(15,23,42,0.52);
            line-height: 1.6;
            margin-top: 0.4rem;
        }
        .prog-desc-full.open { display: block; }
        .read-more-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.75rem;
            font-weight: 700;
            color: #f97316;
            padding: 0;
            margin-top: 0.35rem;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: color 0.2s;
        }
        .read-more-btn:hover { color: #ea580c; }

        /* ── ACTION BUTTONS ── */
        .btn-explore {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: linear-gradient(120deg, #f97316, #ea580c);
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 999px;
            padding: 0.45rem 1rem;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 12px rgba(249,115,22,0.28);
        }
        .btn-explore:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(249,115,22,0.38);
        }
        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(15,23,42,0.06);
            color: #475569;
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 999px;
            padding: 0.45rem 1rem;
            text-decoration: none;
            border: 1px solid rgba(15,23,42,0.08);
            transition: background 0.2s, color 0.2s;
        }
        .btn-edit:hover { background: rgba(15,23,42,0.1); color: #1e293b; }
        .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: none;
            border: none;
            cursor: pointer;
            color: rgba(220,38,38,0.7);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.45rem 0.7rem;
            border-radius: 999px;
            transition: background 0.2s, color 0.2s;
        }
        .btn-delete:hover { background: rgba(220,38,38,0.08); color: #dc2626; }

        /* ── SUCCESS TOAST ── */
        .toast-success {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: #f0fdf4;
            border: 1px solid #86efac;
            color: #166534;
            border-radius: 0.875rem;
            padding: 0.9rem 1.25rem;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body class="bg-slate-50 text-gray-800">
@include('layouts.navadmin')

<main class="max-w-7xl mx-auto px-6 py-10">

    {{-- Toast --}}
    @if(session('success'))
    <div class="toast-success fade-up fade-up-1">
        <i class="fas fa-circle-check text-green-500 text-lg"></i>
        {{ session('success') }}
    </div>
    @endif

    {{-- ── HERO ── --}}
    <div class="hero-admin p-8 md:p-10 mb-10 fade-up fade-up-1">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            <div>
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-orange-100 mb-3">// Pengurusan Sistem</span>
                <h1 class="text-3xl md:text-4xl font-black text-white leading-tight">
                    Urus <span class="underline decoration-white/40 decoration-wavy underline-offset-4">Program</span> UPKB
                </h1>
                <p class="mt-2 text-sm text-orange-100 max-w-md">Tambah, kemaskini atau padam program dengan mudah dari sini.</p>

                <div class="flex flex-wrap gap-2 mt-5">
                    <span class="stat-chip"><i class="fas fa-layer-group"></i> {{ $programs->count() }} Program Aktif</span>
                    <span class="stat-chip"><i class="fas fa-check-circle"></i> Semua Terurus</span>
                </div>
            </div>

            <a href="{{ route('admin.addprogram') }}"
               class="inline-flex items-center gap-2 bg-white text-orange-600 font-bold text-sm px-6 py-3 rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-200 shrink-0">
                <i class="fas fa-plus"></i> Tambah Program
            </a>

        </div>
    </div>

    {{-- ── PROGRAM GRID ── --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($programs as $i => $program)
        <article class="prog-card fade-up" style="animation-delay: {{ 0.08 * ($i % 6) }}s">

            <div class="prog-card-top">
                <div class="prog-icon">
                    <i class="{{ $program->icon }}"></i>
                </div>

                <h2 class="prog-title">{{ $program->jenis_program }}</h2>

                {{-- Short excerpt --}}
                @php $words = explode(' ', $program->info_program); $short = implode(' ', array_slice($words, 0, 18)); $hasMore = count($words) > 18; @endphp
                <p class="prog-desc-short">{{ $short }}{{ $hasMore ? '...' : '' }}</p>

                @if($hasMore)
                <p class="prog-desc-full" id="desc-{{ $program->id }}">{{ $program->info_program }}</p>
                <button class="read-more-btn" onclick="toggleDesc({{ $program->id }}, this)">
                    Baca lebih <i class="fas fa-chevron-down text-[10px]"></i>
                </button>
                @endif
            </div>

            <div class="prog-card-footer">
                <a href="{{ route('admin.institusis', ['jenis' => $program->jenis_program]) }}" class="btn-explore">
                    <i class="fas fa-compass"></i> Jelajah Program
                </a>
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

        </article>
        @endforeach
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
