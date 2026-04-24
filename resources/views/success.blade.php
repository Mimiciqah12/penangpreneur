<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful — PenangPreneur Portal</title>

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
            --accent-soft: #f0f4fa;
            --success-bg: #ecfeff;
            --success-border: #a5f3fc;
            --success-text: #0f766e;
            --focus: 2px solid #2563eb;
            --focus-offset: 2px;
            --radius: 6px;
            --radius-lg: 12px;
            --serif: 'Cormorant Garamond', 'Times New Roman', Times, serif;
            --sans: 'Source Sans 3', system-ui, -apple-system, sans-serif;
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

        a:focus-visible,
        .btn:focus-visible,
        .logo:focus-visible {
            outline: var(--focus);
            outline-offset: var(--focus-offset);
        }

        .logo:focus-visible { border-radius: 4px; }

        .wrap {
            width: 100%;
            max-width: var(--max-wide);
            margin: 0 auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 20;
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
        }

        .nav-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 0.75rem 1.25rem;
        }

        .nav-actions a.nav-text {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
        }

        .nav-actions a.nav-text:hover { color: var(--text); }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: var(--radius);
            padding: 0.5rem 1.125rem;
            border: none;
            cursor: pointer;
            transition: background 0.15s ease, color 0.15s ease;
        }

        .btn-primary {
            background: var(--brand);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--brand-hover);
            color: #fff;
        }

        .page {
            flex: 1;
            background: linear-gradient(180deg, var(--accent-soft) 0%, var(--surface) 22%);
            border-bottom: 1px solid var(--border);
        }

        .page::before {
            content: '';
            display: block;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), #3b82f6, var(--accent));
            opacity: 0.85;
        }

        .page-inner {
            min-height: calc(100vh - 4rem - 3px - 90px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 0 3rem;
        }

        .success-card {
            width: 100%;
            max-width: 38rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: 0 14px 40px -24px rgba(15, 23, 42, 0.18);
            padding: 2rem 1.5rem;
            text-align: center;
        }

        @media (min-width: 768px) {
            .success-card { padding: 2.5rem 2.5rem; }
        }

        .success-icon {
            width: 4.25rem;
            height: 4.25rem;
            border-radius: 999px;
            margin: 0 auto 1rem;
            background: var(--success-bg);
            border: 1px solid var(--success-border);
            color: var(--success-text);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            font-weight: 700;
        }

        h1 {
            font-family: var(--serif);
            font-size: clamp(1.9rem, 4vw, 2.4rem);
            font-weight: 600;
            letter-spacing: 0.01em;
            line-height: 1.2;
            margin-bottom: 0.6rem;
        }

        .lead {
            color: var(--text-muted);
            font-size: 0.98rem;
            max-width: 31rem;
            margin: 0 auto 1.5rem;
        }

        .ref-box {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 0.95rem 1rem;
            margin: 0 auto 1rem;
            max-width: 20rem;
        }

        .ref-label {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 0.2rem;
        }

        .ref-number {
            font-family: var(--serif);
            font-size: 1.35rem;
            font-weight: 600;
            color: var(--accent);
            letter-spacing: 0.02em;
        }

        .note {
            font-size: 0.88rem;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.7rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
        }

        .btn-secondary {
            background: #fff;
            color: var(--text-muted);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            color: var(--text);
            border-color: #cbd5e1;
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

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 1.25rem;
            list-style: none;
        }

        .footer-links a {
            font-size: 0.8125rem;
            color: var(--text-light);
            text-decoration: none;
        }

        .footer-links a:hover { color: var(--text); }

        .footer-soon {
            font-size: 0.8125rem;
            color: var(--text-light);
            cursor: default;
        }
    </style>
</head>
<body>
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
                <a href="{{ route('admin.index') }}" class="nav-text">Admin</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </nav>
        </div>
    </header>

    <main class="page">
        <div class="wrap page-inner">
            <section class="success-card" aria-labelledby="success-heading">
                <div class="success-icon" aria-hidden="true">✓</div>

                <h1 id="success-heading">Registration Successful</h1>
                <p class="lead">
                    Thank you{{ session('full_name') ? ', ' . session('full_name') : '' }}. Your business information has been submitted and will be reviewed by the relevant agency.
                </p>

                <div class="ref-box">
                    <p class="ref-label">Reference Number</p>
                    <p class="ref-number">{{ session('reference_number') }}</p>
                </div>

                <p class="note">A confirmation email has been sent to your inbox.</p>

                <div class="actions">
                    <a href="{{ route('register') }}" class="btn btn-secondary">Submit Another</a>
                    <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <div class="wrap footer-inner">
            <p class="footer-copy">&copy; {{ 2026 }} PenangPreneur Portal. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="{{ route('admin.index') }}">Admin</a></li>
                <li><span class="footer-soon" title="Coming soon">Privacy policy</span></li>
                <li><span class="footer-soon" title="Coming soon">Terms of use</span></li>
                <li><a href="mailto:{{ config('mail.from.address') }}">Contact</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
