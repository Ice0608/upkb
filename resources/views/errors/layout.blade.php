@php
    $statusCode = $statusCode ?? '500';
    $title = $title ?? 'Sistem Tidak Dapat Dipaparkan';
    $message = $message ?? 'Kami sedang mengalami gangguan sementara. Sila cuba sebentar lagi.';
    $eyebrow = $eyebrow ?? 'SMART Education Society';
    $primaryLabel = $primaryLabel ?? 'Kembali ke Laman Utama';
    $primaryUrl = $primaryUrl ?? url('/');
    $secondaryLabel = $secondaryLabel ?? null;
    $secondaryUrl = $secondaryUrl ?? null;
@endphp
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="icon" type="image/png" href="{{ asset('images/icon/seslogoo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>{{ $statusCode }} - {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --error-bg: #080b12;
            --error-panel: rgba(15, 23, 42, 0.82);
            --error-line: rgba(251, 146, 60, 0.24);
            --error-text: #f8fafc;
            --error-muted: #94a3b8;
            --error-accent: #f97316;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at 18% 18%, rgba(249, 115, 22, 0.22), transparent 22rem),
                radial-gradient(circle at 84% 16%, rgba(59, 130, 246, 0.14), transparent 24rem),
                radial-gradient(circle at 56% 92%, rgba(168, 85, 247, 0.16), transparent 24rem),
                var(--error-bg);
            color: var(--error-text);
        }

        .error-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .error-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.045) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.045) 1px, transparent 1px);
            background-size: 56px 56px;
            mask-image: radial-gradient(circle at center, black, transparent 72%);
            pointer-events: none;
        }

        .error-card {
            width: min(100%, 920px);
            position: relative;
            border: 1px solid var(--error-line);
            border-radius: 32px;
            background: linear-gradient(145deg, var(--error-panel), rgba(2, 6, 23, 0.86));
            box-shadow: 0 34px 90px rgba(0, 0, 0, 0.46), inset 0 1px 0 rgba(255, 255, 255, 0.08);
            overflow: hidden;
        }

        .error-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.09), transparent 42%),
                radial-gradient(circle at top right, rgba(249, 115, 22, 0.2), transparent 28rem);
            pointer-events: none;
        }

        .error-content {
            position: relative;
            display: grid;
            gap: 2rem;
            padding: clamp(2rem, 5vw, 4.5rem);
        }

        .error-brand {
            display: inline-flex;
            align-items: center;
            gap: 0.85rem;
            color: #fed7aa;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.28em;
            text-transform: uppercase;
        }

        .error-logo {
            display: inline-flex;
            width: 3.25rem;
            height: 3.25rem;
            align-items: center;
            justify-content: center;
            border-radius: 1.2rem;
            border: 1px solid rgba(251, 146, 60, 0.28);
            background: rgba(255, 247, 237, 0.08);
        }

        .error-logo img {
            width: 2.25rem;
            height: 2.25rem;
            object-fit: contain;
        }

        .error-code {
            font-size: clamp(4.5rem, 16vw, 9rem);
            line-height: 0.85;
            font-weight: 900;
            letter-spacing: -0.08em;
            color: transparent;
            -webkit-text-stroke: 1px rgba(255, 237, 213, 0.54);
            text-shadow: 0 0 40px rgba(249, 115, 22, 0.28);
        }

        .error-title {
            margin: 0;
            max-width: 760px;
            font-size: clamp(2.15rem, 5vw, 4.4rem);
            line-height: 0.98;
            letter-spacing: -0.045em;
        }

        .error-message {
            margin: 0;
            max-width: 680px;
            color: var(--error-muted);
            font-size: clamp(1rem, 2vw, 1.18rem);
            line-height: 1.8;
        }

        .error-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.85rem;
        }

        .error-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.65rem;
            min-height: 3rem;
            border-radius: 999px;
            padding: 0.9rem 1.3rem;
            font-weight: 800;
            text-decoration: none;
            transition: transform 0.22s ease, border-color 0.22s ease, background 0.22s ease;
        }

        .error-button:hover {
            transform: translateY(-2px);
        }

        .error-button-primary {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
            box-shadow: 0 18px 34px rgba(249, 115, 22, 0.28);
        }

        .error-button-secondary {
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(15, 23, 42, 0.5);
            color: #e2e8f0;
        }

        .error-note {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
            color: #64748b;
            font-size: 0.86rem;
        }

        .error-note span {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            border-radius: 999px;
            border: 1px solid rgba(148, 163, 184, 0.18);
            background: rgba(15, 23, 42, 0.52);
            padding: 0.55rem 0.8rem;
        }

        @media (max-width: 640px) {
            .error-shell {
                padding: 1rem;
            }

            .error-actions {
                flex-direction: column;
            }

            .error-button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <main class="error-shell">
        <div class="error-grid" aria-hidden="true"></div>
        <section class="error-card" aria-labelledby="error-title">
            <div class="error-content">
                <div class="error-brand">
                    <span class="error-logo">
                        <img src="{{ asset('images/icon/seslogoo.png') }}" alt="SES">
                    </span>
                    <span>{{ $eyebrow }}</span>
                </div>

                <div class="error-code">{{ $statusCode }}</div>

                <div>
                    <h1 id="error-title" class="error-title">{{ $title }}</h1>
                    <p class="error-message">{{ $message }}</p>
                </div>

                <div class="error-actions">
                    <a href="{{ $primaryUrl }}" class="error-button error-button-primary">
                        <i class="fas fa-house"></i>
                        {{ $primaryLabel }}
                    </a>

                    @if($secondaryLabel && $secondaryUrl)
                        <a href="{{ $secondaryUrl }}" class="error-button error-button-secondary">
                            <i class="fas fa-arrow-rotate-left"></i>
                            {{ $secondaryLabel }}
                        </a>
                    @endif
                </div>

                <div class="error-note">
                    <span><i class="fas fa-shield-halved"></i> Kod ralat: {{ $statusCode }}</span>
                    <span><i class="fas fa-clock"></i> {{ now()->format('d/m/Y h:i A') }}</span>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
