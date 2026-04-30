<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — PenangPreneur Portal</title>
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
            --shadow-sm: 0 1px 3px rgba(15,23,42,0.08);
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

        a:focus-visible, button:focus-visible,
        input:focus-visible, select:focus-visible {
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

        /* ── TOP BAR ── */
        .top-bar {
            background: var(--brand);
            color: rgba(255,255,255,0.75);
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.45rem 0;
        }

        .top-bar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .top-bar-left {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255,255,255,0.45);
            font-size: 0.75rem;
        }

        .top-bar-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #22c55e;
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .top-bar-right a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.35rem;
            transition: color 0.15s;
        }

        .top-bar-right a:hover { color: #fff; }

        .top-bar-logout {
            color: rgba(255,255,255,0.6);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.35rem;
            transition: color 0.15s;
            cursor: pointer;
            background: none;
            border: none;
            font-family: var(--sans);
            font-weight: 500;
            padding: 0;
        }

        .top-bar-logout:hover { color: #fca5a5; }

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

        .logo-text { display: flex; flex-direction: column; line-height: 1.05; gap: 0.15rem; }

        .logo-primary {
            font-family: var(--serif);
            font-size: 1.35rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            transition: color 0.15s;
        }

        .logo:hover .logo-primary { color: var(--accent); }

        .logo-secondary {
            font-size: 0.6875rem;
            font-weight: 600;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .badge-admin {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.3rem 0.85rem;
            border-radius: 999px;
            background: rgba(30,64,175,0.08);
            color: var(--accent);
            border: 1px solid rgba(30,64,175,0.22);
        }

        .nav-text {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.15s;
        }

        .nav-text:hover { color: var(--text); }

        /* ── PAGE HERO (mini) ── */
        .page-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1e40af 100%);
            color: #fff;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(59,130,246,0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(30,64,175,0.2) 0%, transparent 40%),
                linear-gradient(45deg, transparent 48%, rgba(255,255,255,0.015) 49%, rgba(255,255,255,0.015) 51%, transparent 52%);
            background-size: 100% 100%, 100% 100%, 40px 40px;
            pointer-events: none;
        }

        .page-hero-inner {
            position: relative;
            padding: 2rem 0 2.5rem;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 999px;
            padding: 0.28rem 0.85rem 0.28rem 0.5rem;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.85);
            margin-bottom: 0.85rem;
        }

        .eyebrow-dot { width: 6px; height: 6px; border-radius: 50%; background: #60a5fa; }

        .page-hero h1 {
            font-family: var(--serif);
            font-size: clamp(1.9rem, 3.5vw, 2.6rem);
            font-weight: 600;
            color: #fff;
            line-height: 1.15;
            margin-bottom: 0.4rem;
        }

        .page-hero h1 em { font-style: italic; color: #93c5fd; }

        .page-hero .lead {
            font-size: 0.9375rem;
            color: rgba(255,255,255,0.65);
        }

        /* ── STATS ── */
        .stats-bar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            box-shadow: 0 2px 8px -2px rgba(15,23,42,0.06);
        }

        .stats-inner {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
        }

        .stat-item {
            padding: 1.25rem 1.5rem;
            border-right: 1px solid var(--border);
            transition: background 0.15s;
        }

        .stat-item:last-child { border-right: none; }
        .stat-item:hover { background: var(--accent-soft); }

        .stat-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 0.3rem;
        }

        .stat-num {
            font-size: 1.85rem;
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -0.02em;
            color: var(--text);
        }

        .stat-num.accent { color: var(--accent); }

        /* ── CONTENT ── */
        .page-body {
            padding: 2.25rem 0 3.5rem;
        }

        /* ── FILTERS ── */
        .filters {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem 1rem;
            align-items: flex-end;
            box-shadow: var(--shadow-sm);
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
            min-width: 11rem;
            flex: 1 1 0;
        }

        .field label {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-light);
        }

        .field input, .field select {
            font-family: var(--sans);
            font-size: 0.875rem;
            color: var(--text);
            background: #f8fafc;
            border-radius: var(--radius);
            border: 1.5px solid var(--border);
            height: 42px;
            padding: 0 0.875rem;
            transition: all 0.15s;
        }

        .field input::placeholder { color: #94a3b8; }

        .field select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.875rem center;
            padding-right: 2.25rem;
        }

        .field input:focus, .field select:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
            background: #fff;
            outline: none;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            font-family: var(--sans);
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: var(--radius);
            height: 42px;
            padding: 0 1.25rem;
            border: none;
            cursor: pointer;
            transition: all 0.18s ease;
        }

        .btn-filter {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 2px 8px -2px rgba(30,64,175,0.35);
        }

        .btn-filter:hover {
            background: var(--accent-2);
            box-shadow: 0 4px 12px -2px rgba(30,64,175,0.4);
            transform: translateY(-1px);
        }

        .btn-reset {
            background: #fff;
            color: var(--text-muted);
            border: 1.5px solid var(--border);
        }

        .btn-reset:hover { color: var(--text); border-color: #cbd5e1; }

        /* ── TABLE CARD ── */
        .table-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .table-head {
            padding: 1.1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--bg);
            gap: 1rem;
            flex-wrap: wrap;
        }

        .table-title {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--text-light);
        }

        .table-count {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-top: 0.1rem;
        }

        .export-actions { display: flex; gap: 0.5rem; align-items: center; }

        .btn-export {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            border-radius: var(--radius);
            border: 1px solid #16a34a;
            padding: 0.4rem 0.85rem;
            color: #15803d;
            background: #f0fdf4;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            transition: all 0.15s;
        }

        .btn-export:hover { background: #dcfce7; color: #166534; }

        .btn-pdf {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            border-radius: var(--radius);
            border: 1px solid #b91c1c;
            padding: 0.4rem 0.85rem;
            color: #b91c1c;
            background: #fef2f2;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            transition: all 0.15s;
        }

        .btn-pdf:hover { background: #fee2e2; color: #991b1b; }

        /* ── TABLE ── */
        .table-wrapper { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; }

        /* Expanded min-width to accommodate new columns */
        table { width: 100%; border-collapse: collapse; min-width: 1100px; }

        thead th {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--text-muted);
            padding: 0.9rem 1.25rem;
            background: #f8fafc;
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid var(--border);
        }

        tbody tr { border-bottom: 1px solid var(--border); transition: background 0.12s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #f8fafc; }

        tbody td {
            font-size: 0.875rem;
            color: var(--text);
            padding: 0.95rem 1.25rem;
            vertical-align: middle;
        }

        /* Truncate long address fields */
        .td-address {
            max-width: 180px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: var(--text-muted);
            font-size: 0.825rem;
        }

        .td-name { font-weight: 600; }

        .td-ref {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--accent);
            white-space: nowrap;
            font-variant-numeric: tabular-nums;
        }

        .badge-category {
            display: inline-block;
            font-size: 0.67rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            padding: 0.2rem 0.6rem;
            border-radius: 999px;
            background: rgba(30,64,175,0.07);
            color: var(--accent);
            border: 1px solid rgba(30,64,175,0.18);
            white-space: nowrap;
        }

        .row-actions { display: flex; gap: 0.5rem; align-items: center; }

        .btn-view {
            font-size: 0.72rem;
            font-weight: 700;
            border-radius: var(--radius);
            padding: 0.35rem 0.8rem;
            text-decoration: none;
            border: 1.5px solid var(--border);
            color: var(--text);
            background: #f8fafc;
            transition: all 0.15s;
            white-space: nowrap;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .btn-view:hover { background: var(--accent-soft); border-color: #bfdbfe; color: var(--accent); }

        .btn-danger {
            font-size: 0.72rem;
            font-weight: 700;
            border-radius: var(--radius);
            padding: 0.35rem 0.8rem;
            text-decoration: none;
            border: 1.5px solid transparent;
            color: #be123c;
            background: #fff1f2;
            transition: all 0.15s;
            white-space: nowrap;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .btn-danger:hover { background: #ffe4e6; color: #9f1239; }

        .empty {
            padding: 3.5rem 1.5rem;
            text-align: center;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .empty svg { margin: 0 auto 0.75rem; display: block; opacity: 0.3; }

        .pagination {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border);
            background: var(--bg);
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

        .footer-links a, .footer-links button {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            font-family: var(--sans);
            font-weight: 400;
            text-align: left;
            transition: color 0.15s;
        }

        .footer-links a:hover, .footer-links button:hover { color: #fff; }

        .footer-bottom {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            align-items: center;
            justify-content: space-between;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.35);
        }

        /* Responsive */
        @media (max-width: 900px) {
            .stats-inner { grid-template-columns: repeat(2, 1fr); }
            .stat-item:nth-child(2) { border-right: none; }
            .stat-item:nth-child(3) { border-bottom: none; }
        }

        @media (max-width: 640px) {
            .stats-inner { grid-template-columns: 1fr 1fr; }
            .stat-item { padding: 1rem; border-right: none; border-bottom: 1px solid var(--border); }
            .stat-item:nth-child(odd) { border-right: 1px solid var(--border); }
            .stat-item:last-child, .stat-item:nth-last-child(2):nth-child(odd) { border-bottom: none; }
        }
    </style>
</head>
<body>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="wrap top-bar-inner">
            <div class="top-bar-left">
                <span class="top-bar-dot"></span>
                Portal Active &mdash; Admin Panel
            </div>
            <div class="top-bar-right">
                <a href="{{ url('/') }}">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    View site
                </a>
                <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="top-bar-logout">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Sign out
                    </button>
                </form>
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
            <nav class="nav-actions" aria-label="Admin navigation">
                <span class="badge-admin">Admin</span>
                <a href="{{ url('/') }}" class="nav-text">View site</a>
            </nav>
        </div>
    </header>

    <main style="flex:1; background: var(--bg);">

        <!-- PAGE HERO -->
        <section class="page-hero" aria-labelledby="admin-heading">
            <div class="wrap page-hero-inner">
                <div class="hero-eyebrow">
                    <span class="eyebrow-dot"></span>
                    Admin Dashboard
                </div>
                <h1 id="admin-heading">Entrepreneur <em>Registrations</em></h1>
                <p class="lead">All submissions across all agencies. Filter, review, and export records.</p>
            </div>
        </section>

        <!-- STATS BAR -->
        <div class="stats-bar" aria-label="Registration statistics">
            <div class="wrap" style="padding:0;">
                <div class="stats-inner">
                    <div class="stat-item">
                        <div class="stat-label">Total registrations</div>
                        <div class="stat-num">{{ $total ?? 0 }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">This month</div>
                        <div class="stat-num accent">{{ $thisMonth ?? 0 }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Agencies</div>
                        <div class="stat-num">{{ $totalAgencies ?? 0 }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Categories</div>
                        <div class="stat-num">{{ $totalCategories ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BODY -->
        <div class="page-body">
            <div class="wrap">

                <!-- FILTERS -->
                <form method="GET" action="{{ route('admin.index') }}" class="filters" aria-label="Filter registrations">
                    <div class="field">
                        <label for="search">Search name</label>
                        <input id="search" type="text" name="search" value="{{ request('search') }}" placeholder="e.g. Ahmad">
                    </div>
                    <div class="field">
                        <label for="agency">Agency</label>
                        <select id="agency" name="agency">
                            <option value="">All agencies</option>
                            <option value="MARDI" {{ request('agency') == 'MARDI' ? 'selected' : '' }}>MARDI</option>
                            <option value="NAFAS" {{ request('agency') == 'NAFAS' ? 'selected' : '' }}>NAFAS</option>
                            <option value="FAMA" {{ request('agency') == 'FAMA' ? 'selected' : '' }}>FAMA</option>
                            <option value="LPP" {{ request('agency') == 'LPP' ? 'selected' : '' }}>LPP</option>
                            <option value="Jabatan Pertanian" {{ request('agency') == 'Jabatan Pertanian' ? 'selected' : '' }}>Jabatan Pertanian</option>
                            <option value="Penang Agrotech" {{ request('agency') == 'Penang Agrotech' ? 'selected' : '' }}>Penang Agrotech</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="category">Category</label>
                        <select id="category" name="category">
                            <option value="">All categories</option>
                            <option value="Food" {{ request('category') == 'Food' ? 'selected' : '' }}>Food &amp; Beverage</option>
                            <option value="Fashion" {{ request('category') == 'Fashion' ? 'selected' : '' }}>Fashion &amp; Apparel</option>
                            <option value="Agriculture" {{ request('category') == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                            <option value="Services" {{ request('category') == 'Services' ? 'selected' : '' }}>Services</option>
                            <option value="Beauty" {{ request('category') == 'Beauty' ? 'selected' : '' }}>Beauty &amp; Cosmetics</option>
                            <option value="Handicraft" {{ request('category') == 'Handicraft' ? 'selected' : '' }}>Handicraft</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-filter">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/></svg>
                        Filter
                    </button>
                    <a href="{{ route('admin.index') }}" class="btn btn-reset">Reset</a>
                </form>

                <!-- TABLE -->
                <section class="table-card" aria-label="Registration list">
                    <header class="table-head">
                        <div>
                            <div class="table-title">All registrations</div>
                            <div class="table-count">
                                {{ isset($registrations) ? (method_exists($registrations, 'total') ? $registrations->total() : $registrations->count()) : 0 }} records found
                            </div>
                        </div>
                        <div class="export-actions">
                            <a href="{{ route('admin.export.excel', request()->all()) }}" class="btn-export">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                Excel
                            </a>
                            <a href="{{ route('admin.export.pdf', request()->all()) }}" class="btn-pdf">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                                PDF
                            </a>
                        </div>
                    </header>

                    @if(isset($registrations) && $registrations->count() > 0)
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reference</th>
                                        <th>Full name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Agency</th>
                                        <th>Category</th>
                                        <th>Premises address</th>
                                        <th>Registered</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registrations as $index => $reg)
                                        <tr>
                                            <td>{{ (method_exists($registrations, 'firstItem') ? $registrations->firstItem() : 1) + $index }}</td>
                                            <td><span class="td-ref">{{ $reg->reference_number }}</span></td>
                                            <td class="td-name">{{ $reg->full_name }}</td>
                                            <td>{{ $reg->phone_number }}</td>
                                            <td>{{ $reg->email }}</td>
                                            <td>
                                                <span class="td-address" title="{{ $reg->address }}">
                                                    {{ $reg->address }}
                                                </span>
                                            </td>
                                            <td>{{ $reg->agency_name }}</td>
                                            <td><span class="badge-category">{{ $reg->business_category }}</span></td>
                                            <td>
                                                <span class="td-address" title="{{ $reg->premises_address }}">
                                                    {{ $reg->premises_address }}
                                                </span>
                                            </td>
                                            <td>{{ $reg->created_at->format('d M Y') }}</td>
                                            <td>
                                                <div class="row-actions">
                                                    <a href="{{ route('admin.show', $reg->id) }}" class="btn-view">
                                                        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                                        View
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.destroy', $reg->id) }}" onsubmit="return confirm('Delete this registration? This cannot be undone.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-danger">
                                                            <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="pagination">
                            @if(method_exists($registrations, 'withQueryString'))
                                {{ $registrations->withQueryString()->links() }}
                            @endif
                        </div>
                    @else
                        <div class="empty">
                            <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            No registrations found matching your filters.
                        </div>
                    @endif
                </section>

            </div>
        </div>

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
                    <div class="footer-col-title">Admin</div>
                    <ul class="footer-links">
                        <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li><a href="{{ url('/') }}">View public site</a></li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit">Sign out</button>
                            </form>
                        </li>
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
                <span>&copy; {{ date('Y') }} PenangPreneur Portal — Admin Panel</span>
                <span>Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi & Keterjaminan Makanan Dan Keusahawanan</span>
            </div>
        </div>
    </footer>

</body>
</html>