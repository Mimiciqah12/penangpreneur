<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PenangPreneur Portal — Business Registration</title>
    <meta name="description" content="Official PenangPreneur Portal: register your business securely, submit company and product details for verification.">
    <link rel="canonical" href="{{ url('/') }}">
    <meta name="theme-color" content="#0f172a">

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Source+Sans+3:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --text: #0f172a;
            --text-muted: #475569;
            --text-light: #64748b;
            --border: #e2e8f0;
            --surface: #ffffff;
            --bg: #f1f5f9;
            --brand: #0f172a;
            --brand-hover: #1e293b;
            --accent: #1e40af;
            --accent-2: #1d4ed8;
            --accent-soft: #eff6ff;
            --gold: #b45309;
            --gold-soft: #fef3c7;
            --serif: 'Cormorant Garamond', Georgia, serif;
            --sans: 'Source Sans 3', system-ui, sans-serif;
            --focus: 2px solid #2563eb;
            --focus-offset: 2px;
            --radius: 8px;
            --radius-lg: 16px;
            --max-wide: 72rem;
            --shadow: 0 4px 24px -4px rgba(15,23,42,0.10);
            --shadow-lg: 0 12px 48px -8px rgba(15,23,42,0.18);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
            font-size: 1rem;
            -webkit-font-smoothing: antialiased;
        }

        a:focus-visible, button:focus-visible {
            outline: var(--focus);
            outline-offset: var(--focus-offset);
            border-radius: 4px;
        }

        .wrap {
            width: 100%;
            max-width: var(--max-wide);
            margin: 0 auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        /* ── TOP CONTACT BAR ── */
        .top-bar {
            background: var(--brand);
            color: rgba(255,255,255,0.75);
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.45rem 0;
            letter-spacing: 0.01em;
        }

        .top-bar-inner {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 0.5rem 1.5rem;
        }

        .top-bar-contacts {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem 1.5rem;
            align-items: center;
        }

        .top-bar-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            transition: color 0.15s;
        }

        .top-bar-item:hover { color: #fff; }

        .top-bar-item svg { flex-shrink: 0; opacity: 0.7; }

        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.5);
        }

        .top-bar-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #22c55e;
            display: inline-block;
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        /* ── HEADER ── */
        header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 40;
            box-shadow: 0 1px 0 var(--border), 0 4px 12px -4px rgba(15,23,42,0.06);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 4rem;
            gap: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text);
            text-decoration: none;
        }

        .logo-accent-bar {
            width: 3px;
            align-self: stretch;
            min-height: 2.25rem;
            border-radius: 2px;
            background: linear-gradient(180deg, var(--accent) 0%, #334155 100%);
            opacity: 0.92;
            flex-shrink: 0;
            transition: opacity 0.15s;
        }

        .logo:hover .logo-accent-bar { opacity: 1; }

        .logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.05;
            gap: 0.15rem;
        }

        .logo-primary {
            font-family: var(--serif);
            font-size: 1.35rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            font-feature-settings: "kern" 1;
            transition: color 0.15s;
        }

        .logo:hover .logo-primary { color: var(--accent); }

        .logo-secondary {
            font-family: var(--sans);
            font-size: 0.6875rem;
            font-weight: 600;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 0.75rem 1.25rem;
        }

        .nav-text {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.15s;
        }

        .nav-text:hover { color: var(--text); }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            font-family: var(--sans);
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: var(--radius);
            padding: 0.5rem 1.25rem;
            border: none;
            cursor: pointer;
            transition: all 0.18s ease;
            letter-spacing: 0.01em;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 2px 8px -2px rgba(30,64,175,0.35);
        }

        .btn-primary:hover {
            background: var(--accent-2);
            box-shadow: 0 4px 16px -2px rgba(30,64,175,0.45);
            transform: translateY(-1px);
            color: #fff;
        }

        .btn-outline {
            background: transparent;
            color: var(--accent);
            border: 1.5px solid var(--accent);
        }

        .btn-outline:hover {
            background: var(--accent-soft);
        }

        .btn-lg {
            padding: 0.8rem 1.75rem;
            font-size: 1rem;
            border-radius: var(--radius);
        }

        .btn-xl {
            padding: 0.9rem 2rem;
            font-size: 1.0625rem;
            border-radius: var(--radius);
        }

        /* ── HERO ── */
        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1e40af 100%);
            color: #fff;
        }

        .hero-pattern {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(59,130,246,0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(30,64,175,0.2) 0%, transparent 40%),
                linear-gradient(45deg, transparent 48%, rgba(255,255,255,0.015) 49%, rgba(255,255,255,0.015) 51%, transparent 52%);
            background-size: 100% 100%, 100% 100%, 40px 40px;
            pointer-events: none;
        }

        .hero-grid {
            position: relative;
            display: grid;
            gap: 3rem;
            align-items: center;
            padding: 4rem 0 4.5rem;
        }

        @media (min-width: 900px) {
            .hero-grid {
                grid-template-columns: 1fr;
                max-width: 48rem;
                padding: 5rem 0 5.5rem;
            }
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 999px;
            padding: 0.3rem 0.9rem 0.3rem 0.5rem;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.85);
            margin-bottom: 1.25rem;
        }

        .hero-eyebrow-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #60a5fa;
        }

        .hero h1 {
            font-family: var(--serif);
            font-size: clamp(2.25rem, 5vw, 3.5rem);
            font-weight: 600;
            line-height: 1.15;
            letter-spacing: 0.01em;
            color: #fff;
            margin-bottom: 1.25rem;
        }

        .hero h1 em {
            font-style: italic;
            color: #93c5fd;
        }

        .hero-lead {
            font-size: 1.0625rem;
            color: rgba(255,255,255,0.72);
            max-width: 30rem;
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .hero-cta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            align-items: center;
        }

        .btn-hero {
            background: #fff;
            color: var(--accent);
            font-weight: 700;
            padding: 0.85rem 2rem;
            border-radius: var(--radius);
            font-size: 1rem;
            box-shadow: 0 4px 20px -4px rgba(0,0,0,0.25);
            transition: all 0.18s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-hero:hover {
            background: #f0f9ff;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px -4px rgba(0,0,0,0.3);
        }

        .btn-hero-ghost {
            background: rgba(255,255,255,0.12);
            color: #fff;
            border: 1.5px solid rgba(255,255,255,0.25);
            padding: 0.85rem 1.75rem;
            border-radius: var(--radius);
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.18s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-hero-ghost:hover {
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.4);
        }

        .hero-trust {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.12);
        }

        .hero-trust-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8125rem;
            color: rgba(255,255,255,0.6);
        }

        .hero-trust-item svg { color: #60a5fa; flex-shrink: 0; }

        /* Hero card */


        /* ── CONTACT INFO STRIP ── */
        .contact-strip {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
        }

        .contact-strip-inner {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 0;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem 1.75rem;
            border-right: 1px solid var(--border);
            transition: background 0.15s;
        }

        .contact-item:last-child { border-right: none; }
        .contact-item:hover { background: var(--accent-soft); }

        .contact-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--radius);
            background: var(--accent-soft);
            color: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-label {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 0.2rem;
        }

        .contact-value {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text);
            line-height: 1.3;
        }

        .contact-value a {
            color: inherit;
            text-decoration: none;
        }

        .contact-value a:hover { color: var(--accent); }

        /* ── VALUES ── */
        .value-strip {
            padding: 4rem 0;
            background: var(--surface);
        }

        .section-label {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-family: var(--serif);
            font-size: clamp(1.5rem, 3vw, 2.25rem);
            font-weight: 600;
            color: var(--text);
            letter-spacing: 0.01em;
            line-height: 1.2;
            margin-bottom: 0.75rem;
        }

        .section-lead {
            font-size: 1rem;
            color: var(--text-muted);
            max-width: 36rem;
            line-height: 1.65;
            margin-bottom: 2.5rem;
        }

        .value-grid {
            display: grid;
            gap: 1.25rem;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .value-card {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 1.75rem;
            position: relative;
            overflow: hidden;
            transition: all 0.2s ease;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), #60a5fa);
            opacity: 0;
            transition: opacity 0.2s;
        }

        .value-card:hover {
            border-color: #bfdbfe;
            box-shadow: var(--shadow);
            transform: translateY(-2px);
        }

        .value-card:hover::before { opacity: 1; }

        .value-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius);
            background: var(--accent-soft);
            color: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .value-card h3 {
            font-family: var(--serif);
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 0.5rem;
            letter-spacing: 0.02em;
        }

        .value-card p {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.6;
        }



        /* ── ABOUT ── */
        .about-section {
            background: var(--bg);
            padding: 4rem 0;
            border-top: 1px solid var(--border);
        }

        .about-grid {
            display: grid;
            gap: 3rem;
            align-items: center;
        }

        @media (min-width: 768px) {
            .about-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .about-section p {
            font-size: 0.9375rem;
            color: var(--text-muted);
            line-height: 1.75;
            margin-bottom: 1rem;
        }

        .about-section p:last-child { margin-bottom: 0; }

        .info-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 1.75rem;
            box-shadow: var(--shadow);
        }

        .info-card-title {
            font-family: var(--serif);
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .info-row {
            display: flex;
            gap: 0.75rem;
            align-items: flex-start;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border);
        }

        .info-row:last-child { border-bottom: none; padding-bottom: 0; }
        .info-row:first-of-type { padding-top: 0; }

        .info-row-icon {
            width: 34px;
            height: 34px;
            border-radius: var(--radius);
            background: var(--accent-soft);
            color: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 0.1rem;
        }

        .info-row-label {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 0.2rem;
        }

        .info-row-value {
            font-size: 0.9rem;
            color: var(--text);
            font-weight: 500;
        }

        .info-row-value a {
            color: var(--accent);
            text-decoration: none;
        }

        .info-row-value a:hover { text-decoration: underline; }

        /* ── CTA BANNER ── */
        .cta-banner {
            background: linear-gradient(135deg, var(--accent) 0%, #1d4ed8 100%);
            padding: 3.5rem 0;
        }

        .cta-inner {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            align-items: center;
            justify-content: space-between;
        }

        .cta-text h2 {
            font-family: var(--serif);
            font-size: clamp(1.5rem, 3vw, 2rem);
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .cta-text p {
            font-size: 0.9375rem;
            color: rgba(255,255,255,0.72);
        }

        .cta-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--brand);
            color: rgba(255,255,255,0.6);
            padding: 2.5rem 0 1.5rem;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 1.5rem;
        }

        @media (min-width: 640px) {
            .footer-top {
                grid-template-columns: 1.5fr 1fr 1fr;
            }
        }

        .footer-brand .logo-primary { color: #fff; font-size: 1.25rem; }
        .footer-brand .logo-secondary { color: rgba(255,255,255,0.45); }
        .footer-brand .logo-accent-bar { opacity: 0.6; }

        .footer-desc {
            font-size: 0.8375rem;
            color: rgba(255,255,255,0.45);
            line-height: 1.7;
            margin-top: 0.75rem;
            max-width: 22rem;
        }

        .footer-col-title {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.35);
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .footer-links a {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            transition: color 0.15s;
        }

        .footer-links a:hover { color: #fff; }

        .footer-bottom {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            align-items: center;
            justify-content: space-between;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.35);
        }

        /* ── MOBILE REGISTER BUTTON (floating) ── */
        .mobile-cta {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background: var(--surface);
            border-top: 1px solid var(--border);
            padding: 0.875rem 1.25rem;
            box-shadow: 0 -4px 20px -4px rgba(15,23,42,0.15);
        }

        @media (max-width: 640px) {
            .mobile-cta { display: block; }
            body { padding-bottom: 5rem; }
            .top-bar-contacts { gap: 0.4rem 1rem; }
            .contact-strip-inner { grid-template-columns: 1fr 1fr; }
            .contact-item { padding: 1.1rem 1rem; border-right: none; border-bottom: 1px solid var(--border); }
            .contact-item:nth-child(odd) { border-right: 1px solid var(--border); }
            .contact-item:last-child { border-bottom: none; }
            .hero-grid { padding: 3rem 0 3.5rem; }
        }

        .mobile-cta-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            background: var(--accent);
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            padding: 0.9rem;
            border-radius: var(--radius);
            text-decoration: none;
            box-shadow: 0 4px 16px -4px rgba(30,64,175,0.4);
        }

        /* Hide mobile CTA on large screens */
        @media (min-width: 641px) {
            .mobile-cta { display: none !important; }
        }

        .visually-hidden {
            position: absolute; width: 1px; height: 1px;
            padding: 0; margin: -1px; overflow: hidden;
            clip: rect(0,0,0,0); white-space: nowrap; border: 0;
        }
    </style>
</head>
<body>

    <!-- TOP CONTACT BAR -->
    <div class="top-bar">
        <div class="wrap top-bar-inner">
            <div class="top-bar-contacts">
                <a href="tel:+6046505135" class="top-bar-item">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    +604-650 5135
                </a>
                <a href="mailto:info@penangpreneur.gov.my" class="top-bar-item">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    info@penangpreneur.gov.my
                </a>
                <span class="top-bar-item">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Tingkat 31, KOMTAR, George Town, Penang
                </span>
            </div>
            <div class="top-bar-right">
                <span class="top-bar-dot"></span>
                Portal Active
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header>
        <div class="wrap header-inner">
            <a href="{{ url('/') }}" class="logo" aria-label="PenangPreneur Portal — Home">
                <span class="logo-accent-bar" aria-hidden="true"></span>
                <span class="logo-text">
                    <span class="logo-primary">PenangPreneur</span>
                    <span class="logo-secondary">Portal</span>
                </span>
            </a>
            <nav class="nav-actions" aria-label="Primary">
                <a href="{{ url('/') }}" class="nav-text">Home</a>
                <a href="#contact" class="nav-text">Contact</a>
                <a href="{{ route('register') }}" class="btn btn-primary">
                    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Register
                </a>
            </nav>
        </div>
    </header>

    <main>
        <!-- HERO -->
        <section class="hero" aria-labelledby="hero-heading">
            <div class="hero-pattern" aria-hidden="true"></div>
            <div class="wrap hero-grid">
                <div class="hero-copy">
                    <div class="hero-eyebrow">
                        <span class="hero-eyebrow-dot"></span>
                        Official Business Registration
                    </div>
                    <h1 id="hero-heading">Register your business through a <em>secure, official</em> channel</h1>
                    <p class="hero-lead">
                        Submit your company and product information for departmental review. Approved registrations receive an official reference for future correspondence.
                    </p>
                    <div class="hero-cta">
                        <a href="{{ route('register') }}" class="btn-hero">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            Start Registration
                        </a>
                        <a href="#contact" class="btn-hero-ghost">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            Contact Us
                        </a>
                    </div>
                </div>


            </div>
        </section>

        <!-- CONTACT INFO STRIP -->
        <section id="contact" aria-label="Contact information">
            <div class="contact-strip">
                <div class="wrap" style="padding:0;">
                    <div class="contact-strip-inner">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <div>
                                <div class="contact-label">Organisation</div>
                                <div class="contact-value">Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi & Keterjaminan Makanan dan Keusahawanan</div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <div class="contact-label">Phone</div>
                                <div class="contact-value"><a href="tel:+6046505135">+604-650 5135</a></div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <div class="contact-label">Email</div>
                                <div class="contact-value"><a href="mailto:info@penangpreneur.gov.my">info@penangpreneur.gov.my</a></div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div class="contact-label">Address</div>
                                <div class="contact-value">Tingakat 31, KOMTAR, 10000 George Town, Pulau Pinang</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- VALUE CARDS -->
        <section class="value-strip" aria-labelledby="value-heading">
            <div class="wrap">
                <p class="section-label">Why register with us</p>
                <h2 id="value-heading" class="section-title">Everything you need, in one place</h2>
                <p class="section-lead">A streamlined, official channel for Penang entrepreneurs to register their business and products with the relevant agencies.</p>
                <div class="value-grid">
                    <article class="value-card">
                        <div class="value-icon">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <h3>Secure submission</h3>
                        <p>Structured, paperless submission of company profiles and supporting documents in one place.</p>
                    </article>
                    <article class="value-card">
                        <div class="value-icon">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h3>Officer verification</h3>
                        <p>Applications are reviewed by authorised officers in line with department requirements.</p>
                    </article>
                    <article class="value-card">
                        <div class="value-icon">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        </div>
                        <h3>Official reference</h3>
                        <p>After approval, you receive a reference number for all future correspondence with the department.</p>
                    </article>
                </div>
            </div>
        </section>

<!-- ABOUT + CONTACT CARD -->
        <section class="about-section" aria-labelledby="about-heading">
            <div class="wrap">
                <div class="about-grid">
                    <div>
                        <p class="section-label">About this portal</p>
                        <h2 id="about-heading" class="section-title">Supporting Penang entrepreneurs</h2>
                        <p>This platform supports new business registrations under the department's oversight. It is not intended for updates to existing registrations; those should be handled directly with the department.</p>
                        <p>The portal is maintained by the Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi & Keterjaminan Makanan dan Keusahawanan and serves entrepreneurs across all registered agencies in Pulau Pinang.</p>
                        <div style="margin-top:1.5rem;">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Start your registration</a>
                        </div>
                    </div>
                    <div>
                        <div class="info-card">
                            <div class="info-card-title">📋 Organisation Details</div>
                            <div class="info-row">
                                <div class="info-row-icon">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <div>
                                    <div class="info-row-label">Company / Organisation</div>
                                    <div class="info-row-value">Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi & Keterjaminan Makanan dan Keusahawanan</div>
                                </div>
                            </div>
                            <div class="info-row">
                                <div class="info-row-icon">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <div class="info-row-label">Address</div>
                                    <div class="info-row-value">Tingkat 31, KOMTAR <br>10000 George Town, Pulau Pinang</div>
                                </div>
                            </div>
                            <div class="info-row">
                                <div class="info-row-icon">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <div class="info-row-label">Phone</div>
                                    <div class="info-row-value"><a href="tel:+6046505135">+604-650 5135</a></div>
                                </div>
                            </div>
                            <div class="info-row">
                                <div class="info-row-icon">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <div class="info-row-label">Email</div>
                                    <div class="info-row-value"><a href="mailto:info@penangpreneur.gov.my">info@penangpreneur.gov.my</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="wrap">
            <div class="footer-top">
                <div class="footer-brand">
                    <a href="{{ url('/') }}" class="logo" aria-label="PenangPreneur Portal">
                        <span class="logo-accent-bar" aria-hidden="true"></span>
                        <span class="logo-text">
                            <span class="logo-primary">PenangPreneur</span>
                            <span class="logo-secondary">Portal</span>
                        </span>
                    </a>
                    <p class="footer-desc">Official business registration portal for entrepreneurs in Pulau Pinang. Managed by the Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi & Keterjaminan Makanan Dan Keusahawanan.</p>
                </div>
                <div>
                    <div class="footer-col-title">Quick links</div>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <div class="footer-col-title">Contact</div>
                    <ul class="footer-links">
                        <li><a href="tel:+6046505135">+604-650 5135</a></li>
                        <li><a href="#">Tingkat 31, KOMTAR, 10000 Pulau Pinang.</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <span>&copy; {{ 2026 }} PenangPreneur Portal. All rights reserved.</span>
                <span>Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi & Keterjaminan Makanan Dan Keusahawanan</span>
            </div>
        </div>
    </footer>

    <!-- MOBILE FLOATING CTA -->
    <div class="mobile-cta" aria-label="Mobile registration button">
        <a href="{{ route('register') }}" class="mobile-cta-btn">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Register Your Business — Free
        </a>
    </div>

</body>
</html>