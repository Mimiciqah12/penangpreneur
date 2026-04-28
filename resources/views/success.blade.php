<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful — PenangPreneur Portal</title>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .btn-secondary {
            background: #fff;
            color: var(--text-muted);
            border: 1.5px solid var(--border);
        }

        .btn-secondary:hover {
            color: var(--text);
            border-color: #cbd5e1;
        }

        .btn-lg {
            padding: 0.75rem 1.75rem;
            font-size: 1rem;
        }

        /* ── MAIN ── */
        main {
            flex: 1;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1e40af 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3.5rem 1.5rem;
        }

        /* Background pattern matching hero */
        main::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 15% 60%, rgba(59,130,246,0.18) 0%, transparent 50%),
                radial-gradient(circle at 85% 20%, rgba(30,64,175,0.22) 0%, transparent 40%),
                linear-gradient(45deg, transparent 48%, rgba(255,255,255,0.015) 49%, rgba(255,255,255,0.015) 51%, transparent 52%);
            background-size: 100% 100%, 100% 100%, 40px 40px;
            pointer-events: none;
        }

        /* ── SUCCESS CARD ── */
        .success-card {
            position: relative;
            width: 100%;
            max-width: 40rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            text-align: center;
        }

        /* Blue top accent bar matching the hero style */
        .success-card::before {
            content: '';
            display: block;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), #3b82f6, var(--accent));
        }

        .success-card-body {
            padding: 2.25rem 2rem 2rem;
        }

        @media (min-width: 640px) {
            .success-card-body { padding: 2.75rem 3rem 2.5rem; }
        }

        /* ── ICON ── */
        .success-icon-wrap {
            width: 5rem;
            height: 5rem;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            background: #ecfdf5;
            border: 1.5px solid #6ee7b7;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .success-icon-wrap svg {
            color: #059669;
        }

        /* Subtle pulse ring */
        .success-icon-wrap::after {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            border: 1.5px solid #a7f3d0;
            animation: ring-pulse 2.5s ease-out infinite;
        }

        @keyframes ring-pulse {
            0%   { opacity: 0.9; transform: scale(1); }
            100% { opacity: 0; transform: scale(1.35); }
        }

        /* ── EYEBROW ── */
        .success-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #ecfdf5;
            border: 1px solid #6ee7b7;
            border-radius: 999px;
            padding: 0.25rem 0.8rem 0.25rem 0.5rem;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #059669;
            margin-bottom: 1rem;
        }

        .success-eyebrow-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #34d399;
        }

        /* ── HEADING ── */
        .success-card h1 {
            font-family: var(--serif);
            font-size: clamp(1.9rem, 4vw, 2.5rem);
            font-weight: 600;
            letter-spacing: 0.01em;
            line-height: 1.2;
            color: var(--text);
            margin-bottom: 0.7rem;
        }

        .success-card h1 em {
            font-style: italic;
            color: var(--accent);
        }

        .lead {
            color: var(--text-muted);
            font-size: 0.9875rem;
            max-width: 30rem;
            margin: 0 auto 1.75rem;
            line-height: 1.7;
        }

        /* ── REFERENCE BOX ── */
        .ref-box {
            background: var(--accent-soft);
            border: 1px solid #bfdbfe;
            border-radius: var(--radius);
            padding: 1.1rem 1.25rem;
            margin: 0 auto 0.9rem;
            max-width: 22rem;
        }

        .ref-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 0.3rem;
        }

        .ref-number {
            font-family: var(--serif);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent);
            letter-spacing: 0.03em;
        }

        /* ── NOTE ── */
        .note {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-bottom: 1.75rem;
        }

        .note svg { flex-shrink: 0; color: var(--text-light); }

        /* ── DIVIDER ── */
        .divider {
            border: 0;
            border-top: 1px solid var(--border);
            margin-bottom: 1.5rem;
        }

        /* ── ACTIONS ── */
        .actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
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
            .footer-top { grid-template-columns: 1.5fr 1fr 1fr; }
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

        @media (max-width: 640px) {
            .top-bar-contacts { gap: 0.4rem 1rem; }
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
                <a href="{{ url('/') }}#contact" class="nav-text">Contact</a>
                <a href="{{ route('register') }}" class="btn btn-primary">
                    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Register
                </a>
            </nav>
        </div>
    </header>

    <main>
        <section class="success-card" aria-labelledby="success-heading">
            <div class="success-card-body">

                <div class="success-icon-wrap" aria-hidden="true">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div class="success-eyebrow">
                    <span class="success-eyebrow-dot"></span>
                    Submission confirmed
                </div>

                <h1 id="success-heading">Registration <em>Successful</em></h1>
                <p class="lead">
                    Thank you{{ session('full_name') ? ', ' . session('full_name') : '' }}. Your business information has been submitted and will be reviewed by the relevant agency.
                </p>

                <div class="ref-box">
                    <p class="ref-label">Reference Number</p>
                    <p class="ref-number">{{ session('reference_number') }}</p>
                </div>

                <p class="note">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    A confirmation email has been sent to your inbox.
                </p>

                <hr class="divider">

                <div class="actions">
                    <a href="{{ route('register') }}" class="btn btn-secondary">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Submit Another
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Back to Home
                    </a>
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
                        <li><a href="{{ url('/') }}#contact">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <div class="footer-col-title">Contact</div>
                    <ul class="footer-links">
                        <li><a href="tel:+6046505135">+604-650 5135</a></li>
                        <li><a href="mailto:info@penangpreneur.gov.my">info@penangpreneur.gov.my</a></li>
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

</body>
</html>