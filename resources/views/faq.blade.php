<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - FAQ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')

    <style>
        :root {
            --xmb-ease: cubic-bezier(0.22, 1, 0.36, 1);
            --xmb-ease-soft: cubic-bezier(0.16, 1, 0.3, 1);
            --xmb-primary: #ff7a00;
            --xmb-primary-soft: #ffb238;
            --xmb-primary-pale: #ffe1b8;
            --xmb-accent: #ffcf5a;
            --xmb-bg: #f8f4ef;
            --xmb-bg-warm: #fff9f4;
            --xmb-surface: rgba(255, 255, 255, 0.74);
            --xmb-surface-strong: rgba(241, 236, 230, 0.96);
            --xmb-border: rgba(255, 255, 255, 0.76);
            --xmb-border-soft: rgba(28, 28, 30, 0.06);
            --xmb-text-main: #1c1c1e;
            --xmb-text-soft: rgba(28, 28, 30, 0.72);
            --xmb-text-faint: rgba(28, 28, 30, 0.5);
            --xmb-shadow: rgba(27, 29, 35, 0.08);
            --xmb-shadow-strong: rgba(27, 29, 35, 0.14);
            --xmb-glow: rgba(255, 122, 0, 0.28);
            --xmb-glow-strong: rgba(255, 188, 56, 0.38);
        }

        .faq-page {
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
            background: linear-gradient(180deg, var(--xmb-bg-warm) 0%, #f7f2ec 52%, #f1ebe4 100%);
        }

        .faq-page::before,
        .faq-page::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .faq-page::before {
            background:
                radial-gradient(circle at 12% 14%, rgba(255, 122, 0, 0.14), transparent 24%),
                radial-gradient(circle at 85% 16%, rgba(255, 198, 94, 0.16), transparent 20%),
                radial-gradient(circle at 50% 100%, rgba(255, 154, 60, 0.12), transparent 32%),
                repeating-radial-gradient(circle at 0 0, rgba(28, 28, 30, 0.025) 0 1px, transparent 1px 4px);
            opacity: 0.46;
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0.15));
        }

        .faq-page::after {
            inset: auto auto -6rem 50%;
            width: min(80rem, calc(100vw - 1.5rem));
            height: 28rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 184, 63, 0.16), rgba(255, 184, 63, 0) 68%);
            opacity: 0.74;
        }

        .faq-page > * {
            position: relative;
            z-index: 1;
        }

        .faq-wave-layer {
            position: fixed;
            inset: auto -12% -6rem;
            height: 34rem;
            pointer-events: none;
            z-index: 0;
            border-radius: 50% 50% 0 0;
            opacity: 0.34;
            background:
                radial-gradient(circle at 12% 45%, rgba(255, 255, 255, 0.42), transparent 20%),
                linear-gradient(120deg, rgba(255, 214, 163, 0.1) 8%, rgba(255, 154, 60, 0.18) 34%, rgba(255, 203, 103, 0.16) 62%, rgba(255, 255, 255, 0.08) 100%);
            animation: faqWaveDrift 18s linear infinite alternate;
        }

        .faq-wave-layer::before,
        .faq-wave-layer::after {
            content: "";
            position: absolute;
            left: -8%;
            width: 116%;
            border-radius: 48% 52% 0 0;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.22), rgba(255, 154, 60, 0.12), rgba(255, 207, 90, 0.1), rgba(255, 255, 255, 0.04));
        }

        .faq-wave-layer::before {
            bottom: 8rem;
            height: 10rem;
            opacity: 0.26;
            animation: faqWaveSway 12s var(--xmb-ease-soft) infinite alternate;
        }

        .faq-wave-layer::after {
            bottom: 2rem;
            height: 13rem;
            opacity: 0.3;
            animation: faqWaveSway 15s var(--xmb-ease) infinite alternate-reverse;
        }

        .faq-wave-layer-secondary {
            inset: auto -18% -10rem;
            height: 30rem;
            opacity: 0.18;
            transform: scaleX(1.08);
            animation-duration: 24s;
            animation-direction: alternate-reverse;
        }

        .faq-shell {
            padding-top: 2.75rem;
            padding-bottom: 5rem;
        }

        .faq-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 227, 170, 0.48);
            background:
                linear-gradient(90deg, #ff7a00 0%, #ff9924 56%, #ffd24a 100%);
            box-shadow:
                inset 0 1px 0 rgba(255, 250, 236, 0.44),
                0 24px 55px rgba(205, 112, 24, 0.22),
                0 0 46px rgba(255, 177, 60, 0.2);
            animation: faqFloat 6.6s var(--xmb-ease-soft) infinite;
        }

        .faq-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 84% 30%, rgba(255, 249, 235, 0.3), transparent 18%),
                linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.18), transparent 72%),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 14px),
                repeating-linear-gradient(180deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 14px);
            background-size: auto, auto, 8rem 5.8rem, 8rem 5.8rem;
            background-position: center, center, 1.25rem calc(100% - 0.95rem), 1.25rem calc(100% - 0.95rem);
            background-repeat: no-repeat;
            opacity: 0.9;
            pointer-events: none;
        }

        .faq-hero::after {
            content: "";
            position: absolute;
            right: 6%;
            top: -2.25rem;
            width: 12rem;
            height: 12rem;
            border-radius: 50%;
            border: 1px solid rgba(255, 241, 209, 0.22);
            box-shadow:
                0 0 0 1rem rgba(255, 241, 209, 0.08),
                0 0 0 2rem rgba(255, 241, 209, 0.04);
            opacity: 0.92;
            pointer-events: none;
        }

        .faq-hero-eyebrow {
            color: rgba(255, 244, 228, 0.74);
        }

        .faq-hero-title {
            color: #ffffff;
            text-shadow: 0 10px 22px rgba(160, 74, 0, 0.24);
        }

        .faq-hero-copy {
            color: rgba(255, 247, 235, 0.92);
        }

        .faq-track-label {
            color: rgba(170, 93, 18, 0.8);
            letter-spacing: 0.38em;
            text-transform: uppercase;
        }

        .faq-track {
            position: relative;
            display: grid;
            gap: 1.4rem;
        }

        .faq-track::before {
            content: "";
            position: absolute;
            left: 1.25rem;
            right: 1.25rem;
            top: 50%;
            height: 1px;
            background: linear-gradient(90deg, rgba(232, 160, 96, 0.04), rgba(255, 154, 60, 0.26), rgba(255, 207, 90, 0.14), rgba(232, 160, 96, 0.04));
            transform: translateY(-50%);
            z-index: 0;
        }

        .faq-xmb-row {
            position: relative;
            display: grid;
            gap: 1.25rem;
            z-index: 1;
        }

        .faq-card {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 1rem;
            width: 100%;
            min-height: 10rem;
            padding: 1.4rem;
            border: 1px solid rgba(255, 255, 255, 0.68);
            border-radius: 2rem;
            text-align: left;
            color: var(--xmb-text-main);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.82), rgba(255, 249, 243, 0.44)),
                linear-gradient(140deg, rgba(243, 237, 231, 0.98), rgba(233, 228, 223, 0.96));
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.96),
                inset 0 -10px 20px rgba(255, 255, 255, 0.14),
                0 16px 34px rgba(85, 53, 24, 0.08),
                0 2px 10px rgba(28, 28, 30, 0.04);
            transform: translateY(0) scale(0.98);
            transform-origin: center;
            opacity: 0.78;
            transition:
                transform 520ms var(--xmb-ease),
                opacity 420ms var(--xmb-ease),
                box-shadow 520ms var(--xmb-ease),
                border-color 420ms var(--xmb-ease),
                background 520ms var(--xmb-ease);
            animation: faqFloat 5.8s var(--xmb-ease-soft) infinite;
            animation-delay: var(--float-delay, 0s);
        }

        .faq-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background:
                radial-gradient(circle at 18% 22%, rgba(255, 255, 255, 0.5), transparent 22%),
                linear-gradient(110deg, rgba(255, 255, 255, 0) 34%, rgba(255, 255, 255, 0.36) 50%, rgba(255, 255, 255, 0) 66%);
            background-size: 100% 100%, 250% 100%;
            background-position: 0 0, -180% 0;
            opacity: 0.78;
            pointer-events: none;
            animation: faqShineSweep 4s linear infinite;
        }

        .faq-card::after {
            content: "";
            position: absolute;
            inset: -12px;
            border-radius: 2.35rem;
            background: radial-gradient(circle, rgba(255, 164, 45, 0.28), rgba(255, 164, 45, 0) 72%);
            opacity: 0;
            transition: opacity 520ms var(--xmb-ease);
            z-index: -1;
        }

        .faq-card:hover,
        .faq-card:focus-visible,
        .faq-card.is-focused {
            transform: translateY(-0.75rem) scale(1.05);
            opacity: 1;
            border-color: rgba(255, 208, 137, 0.56);
            box-shadow:
                inset 0 1px 0 rgba(255, 246, 228, 0.52),
                0 24px 54px rgba(226, 124, 30, 0.24),
                0 0 34px rgba(255, 172, 58, 0.24),
                0 0 90px rgba(255, 214, 163, 0.2);
            background:
                linear-gradient(90deg, rgba(255, 123, 6, 0.94), rgba(255, 155, 33, 0.94) 58%, rgba(255, 211, 81, 0.94));
            outline: none;
        }

        .faq-card:hover::after,
        .faq-card:focus-visible::after,
        .faq-card.is-focused::after {
            opacity: 1;
        }

        .faq-card:hover::before,
        .faq-card:focus-visible::before,
        .faq-card.is-focused::before {
            animation-duration: 2.6s;
            opacity: 0.92;
        }

        .faq-card[data-faq-type="tvet"] {
            border-color: rgba(240, 205, 112, 0.54);
            box-shadow:
                inset 0 1px 0 rgba(255, 248, 220, 0.5),
                inset 0 -10px 20px rgba(255, 255, 255, 0.08),
                0 18px 38px rgba(168, 116, 8, 0.16),
                0 0 28px rgba(212, 175, 55, 0.14);
            background:
                linear-gradient(90deg, rgba(168, 116, 8, 0.9), rgba(212, 175, 55, 0.9) 58%, rgba(241, 207, 99, 0.88));
            opacity: 0.96;
        }

        .faq-card[data-faq-type="tvet"]::after {
            background: radial-gradient(circle, rgba(212, 175, 55, 0.3), rgba(212, 175, 55, 0) 72%);
        }

        .faq-card[data-faq-type="skm"]::after {
            background: radial-gradient(circle, rgba(139, 92, 246, 0.3), rgba(139, 92, 246, 0) 72%);
        }

        .faq-card[data-faq-type="tvet"]:hover,
        .faq-card[data-faq-type="tvet"]:focus-visible,
        .faq-card[data-faq-type="tvet"].is-focused {
            border-color: rgba(240, 205, 112, 0.6);
            box-shadow:
                inset 0 1px 0 rgba(255, 248, 220, 0.52),
                0 24px 54px rgba(168, 116, 8, 0.24),
                0 0 34px rgba(212, 175, 55, 0.24),
                0 0 90px rgba(241, 207, 99, 0.22);
            background:
                linear-gradient(90deg, rgba(154, 106, 7, 0.96), rgba(212, 175, 55, 0.96) 58%, rgba(241, 207, 99, 0.94));
        }

        .faq-card[data-faq-type="skm"]:hover,
        .faq-card[data-faq-type="skm"]:focus-visible,
        .faq-card[data-faq-type="skm"].is-focused {
            border-color: rgba(167, 139, 250, 0.56);
            box-shadow:
                inset 0 1px 0 rgba(245, 243, 255, 0.52),
                0 24px 54px rgba(109, 40, 217, 0.24),
                0 0 34px rgba(139, 92, 246, 0.24),
                0 0 90px rgba(196, 181, 253, 0.2);
            background:
                linear-gradient(90deg, rgba(109, 40, 217, 0.94), rgba(139, 92, 246, 0.94) 58%, rgba(192, 132, 252, 0.94));
        }

        .faq-track.has-focused-item .faq-card:not(.is-focused) {
            opacity: 0.56;
            transform: scale(0.95);
        }

        .faq-card:active {
            transform: translateY(-0.2rem) scale(1.02);
        }

        .faq-icon-chip {
            position: relative;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            width: 4.6rem;
            height: 4.6rem;
            border-radius: 1.65rem;
            color: #ffffff;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.34),
                0 16px 28px rgba(28, 28, 30, 0.12),
                0 0 20px rgba(255, 154, 60, 0.12);
            transition: transform 520ms var(--xmb-ease), box-shadow 520ms var(--xmb-ease);
        }

        .faq-card.is-focused .faq-icon-chip,
        .faq-card:hover .faq-icon-chip,
        .faq-card:focus-visible .faq-icon-chip {
            transform: scale(1.08);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.42),
                0 20px 34px rgba(28, 28, 30, 0.14),
                0 0 34px rgba(255, 154, 60, 0.18);
        }

            .faq-card[data-faq-type="skm"].is-focused .faq-icon-chip,
            .faq-card[data-faq-type="skm"]:hover .faq-icon-chip,
            .faq-card[data-faq-type="skm"]:focus-visible .faq-icon-chip {
                box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.42),
                0 20px 34px rgba(28, 28, 30, 0.14),
                0 0 34px rgba(139, 92, 246, 0.24);
            }

            .faq-card[data-faq-type="tvet"] .faq-card-title,
            .faq-card[data-faq-type="tvet"] .faq-card-copy,
            .faq-card[data-faq-type="tvet"] .faq-card-meta {
                color: rgba(255, 255, 255, 0.96);
            }

            .faq-card[data-faq-type="tvet"] .faq-arrow {
                color: rgba(255, 255, 255, 0.88);
            }

            .faq-card[data-faq-type="tvet"].is-focused .faq-icon-chip,
            .faq-card[data-faq-type="tvet"]:hover .faq-icon-chip,
            .faq-card[data-faq-type="tvet"]:focus-visible .faq-icon-chip {
                box-shadow:
                    inset 0 1px 0 rgba(255, 255, 255, 0.42),
                    0 20px 34px rgba(28, 28, 30, 0.14),
                    0 0 34px rgba(212, 175, 55, 0.24);
            }

        .faq-arrow {
            color: rgba(28, 28, 30, 0.36);
            transition: transform 420ms var(--xmb-ease), opacity 420ms var(--xmb-ease), color 420ms var(--xmb-ease);
        }

        .faq-card.is-focused .faq-arrow,
        .faq-card:hover .faq-arrow,
        .faq-card:focus-visible .faq-arrow {
            color: rgba(255, 255, 255, 0.92);
            transform: translateX(6px);
            opacity: 1;
        }

        .faq-card-meta {
            color: var(--xmb-text-faint);
        }

        .faq-card-title {
            color: var(--xmb-text-main);
            text-shadow: 0 8px 20px rgba(255, 255, 255, 0.16);
        }

        .faq-card-copy {
            color: var(--xmb-text-soft);
        }

        .faq-card.is-focused .faq-card-title,
        .faq-card:hover .faq-card-title,
        .faq-card:focus-visible .faq-card-title,
        .faq-card.is-focused .faq-card-copy,
        .faq-card:hover .faq-card-copy,
        .faq-card:focus-visible .faq-card-copy,
        .faq-card.is-focused .faq-card-meta,
        .faq-card:hover .faq-card-meta,
        .faq-card:focus-visible .faq-card-meta {
            color: rgba(255, 255, 255, 0.96);
        }

        .faq-track-hint {
            color: rgba(122, 81, 44, 0.74);
        }

        .faq-modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 60;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.25rem;
            background: rgba(28, 28, 30, 0.32);
            backdrop-filter: blur(10px);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition:
                opacity 240ms var(--xmb-ease-soft),
                visibility 0ms linear 240ms;
        }

        .faq-modal-backdrop.is-open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transition:
                opacity 240ms var(--xmb-ease-soft),
                visibility 0ms linear 0ms;
        }

        .faq-modal-shell {
            position: relative;
            overflow: hidden;
            width: min(100%, 36rem);
            max-height: min(86vh, 42rem);
            margin: 0 auto;
            border: 1px solid rgba(255, 255, 255, 0.74);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 248, 239, 0.72)),
                linear-gradient(140deg, rgba(255, 214, 163, 0.22), rgba(255, 198, 83, 0.08));
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.94),
                inset 0 14px 28px rgba(255, 255, 255, 0.22),
                0 30px 80px rgba(28, 28, 30, 0.12),
                0 0 40px rgba(255, 154, 60, 0.14);
            color: var(--xmb-text-main);
            opacity: 0;
            transform: translateY(1rem) scale(0.96);
            transition:
                transform 300ms var(--xmb-ease),
                opacity 220ms var(--xmb-ease-soft);
        }

        .faq-modal-backdrop.is-open .faq-modal-shell {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .faq-modal-shell::before,
        .faq-modal-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .faq-modal-shell::before {
            inset: -18% auto auto -8%;
            width: 13rem;
            height: 13rem;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.42), rgba(255, 255, 255, 0) 70%);
            opacity: 0.58;
        }

        .faq-modal-shell::after {
            inset: auto -12% -16% auto;
            width: 14rem;
            height: 14rem;
            border-radius: 50%;
            opacity: 0.36;
            animation: faqModalGlowPulse 5.8s var(--xmb-ease-soft) infinite;
        }

        .faq-modal-shell[data-tone="skm"]::after {
            background: radial-gradient(circle, rgba(139, 92, 246, 0.46), rgba(139, 92, 246, 0) 72%);
        }

        .faq-modal-shell[data-tone="tvet"]::after {
            background: radial-gradient(circle, rgba(245, 180, 33, 0.42), rgba(245, 180, 33, 0) 72%);
        }

        .faq-modal-content {
            position: relative;
            z-index: 1;
            overflow-y: auto;
            max-height: min(72vh, 34rem);
            padding-right: 0.25rem;
        }

        .faq-modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.35rem;
            height: 2.35rem;
            border: 0;
            border-radius: 999px;
            color: rgba(28, 28, 30, 0.6);
            background: rgba(255, 255, 255, 0.7);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.84),
                0 10px 18px rgba(28, 28, 30, 0.08);
            transition:
                transform 180ms var(--xmb-ease),
                color 180ms var(--xmb-ease),
                background 180ms var(--xmb-ease);
            cursor: pointer;
        }

        .faq-modal-close:hover,
        .faq-modal-close:focus-visible {
            color: var(--xmb-text-main);
            background: rgba(255, 255, 255, 0.92);
            transform: translateY(-1px);
            outline: none;
        }

        .faq-modal-kicker {
            display: inline-flex;
            align-items: center;
            padding: 0.45rem 0.8rem;
            border-radius: 999px;
            margin-bottom: 1rem;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(28, 28, 30, 0.64);
            background: rgba(255, 255, 255, 0.58);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.78),
                0 10px 20px rgba(28, 28, 30, 0.06);
        }

        .faq-modal-title {
            font-size: 1.75rem;
            line-height: 1.15;
            letter-spacing: -0.03em;
            margin-bottom: 1rem;
        }

        .faq-modal-lead,
        .faq-modal-paragraph,
        .faq-modal-list {
            position: relative;
            padding: 0;
            border-radius: 0;
            background: transparent;
            box-shadow: none;
            backdrop-filter: none;
        }

        .faq-modal-lead {
            margin-bottom: 1rem;
        }

        .faq-modal-list {
            padding-left: 1.5rem;
        }

        .faq-modal-list li + li {
            margin-top: 0.7rem;
        }

        .faq-modal-paragraph + .faq-modal-paragraph {
            margin-top: 0.95rem;
        }

        .faq-modal-shell h2 {
            color: var(--xmb-text-main);
        }

        .faq-modal-shell p,
        .faq-modal-shell li {
            color: rgba(28, 28, 30, 0.78);
            line-height: 1.9;
            font-weight: 400;
        }

        .faq-modal-shell li::marker {
            color: rgba(255, 122, 0, 0.82);
        }

        @keyframes faqFloat {
            0%,
            100% {
                transform: translateY(0) scale(var(--float-scale, 1));
            }
            50% {
                transform: translateY(-10px) scale(var(--float-scale, 1));
            }
        }

        @keyframes faqWaveDrift {
            0% {
                transform: translate3d(-3%, 0, 0) scaleY(1);
            }
            50% {
                transform: translate3d(2%, -1.5%, 0) scaleY(1.03);
            }
            100% {
                transform: translate3d(6%, 0, 0) scaleY(0.98);
            }
        }

        @keyframes faqWaveSway {
            0% {
                transform: translateX(-1%) scaleY(1);
            }
            100% {
                transform: translateX(3%) scaleY(1.08);
            }
        }

        @keyframes faqModalFloat {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes faqModalGlowPulse {
            0%,
            100% {
                opacity: 0.28;
                transform: scale(0.94);
            }
            50% {
                opacity: 0.46;
                transform: scale(1.04);
            }
        }

        @keyframes faqShineSweep {
            0% {
                background-position: 0 0, -180% 0;
            }
            100% {
                background-position: 0 0, 180% 0;
            }
        }

        @media (min-width: 768px) {
            .faq-shell {
                padding-top: 3.5rem;
            }

            .faq-xmb-row {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                align-items: center;
            }

            .faq-card {
                min-height: 11.5rem;
                padding: 1.7rem 1.8rem;
            }
        }

        @media (max-width: 767px) {
            .faq-track::before {
                left: 0.5rem;
                right: 0.5rem;
                top: auto;
                bottom: 0.35rem;
                transform: none;
            }

            .faq-card {
                border-radius: 1.7rem;
            }

            .faq-modal-shell {
                padding: 1.4rem;
                width: 100%;
            }

            .faq-modal-title {
                font-size: 1.4rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .faq-modal-backdrop,
            .faq-wave-layer,
            .faq-wave-layer::before,
            .faq-wave-layer::after,
            .faq-hero,
            .faq-card,
            .faq-card::before,
            .faq-arrow,
            .faq-modal-shell {
                animation: none;
                transition: none;
            }

            .faq-track.has-focused-item .faq-card:not(.is-focused) {
                filter: none;
            }
        }
        /* ── DARK MODE ── */
        html.dark .faq-page {
            background: linear-gradient(180deg, #0f172a 0%, #1a1a2e 52%, #0f172a 100%);
        }
        html.dark .faq-wave-layer { opacity: 0.12; }
        html.dark .faq-card {
            background:
                linear-gradient(135deg, rgba(30,41,59,0.9), rgba(15,23,42,0.95));
            border-color: rgba(255,255,255,0.08);
            color: #f1f5f9;
        }
        html.dark .faq-card-title { color: #f1f5f9; text-shadow: none; }
        html.dark .faq-card-copy { color: rgba(203,213,225,0.85); }
        html.dark .faq-card-meta { color: rgba(148,163,184,0.8); }
        html.dark .faq-track-label { color: rgba(251,146,60,0.8); }
        html.dark .faq-track-hint { color: rgba(148,163,184,0.7); }
        html.dark .faq-modal-shell {
            background: linear-gradient(135deg, rgba(30,41,59,0.98), rgba(15,23,42,0.98));
            border-color: rgba(255,255,255,0.1);
            color: #f1f5f9;
        }
        html.dark .faq-modal-shell h2 { color: #f1f5f9; }
        html.dark .faq-modal-shell p,
        html.dark .faq-modal-shell li { color: rgba(203,213,225,0.9); }
        html.dark .faq-modal-close {
            background: rgba(30,41,59,0.9);
            color: #cbd5e1;
        }
        html.dark .faq-modal-close:hover { background: rgba(51,65,85,0.9); }
    </style>
</head>
<body class="faq-page text-neutral-900 transition-colors duration-300">
    
    @include('layouts.navigation')

    <div class="faq-wave-layer"></div>
    <div class="faq-wave-layer faq-wave-layer-secondary"></div>

    <main class="faq-shell max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="faq-hero rounded-[2.25rem] px-6 py-8 sm:px-8 sm:py-10 mb-12">
            <p class="faq-hero-eyebrow font-medium tracking-[0.38em] uppercase text-xs sm:text-sm">Pusat Bantuan</p>
            <h2 class="faq-hero-title mt-4 text-4xl sm:text-5xl lg:text-6xl font-semibold tracking-[-0.05em] max-w-3xl">
                Soalan Lazim (FAQ)
            </h2>
            <p class="faq-hero-copy mt-5 max-w-2xl text-base sm:text-lg leading-8">
                Jawapan kepada pertanyaan yang sering diajukan oleh pelajar dan ibu bapa.
            </p>
        </div>

        <section class="max-w-5xl mx-auto">
            <div class="flex items-center justify-between gap-4 mb-5">
                <p class="faq-track-label text-xs sm:text-sm">Pusat Bantuan</p>
                <p class="faq-track-hint text-xs sm:text-sm">Pilih soalan untuk melihat jawapan penuh</p>
            </div>

            <div class="faq-track" id="faqTrack">
                <div class="faq-xmb-row">
                    <button
                        type="button"
                        data-faq-item
                        data-faq-type="admission"
                        class="faq-card group"
                        style="--float-delay: 0s; --float-scale: 1;"
                        aria-haspopup="dialog"
                        aria-controls="faqModal"
                    >
                        <div class="faq-icon-chip bg-[linear-gradient(135deg,#ff9a3c,#ff7a00)] text-2xl">
                            <i class="fa-solid fa-user-check"></i>
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="faq-card-meta text-[11px] font-semibold uppercase tracking-[0.28em]">Kemasukan</p>
                            <h3 class="faq-card-title text-xl sm:text-2xl font-semibold mt-2 tracking-[-0.03em]">
                                Siapa yang layak memohon program di UPKB?
                            </h3>
                            <p class="faq-card-copy text-sm sm:text-base mt-3 leading-7">
                                Klik untuk lihat penerangan penuh
                            </p>
                        </div>

                        <span class="faq-arrow text-2xl sm:text-[1.7rem]">
                            <i class="fa-solid fa-angle-right"></i>
                        </span>
                    </button>

                    <button
                        type="button"
                        data-faq-item
                        data-faq-type="program"
                        class="faq-card group"
                        style="--float-delay: 0.5s; --float-scale: 1;"
                        aria-haspopup="dialog"
                        aria-controls="faqModal"
                    >
                        <div class="faq-icon-chip bg-[linear-gradient(135deg,#38bdf8,#0ea5e9)] text-2xl">
                            <i class="fa-solid fa-certificate"></i>
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="faq-card-meta text-[11px] font-semibold uppercase tracking-[0.28em]">Program</p>
                            <h3 class="faq-card-title text-xl sm:text-2xl font-semibold mt-2 tracking-[-0.03em]">
                                Apa beza SKM Tahap 1, 2 dan 3?
                            </h3>
                            <p class="faq-card-copy text-sm sm:text-base mt-3 leading-7">
                                Klik untuk lihat penerangan penuh
                            </p>
                        </div>

                        <span class="faq-arrow text-2xl sm:text-[1.7rem]">
                            <i class="fa-solid fa-angle-right"></i>
                        </span>
                    </button>

                    <button
                        type="button"
                        data-faq-item
                        data-faq-type="fees"
                        class="faq-card group"
                        style="--float-delay: 1s; --float-scale: 1;"
                        aria-haspopup="dialog"
                        aria-controls="faqModal"
                    >
                        <div class="faq-icon-chip bg-[linear-gradient(135deg,#34d399,#059669)] text-2xl">
                            <i class="fa-solid fa-wallet"></i>
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="faq-card-meta text-[11px] font-semibold uppercase tracking-[0.28em]">Yuran</p>
                            <h3 class="faq-card-title text-xl sm:text-2xl font-semibold mt-2 tracking-[-0.03em]">
                                Berapa yuran dan ada bantuan kewangan?
                            </h3>
                            <p class="faq-card-copy text-sm sm:text-base mt-3 leading-7">
                                Klik untuk lihat penerangan penuh
                            </p>
                        </div>

                        <span class="faq-arrow text-2xl sm:text-[1.7rem]">
                            <i class="fa-solid fa-angle-right"></i>
                        </span>
                    </button>

                    <button
                        type="button"
                        data-faq-item
                        data-faq-type="application"
                        class="faq-card group"
                        style="--float-delay: 1.3s; --float-scale: 1;"
                        aria-haspopup="dialog"
                        aria-controls="faqModal"
                    >
                        <div class="faq-icon-chip bg-[linear-gradient(135deg,#f97316,#ea580c)] text-2xl">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="faq-card-meta text-[11px] font-semibold uppercase tracking-[0.28em]">Permohonan</p>
                            <h3 class="faq-card-title text-xl sm:text-2xl font-semibold mt-2 tracking-[-0.03em]">
                                Bagaimana proses permohonan program?
                            </h3>
                            <p class="faq-card-copy text-sm sm:text-base mt-3 leading-7">
                                Klik untuk lihat penerangan penuh
                            </p>
                        </div>

                        <span class="faq-arrow text-2xl sm:text-[1.7rem]">
                            <i class="fa-solid fa-angle-right"></i>
                        </span>
                    </button>
                </div>
            </div>
        </section>
    </main>

    <div id="faqModal" class="faq-modal-backdrop fixed inset-0 z-50" aria-hidden="true">
        <div id="modalBox" class="faq-modal-shell rounded-[1.85rem] p-7 relative mx-4" role="dialog" aria-modal="true" aria-labelledby="faqModalTitle" tabindex="-1">
            <button type="button" id="modalCloseButton" class="faq-modal-close" aria-label="Tutup jawapan FAQ">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div id="modalContent"></div>
        </div>
    </div>

    <script>
    const focusableItems = Array.from(document.querySelectorAll('[data-faq-item]'));
    const faqTrack = document.getElementById('faqTrack');
    const modalElement = document.getElementById('faqModal');
    const modalBox = document.getElementById('modalBox');
    const modalContent = document.getElementById('modalContent');
    const modalCloseButton = document.getElementById('modalCloseButton');
    const modalTransitionMs = 240;
    let activeTrigger = null;
    let closeTimerId = null;

    const faqAnswers = {
        admission: `
            <div class="faq-modal-content">
                <div class="faq-modal-kicker">Kemasukan & Kelayakan</div>
                <h2 id="faqModalTitle" class="faq-modal-title font-bold text-neutral-900">
                    Siapa yang layak memohon program di UPKB?
                </h2>

                <ul class="faq-modal-list list-decimal space-y-2 text-neutral-700">
                    <li>Warganegara Malaysia yang berminat dalam latihan kemahiran dan kerjaya praktikal.</li>
                    <li>Lepasan sekolah (contohnya SPM) atau individu bekerja yang ingin tambah kemahiran juga digalakkan memohon.</li>
                    <li>Syarat minimum akademik bergantung pada program dan tahap SKM yang dipilih.</li>
                    <li>Dokumen biasa diperlukan: kad pengenalan, sijil akademik, dan dokumen sokongan lain semasa pendaftaran.</li>
                </ul>
            </div>
        `,
        program: `
            <div class="faq-modal-content">
                <div class="faq-modal-kicker">Program & Pensijilan</div>
                <h2 id="faqModalTitle" class="faq-modal-title font-bold text-neutral-900">
                    Apa beza SKM Tahap 1, 2 dan 3?
                </h2>

                <ul class="faq-modal-list list-decimal space-y-2 text-neutral-700">
                    <li>SKM Tahap 1: asas kemahiran dan pengenalan kepada standard kerja industri.</li>
                    <li>SKM Tahap 2: pengukuhan kompetensi teknikal untuk tugasan operasi.</li>
                    <li>SKM Tahap 3: kemahiran lanjutan, penyelesaian masalah, dan tanggungjawab kerja yang lebih tinggi.</li>
                    <li>Tempoh pengajian berbeza mengikut kursus, biasanya melibatkan pembelajaran teori dan latihan amali.</li>
                </ul>
            </div>
        `,
        fees: `
            <div class="faq-modal-content">
                <div class="faq-modal-kicker">Yuran & Bantuan Kewangan</div>
                <h2 id="faqModalTitle" class="faq-modal-title font-bold text-neutral-900">
                    Berapa yuran dan ada bantuan kewangan?
                </h2>

                <ul class="faq-modal-list list-decimal space-y-2 text-neutral-700">
                    <li>Yuran pendaftaran dan yuran pengajian bergantung kepada program yang dipilih.</li>
                    <li>Pembayaran boleh dibuat secara berperingkat untuk memudahkan pelajar dan ibu bapa.</li>
                    <li>Terdapat pilihan bantuan kewangan, tajaan, atau pinjaman tertakluk kepada syarat semasa.</li>
                    <li>Pasukan pendaftaran boleh terangkan pecahan kos penuh termasuk yuran peperiksaan atau bahan latihan jika berkaitan.</li>
                </ul>
            </div>
        `,
        application: `
            <div class="faq-modal-content">
                <div class="faq-modal-kicker">Proses Permohonan</div>
                <h2 id="faqModalTitle" class="faq-modal-title font-bold text-neutral-900">
                    Bagaimana proses permohonan program?
                </h2>

                <ul class="faq-modal-list list-decimal space-y-2 text-neutral-700">
                    <li>Pilih program yang diminati dan semak syarat kelayakan asas.</li>
                    <li>Lengkapkan borang permohonan dan serahkan dokumen penting seperti kad pengenalan serta sijil akademik.</li>
                    <li>Permohonan akan disemak oleh pihak pentadbiran dalam tempoh yang ditetapkan.</li>
                    <li>Jika layak, calon akan dihubungi untuk langkah seterusnya seperti taklimat, pengesahan tempat, dan pembayaran pendaftaran.</li>
                </ul>
            </div>
        `,
    };

    function setFocusedItem(activeItem) {
        if (!focusableItems.length || !faqTrack) {
            return;
        }

        focusableItems.forEach((item) => {
            const isActive = item === activeItem;
            item.classList.toggle('is-focused', isActive);
            item.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        faqTrack.classList.toggle('has-focused-item', Boolean(activeItem));
    }

    function focusItemByIndex(index) {
        if (!focusableItems.length) {
            return;
        }

        const normalizedIndex = (index + focusableItems.length) % focusableItems.length;
        const nextItem = focusableItems[normalizedIndex];

        nextItem.focus({ preventScroll: true });
        setFocusedItem(nextItem);
    }

    function openModal(type) {
        if (!modalElement || !modalBox || !modalContent || !faqAnswers[type]) {
            return;
        }

        if (closeTimerId) {
            window.clearTimeout(closeTimerId);
            closeTimerId = null;
        }

        activeTrigger = document.activeElement instanceof HTMLElement ? document.activeElement : null;
        modalBox.dataset.tone = type;
        modalContent.innerHTML = faqAnswers[type];
        modalElement.setAttribute('aria-hidden', 'false');
        modalElement.classList.add('is-open');
        document.body.style.overflow = 'hidden';

        window.requestAnimationFrame(() => {
            modalCloseButton?.focus({ preventScroll: true });
        });
    }

    function closeModal() {
        if (!modalElement || !modalBox) {
            return;
        }

        modalElement.classList.remove('is-open');
        modalElement.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';

        closeTimerId = window.setTimeout(() => {
            modalContent.innerHTML = '';
            modalBox.removeAttribute('data-tone');
            activeTrigger?.focus({ preventScroll: true });
            activeTrigger = null;
            closeTimerId = null;
        }, modalTransitionMs);
    }

    if (modalElement) {
        modalElement.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    }

    if (modalCloseButton) {
        modalCloseButton.addEventListener('click', closeModal);
    }

    focusableItems.forEach((item, index) => {
        item.addEventListener('mouseenter', () => setFocusedItem(item));
        item.addEventListener('focus', () => setFocusedItem(item));
        item.addEventListener('click', () => openModal(item.dataset.faqType));

        item.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
                event.preventDefault();
                focusItemByIndex(index + 1);
            }

            if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
                event.preventDefault();
                focusItemByIndex(index - 1);
            }

            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                openModal(item.dataset.faqType);
            }
        });
    });

    if (faqTrack) {
        faqTrack.addEventListener('mouseleave', () => {
            const focusedElement = document.activeElement;
            if (!focusableItems.includes(focusedElement)) {
                setFocusedItem(focusableItems[0] ?? null);
            }
        });
    }

    document.addEventListener('keydown', (event) => {
        if (!modalElement || modalElement.getAttribute('aria-hidden') === 'true') {
            return;
        }

        if (event.key === 'Escape') {
            closeModal();
            return;
        }

        if (event.key !== 'Tab') {
            return;
        }

        const focusableElements = Array.from(
            modalElement.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])')
        ).filter((element) => !element.hasAttribute('disabled'));

        if (!focusableElements.length) {
            event.preventDefault();
            modalBox.focus({ preventScroll: true });
            return;
        }

        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];

        if (event.shiftKey && document.activeElement === firstElement) {
            event.preventDefault();
            lastElement.focus();
        }

        if (!event.shiftKey && document.activeElement === lastElement) {
            event.preventDefault();
            firstElement.focus();
        }
    });

    if (focusableItems.length) {
        setFocusedItem(focusableItems[0]);
    }
    </script>

    @include('components.social-float')
    @include('layouts.footer')

</body>
</html>
