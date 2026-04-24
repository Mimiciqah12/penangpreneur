<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — PenangPreneur Portal</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* =========================================
           1. CSS Variables & Reset
           ========================================= */
        *, *::before, *::after { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }

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
            --accent-soft: #f0f4fa;
            --danger: #b91c1c;

            --focus: 2px solid #2563eb;
            --focus-offset: 2px;
            --radius: 6px;
            --radius-lg: 12px;
            
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            
            --serif: 'Cormorant Garamond', 'Times New Roman', Times, serif;
            --sans: 'Inter', system-ui, -apple-system, sans-serif;
            --max-wide: 72rem;
        }

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
        input:focus-visible, select:focus-visible,
        textarea:focus-visible, .logo:focus-visible {
            outline: var(--focus);
            outline-offset: var(--focus-offset);
        }

        .wrap {
            width: 100%;
            max-width: var(--max-wide);
            margin: 0 auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        /* =========================================
           2. Layout (Header, Main, Footer)
           ========================================= */
        header.top-nav {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 30;
        }

        main {
            flex: 1;
            background: linear-gradient(180deg, var(--accent-soft) 0%, var(--surface) 22%);
            border-bottom: 1px solid var(--border);
        }

        main::before {
            content: '';
            display: block;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), #3b82f6, var(--accent));
            opacity: 0.85;
        }

        footer {
            background: var(--surface);
            padding: 1.5rem 0;
            border-top: 1px solid var(--border);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 4rem;
            gap: 1rem;
        }

        /* Logo & Navigation */
        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text);
            text-decoration: none;
            border-radius: 4px;
        }

        .logo-accent-bar {
            width: 3px;
            align-self: stretch;
            min-height: 2.25rem;
            border-radius: 2px;
            background: linear-gradient(180deg, var(--accent) 0%, #334155 100%);
            opacity: 0.92;
            flex-shrink: 0;
        }

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
    transition: color 0.15s ease;
}

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
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 0.75rem 1.25rem;
        }

        .nav-actions .nav-text {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.15s ease;
        }

        .nav-actions .nav-text:hover { color: var(--text); }

        /* =========================================
           3. Components (Badges & Buttons)
           ========================================= */
        .badge-admin {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.3rem 0.85rem;
            border-radius: 999px;
            background: rgba(30, 64, 175, 0.07);
            color: var(--accent);
            border: 1px solid rgba(30, 64, 175, 0.25);
        }

        .badge-category {
            display: inline-block;
            font-size: 0.69rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 0.2rem 0.55rem;
            border-radius: 999px;
            background: rgba(30, 64, 175, 0.05);
            color: var(--accent);
            border: 1px solid rgba(30, 64, 175, 0.18);
            white-space: nowrap;
        }

        .btn-filter, .btn-reset {
            height: 42px; 
            border-radius: var(--radius);
            font-size: 0.78rem;
            font-weight: 600;
            transition: all 0.15s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .btn-filter {
            letter-spacing: 0.05em;
            text-transform: uppercase;
            background: var(--brand);
            color: #fff;
            padding: 0 1.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-filter:hover { background: var(--brand-hover); }

        .btn-reset {
            color: var(--text-muted);
            border: 1px solid var(--border);
            padding: 0 1.2rem;
        }

        .btn-reset:hover { color: var(--text); border-color: #cbd5e1; }

        .btn-view, .btn-danger {
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: var(--radius);
            padding: 0.35rem 0.8rem;
            text-decoration: none;
            transition: all 0.15s ease;
            white-space: nowrap;
            cursor: pointer;
        }

        .btn-view {
            border: 1px solid var(--border);
            color: var(--text);
            background: #f8fafc;
        }

        .btn-view:hover { background: #e5edf9; border-color: #cbd5e1; }

        .btn-danger {
            border: 1px solid transparent;
            color: #be123c;
            background: #fff1f2;
        }

        .btn-danger:hover { background: #ffe4e6; color: #9f1239; }

        /* Export Buttons (Excel & PDF) */
        .export-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-export {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            border-radius: var(--radius);
            border: 1px solid #16a34a;
            padding: 0.4rem 0.8rem;
            color: #15803d;
            background: #f0fdf4;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            transition: all 0.15s ease;
        }

        .btn-export:hover { background: #dcfce7; color: #166534; }

        .btn-pdf {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            border-radius: var(--radius);
            border: 1px solid #b91c1c;
            padding: 0.4rem 0.8rem;
            color: #b91c1c;
            background: #fef2f2;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            transition: all 0.15s ease;
        }

        .btn-pdf:hover { background: #fee2e2; color: #991b1b; }

        /* =========================================
           4. Page Elements & Stats
           ========================================= */
        .page-inner { padding: 2.5rem 0 3rem; }

        .page-header { margin-bottom: 2rem; }

        .page-header h1 {
    font-family: var(--serif);
    font-size: clamp(2rem, 4.5vw, 3rem);
    font-weight: 600;
    letter-spacing: 0.01em;
    line-height: 1.18;
    color: var(--text);
    font-feature-settings: "kern" 1, "liga" 1;
}

        .page-header p {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        .stat-card {
            background: var(--surface);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            padding: 1rem 1.15rem;
            box-shadow: var(--shadow-sm);
        }

        .stat-label {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 0.3rem;
        }

        .stat-num {
            font-family: var(--sans);
            font-size: 1.75rem;
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        .stat-num.accent { color: var(--accent); }

        /* =========================================
           5. Filters & Forms
           ========================================= */
        .filters {
            background: var(--surface);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            padding: 1.25rem;
            margin-bottom: 1.3rem;
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
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text-light);
        }

        .field input, .field select {
            font-family: var(--sans);
            font-size: 0.875rem;
            color: var(--text);
            background: #f8fafc;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            height: 42px; 
            padding: 0 0.75rem;
            transition: all 0.15s ease;
        }

        .field input::placeholder { color: #94a3b8; }

        .field select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            padding-right: 2rem;
        }

        .field input:focus, .field select:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
            background: #fff;
            outline: none;
        }

        /* =========================================
           6. Table Layout
           ========================================= */
        .table-card {
            background: #fff;
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .table-head {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
        }

        .table-title {
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-light);
        }

        .table-count {
            font-size: 0.78rem;
            color: var(--text-light);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch; 
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            min-width: 900px; 
        }

        thead th {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
            padding: 1rem 1.5rem;
            background: #f8fafc;
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid var(--border);
        }

        tbody tr { border-bottom: 1px solid var(--border); transition: background 0.15s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #f9fafb; }

        tbody td {
            font-size: 0.875rem;
            color: var(--text);
            padding: 1rem 1.5rem;
            vertical-align: middle;
        }

        .td-name { font-weight: 500; }

        .td-ref {
            font-family: var(--sans);
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--accent);
            white-space: nowrap; 
        }

        .row-actions { 
            display: flex; 
            flex-wrap: nowrap; 
            gap: 0.5rem; 
        }

        /* =========================================
           7. Utilities
           ========================================= */
        .empty {
            padding: 3rem 1.5rem;
            text-align: center;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .pagination {
            padding: 0.85rem 1.15rem;
            border-top: 1px solid var(--border);
        }

        .footer-inner {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .footer-copy {
            font-size: 0.8125rem;
            color: var(--text-light);
        }

        .footer-links {
            display: flex;
            gap: 1.25rem;
            list-style: none;
        }

        .footer-links a {
            font-size: 0.8125rem;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.15s;
        }

        .footer-links a:hover { color: var(--text); }

        /* Responsive */
        @media (min-width: 640px) {
            .footer-inner {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        @media (max-width: 900px) {
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 640px) {
            .page-inner { padding-top: 2rem; }
        }
    </style>
</head>
<body>
    <header class="top-nav">
        <div class="wrap header-inner">
            <a href="{{ url('/') }}" class="logo" aria-label="PenangPreneur Portal — Home">
                <span class="logo-accent-bar" aria-hidden="true"></span>
                <span class="logo-text">
                    <span class="logo-primary">PenangPreneur</span>
                    <span class="logo-secondary">Portal</span>
                </span>
            </a>
            <nav class="nav-actions" aria-label="Primary">
                <span class="badge-admin">Admin</span>
                <a href="{{ url('/') }}" class="nav-text">View site</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="wrap page-inner">
            <header class="page-header">
                <h1>Registrations</h1>
                <p>All entrepreneur submissions across all agencies.</p>
            </header>

            <section class="stats" aria-label="Registration statistics">
                <article class="stat-card">
                    <p class="stat-label">Total registrations</p>
                    <p class="stat-num">{{ $total ?? 0 }}</p>
                </article>
                <article class="stat-card">
                    <p class="stat-label">This month</p>
                    <p class="stat-num accent">{{ $thisMonth ?? 0 }}</p>
                </article>
                <article class="stat-card">
                    <p class="stat-label">Agencies</p>
                    <p class="stat-num">{{ $totalAgencies ?? 0 }}</p>
                </article>
                <article class="stat-card">
                    <p class="stat-label">Categories</p>
                    <p class="stat-num">{{ $totalCategories ?? 0 }}</p>
                </article>
            </section>

            <form method="GET" action="{{ route('admin.index') }}" class="filters">
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
                <button type="submit" class="btn-filter">FILTER</button>
                <a href="{{ route('admin.index') }}" class="btn-reset">Reset</a>
            </form>

            <section class="table-card" aria-label="Registration list">
                <header class="table-head">
                    <div>
                        <div class="table-title">All registrations</div>
                        <div class="table-count">{{ isset($registrations) ? (method_exists($registrations, 'total') ? $registrations->total() : $registrations->count()) : 0 }} records found</div>
                    </div>
                    
                    <div class="export-actions">
                        <a href="{{ route('admin.export.excel', request()->all()) }}" class="btn-export" title="Download Excel for data analysis">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            Excel
                        </a>

                        <a href="{{ route('admin.export.pdf', request()->all()) }}" class="btn-pdf" title="Download PDF to view images/documents">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
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
                                    <th>Email</th>
                                    <th>Agency</th>
                                    <th>Category</th>
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
                                        <td>{{ $reg->email }}</td>
                                        <td>{{ $reg->agency_name }}</td>
                                        <td><span class="badge-category">{{ $reg->business_category }}</span></td>
                                        <td>{{ $reg->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="row-actions">
                                                <a href="{{ route('admin.show', $reg->id) }}" class="btn-view">View</a>
                                                <form method="POST" action="{{ route('admin.destroy', $reg->id) }}" onsubmit="return confirm('Delete this registration? This cannot be undone.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-danger">Delete</button>
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
                    <div class="empty">No registrations found matching your filters.</div>
                @endif
            </section>
        </div>
    </main>

    <footer>
        <div class="wrap footer-inner">
            <p class="footer-copy">&copy; {{ date('Y') }} PenangPreneur Portal — Admin Panel</p>
            <ul class="footer-links">
                <li><a href="{{ url('/') }}">View site</a></li>
                <li><a href="#top">Back to top</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>