<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Detail — Admin | PenangPreneur Portal</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* =========================================
           1. CSS Variables & Reset
           ========================================= */
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
            
            /* DIBESARKAN: Supaya logo rapat ke hujung seperti di index admin */
            --max-wide-header: 90rem; 
            --max-wide-content: 56rem; 
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

        a:focus-visible, button:focus-visible, .logo:focus-visible {
            outline: var(--focus);
            outline-offset: var(--focus-offset);
        }

        .logo:focus-visible { border-radius: 4px; }

        .wrap {
            width: 100%;
            margin: 0 auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .wrap-header { max-width: var(--max-wide-header); }
        .wrap-content { max-width: var(--max-wide-content); }

        /* =========================================
           2. Layout (Header, Main, Footer)
           ========================================= */
        header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            /* FUNGSI STICKY TELAH DIBUANG DI SINI SUPAYA TIADA OVERLAP/PERTINDIHAN */
            z-index: 30;
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
        }

        .logo-secondary {
            font-size: 0.6875rem;
            font-weight: 600;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--text-muted);
            font-family: var(--sans);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

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

        .nav-link {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            transition: color 0.15s ease;
        }

        .nav-link:hover { color: var(--text); }

        main {
            flex: 1;
            background: var(--bg);
        }

        main::before {
            content: '';
            display: block;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), #3b82f6, var(--accent));
            opacity: 0.85;
        }

        /* =========================================
           3. Page Content & Cards
           ========================================= */
        .page-inner { padding: 2.5rem 0 3rem; }

        .page-header { margin-bottom: 2rem; }

        .ref-tag {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.4rem;
            display: inline-block;
        }

        h1 {
            font-family: var(--sans);
            font-size: clamp(1.75rem, 3.2vw, 2.25rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.2;
            color: var(--brand);
        }

        .date {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        .card {
            background: var(--surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            overflow: hidden;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-sm);
        }

        .card-head {
            padding: 1rem 1.3rem;
            border-bottom: 1px solid var(--border);
            background: #f8fafc;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .row {
            display: flex;
            padding: 1rem 1.3rem;
            border-bottom: 1px solid var(--border);
        }

        .row:last-child { border-bottom: none; }

        .key {
            width: 11rem;
            flex-shrink: 0;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-light);
            padding-right: 1rem;
        }

        .val {
            font-size: 0.95rem;
            color: var(--text);
            flex: 1;
        }

        .val-strong {
            font-family: var(--sans);
            font-size: 1rem;
            font-weight: 700;
            color: var(--accent);
            letter-spacing: 0.02em;
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
        }

        .product-image {
            width: 100%;
            max-width: 320px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            margin-top: 0.25rem;
            box-shadow: var(--shadow-sm);
        }

        .no-image {
            font-size: 0.88rem;
            color: var(--text-light);
            font-style: italic;
        }

       /* =========================================
           4. Buttons & Footer
           ========================================= */
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: flex-end;
            align-items: center; /* Memastikan butang sejajar di tengah secara menegak */
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }

        /* Buang ruang kosong (margin) pada form yang membalut butang delete */
        .actions form {
            margin: 0;
            display: flex;
        }

        /* Gabungkan gaya asas supaya kedua-dua butang TEPAK SAMA saiz */
        .btn-secondary, .btn-danger {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 44px; /* Tetapkan ketinggian statik */
            padding: 0 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: var(--radius);
            text-decoration: none;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        /* Gaya khusus untuk butang kelabu */
        .btn-secondary {
            background: #fff;
            color: var(--text-muted);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover { 
            color: var(--text); 
            border-color: #cbd5e1; 
        }

        /* Gaya khusus untuk butang merah */
        .btn-danger {
            background: #b91c1c;
            color: #fff;
            border: 1px solid transparent; /* Tambah border lutsinar supaya matematik saiznya sama dengan butang kelabu */
            letter-spacing: 0.04em;
        }

        .btn-danger:hover { 
            background: #991b1b; 
        }

        footer {
            background: var(--surface);
            padding: 1.5rem 0;
            border-top: 1px solid var(--border);
        }

        .footer-inner {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        @media (min-width: 640px) {
            .footer-inner {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        .footer-copy {
            font-size: 0.8125rem;
            color: var(--text-light);
        }

        @media (max-width: 640px) {
            .row { flex-direction: column; gap: 0.25rem; }
            .key { width: 100%; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; }
        }
    </style>
</head>
<body>
    <header>
        <div class="wrap wrap-header header-inner">
            <a href="{{ url('/') }}" class="logo" aria-label="PenangPreneur Portal — Home">
                <span class="logo-accent-bar" aria-hidden="true"></span>
                <span class="logo-text">
                    <span class="logo-primary">PenangPreneur</span>
                    <span class="logo-secondary">Portal</span>
                </span>
            </a>
            <nav class="nav-actions" aria-label="Primary">
                <span class="badge-admin">Admin</span>
                <a href="{{ route('admin.index') }}" class="nav-link">← Back to list</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="wrap wrap-content page-inner">
            <header class="page-header">
                <span class="ref-tag">{{ $registration->reference_number }}</span>
                <h1>{{ $registration->full_name }}</h1>
                <p class="date">Registered on {{ $registration->created_at->format('d F Y, h:i A') }}</p>
            </header>

            <section class="card" aria-label="Personal information">
                <div class="card-head">
                    <span>Personal information</span>
                </div>
                <div class="row">
                    <div class="key">Reference number</div>
                    <div class="val val-strong">{{ $registration->reference_number }}</div>
                </div>
                <div class="row">
                    <div class="key">Full name</div>
                    <div class="val">{{ $registration->full_name }}</div>
                </div>
                <div class="row">
                    <div class="key">Phone number</div>
                    <div class="val">{{ $registration->phone_number }}</div>
                </div>
                <div class="row">
                    <div class="key">Email address</div>
                    <div class="val">{{ $registration->email }}</div>
                </div>
            </section>

            <section class="card" aria-label="Business details">
                <div class="card-head">
                    <span>Business details</span>
                </div>
                <div class="row">
                    <div class="key">Agency name</div>
                    <div class="val">{{ $registration->agency_name }}</div>
                </div>
                <div class="row">
                    <div class="key">Business category</div>
                    <div class="val"><span class="badge-category">{{ $registration->business_category }}</span></div>
                </div>
                <div class="row">
                    <div class="key">Product name</div>
                    <div class="val">{{ $registration->product_name }}</div>
                </div>
                <div class="row">
                    <div class="key">Product description</div>
                    <div class="val">{{ $registration->product_description }}</div>
                </div>
                <div class="row">
                    <div class="key">Product image</div>
                    <div class="val">
                        @if($registration->product_image)
                            <img src="{{ asset('storage/' . $registration->product_image) }}" alt="Product image" class="product-image">
                        @else
                            <span class="no-image">No image uploaded</span>
                        @endif
                    </div>
                </div>
            </section>

            <div class="actions">
                <a href="{{ route('admin.index') }}" class="btn-secondary">Back to list</a>
                <form method="POST" action="{{ route('admin.destroy', $registration->id) }}" onsubmit="return confirm('Delete this registration? This cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">Delete registration</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <div class="wrap wrap-header footer-inner">
            <p class="footer-copy">&copy; {{ date('Y') }} PenangPreneur Portal — Admin Panel</p>
            <span class="footer-copy">Admin view</span>
        </div>
    </footer>
</body>
</html>