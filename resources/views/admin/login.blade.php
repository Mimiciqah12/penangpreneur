<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — PenangPreneur Portal</title>
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
            --accent: #1e40af;
            --accent-2: #1d4ed8;
            --accent-soft: #eff6ff;
            --serif: 'Cormorant Garamond', Georgia, serif;
            --sans: 'Source Sans 3', system-ui, sans-serif;
            --focus: 2px solid #2563eb;
            --focus-offset: 2px;
            --radius: 8px;
            --radius-lg: 16px;
            --shadow-lg: 0 12px 48px -8px rgba(15,23,42,0.28);
        }

        body {
            font-family: var(--sans);
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
            /* Same hero gradient as the portal */
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1e40af 100%);
            position: relative;
            overflow: hidden;
        }

        /* Background pattern matching index hero */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                radial-gradient(circle at 15% 60%, rgba(59,130,246,0.18) 0%, transparent 50%),
                radial-gradient(circle at 85% 20%, rgba(30,64,175,0.22) 0%, transparent 40%),
                linear-gradient(45deg, transparent 48%, rgba(255,255,255,0.012) 49%, rgba(255,255,255,0.012) 51%, transparent 52%);
            background-size: 100% 100%, 100% 100%, 40px 40px;
            pointer-events: none;
            z-index: 0;
        }

        a:focus-visible, button:focus-visible, input:focus-visible {
            outline: var(--focus);
            outline-offset: var(--focus-offset);
            border-radius: 4px;
        }

        .wrap {
            width: 100%;
            max-width: 72rem;
            margin: 0 auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        /* ── TOP BAR ── */
        .top-bar {
            position: relative;
            z-index: 10;
            background: rgba(15,23,42,0.5);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.65);
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
            font-size: 0.75rem;
            color: rgba(255,255,255,0.45);
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

        .top-bar-right a {
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.35rem;
            transition: color 0.15s;
        }

        .top-bar-right a:hover { color: #fff; }

        /* ── MAIN ── */
        main {
            flex: 1;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 1.5rem 3rem;
        }

        .login-container {
            width: 100%;
            max-width: 26rem;
        }

        /* Portal logo above card */
        .login-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
            justify-content: center;
            text-decoration: none;
        }

        .logo-accent-bar {
            width: 3px;
            height: 2.5rem;
            border-radius: 2px;
            background: linear-gradient(180deg, #60a5fa 0%, rgba(255,255,255,0.3) 100%);
            flex-shrink: 0;
        }

        .logo-text { display: flex; flex-direction: column; line-height: 1.05; gap: 0.15rem; }

        .logo-primary {
            font-family: var(--serif);
            font-size: 1.4rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            color: #fff;
        }

        .logo-secondary {
            font-size: 0.6875rem;
            font-weight: 600;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
        }

        /* ── CARD ── */
        .login-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            display: block;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), #3b82f6, var(--accent));
        }

        .login-card-body {
            padding: 2rem 2rem 2.25rem;
        }

        /* Eyebrow */
        .login-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(30,64,175,0.07);
            border: 1px solid rgba(30,64,175,0.18);
            border-radius: 999px;
            padding: 0.25rem 0.8rem 0.25rem 0.5rem;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.9rem;
        }

        .eyebrow-dot {
            width: 5px; height: 5px;
            border-radius: 50%;
            background: var(--accent);
        }

        .login-card h1 {
            font-family: var(--serif);
            font-size: 1.85rem;
            font-weight: 600;
            letter-spacing: 0.01em;
            line-height: 1.2;
            color: var(--text);
            margin-bottom: 0.35rem;
        }

        .login-card h1 em {
            font-style: italic;
            color: var(--accent);
        }

        .login-subtitle {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-bottom: 1.75rem;
        }

        /* ── ERROR ── */
        .error-box {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            border-radius: var(--radius);
            padding: 0.75rem 0.9rem;
            font-size: 0.875rem;
            margin-bottom: 1.25rem;
        }

        .error-box svg { flex-shrink: 0; margin-top: 0.1rem; }

        /* ── FIELDS ── */
        .field { display: flex; flex-direction: column; margin-bottom: 1rem; }

        .field:last-of-type { margin-bottom: 1.5rem; }

        .field label {
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 0.4rem;
        }

        .input-wrap { position: relative; }

        .input-icon {
            position: absolute;
            left: 0.8rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .field input {
            font-family: var(--sans);
            font-size: 0.9375rem;
            color: var(--text);
            background: #f8fafc;
            border: 1.5px solid var(--border);
            border-radius: var(--radius);
            padding: 0.7rem 0.875rem 0.7rem 2.5rem;
            width: 100%;
            transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
        }

        .field input::placeholder { color: #94a3b8; }

        .field input:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
            background: #fff;
            outline: none;
        }

        /* ── SUBMIT ── */
        .btn-login {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-family: var(--sans);
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            background: var(--accent);
            border: none;
            border-radius: var(--radius);
            padding: 0.85rem 1.5rem;
            cursor: pointer;
            box-shadow: 0 2px 12px -2px rgba(30,64,175,0.4);
            transition: all 0.18s ease;
            letter-spacing: 0.01em;
        }

        .btn-login:hover {
            background: var(--accent-2);
            box-shadow: 0 4px 20px -2px rgba(30,64,175,0.5);
            transform: translateY(-1px);
        }

        .btn-login:active { transform: translateY(0); }

        /* ── FOOTER ── */
        .login-card-footer {
            padding: 1rem 2rem;
            border-top: 1px solid var(--border);
            background: var(--bg);
            text-align: center;
            font-size: 0.8125rem;
            color: var(--text-light);
        }

        .login-card-footer a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }

        .login-card-footer a:hover { text-decoration: underline; }

        /* ── PAGE FOOTER ── */
        footer {
            position: relative;
            z-index: 1;
            background: rgba(15,23,42,0.6);
            backdrop-filter: blur(8px);
            border-top: 1px solid rgba(255,255,255,0.07);
            padding: 1.25rem 0;
        }

        .footer-inner {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            align-items: center;
            justify-content: space-between;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.35);
        }
    </style>
</head>
<body>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="wrap top-bar-inner">
            <div class="top-bar-left">
                <span class="top-bar-dot"></span>
                Portal Active
            </div>
            <div class="top-bar-right">
                <a href="{{ url('/') }}">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Return to public site
                </a>
            </div>
        </div>
    </div>

    <main>
        <div class="login-container">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="login-logo" aria-label="PenangPreneur Portal">
                <span class="logo-accent-bar" aria-hidden="true"></span>
                <span class="logo-text">
                    <span class="logo-primary">PenangPreneur</span>
                    <span class="logo-secondary">Portal</span>
                </span>
            </a>

            <div class="login-card">
                <div class="login-card-body">

                    <div class="login-eyebrow">
                        <span class="eyebrow-dot"></span>
                        Restricted area
                    </div>

                    <h1>Admin <em>Login</em></h1>
                    <p class="login-subtitle">Sign in with your administrator credentials to continue.</p>

                    @if(session('error'))
                        <div class="error-box" role="alert">
                            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="error-box" role="alert">
                            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            <div>
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        <div class="field">
                            <label for="username">Username</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </span>
                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    value="{{ old('username') }}"
                                    placeholder="Enter your username"
                                    required
                                    autocomplete="username"
                                    autofocus
                                >
                            </div>
                        </div>

                        <div class="field">
                            <label for="password">Password</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                                </span>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Enter your password"
                                    required
                                    autocomplete="current-password"
                                >
                            </div>
                        </div>

                        <button type="submit" class="btn-login">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            Sign In to Admin Panel
                        </button>
                    </form>
                </div>

                <div class="login-card-footer">
                    Not an administrator? <a href="{{ url('/') }}">Return to public portal</a>
                </div>
            </div>

        </div>
    </main>

    <footer>
        <div class="wrap footer-inner">
            <span>&copy; {{ date('Y') }} PenangPreneur Portal. All rights reserved.</span>
            <span>Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi & Keterjaminan Makanan Dan Keusahawanan</span>
        </div>
    </footer>

</body>
</html>