<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — PenangPreneur Portal</title>

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
            --danger: #b91c1c;
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
            -webkit-font-smoothing: antialiased;
        }

        a:focus-visible,
        button:focus-visible,
        input:focus-visible,
        select:focus-visible,
        textarea:focus-visible,
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
            font-feature-settings: "kern" 1;
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

        main {
            background: var(--surface);
            min-height: calc(100vh - 4rem);
        }

        .register {
            background: linear-gradient(180deg, var(--accent-soft) 0%, var(--surface) 20%);
            border-bottom: 1px solid var(--border);
        }

        .register::before {
            content: '';
            display: block;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), #3b82f6, var(--accent));
            opacity: 0.85;
        }

        .register-inner {
            padding: 2.25rem 0 3rem;
        }

        .register-head {
            max-width: 44rem;
            margin-bottom: 1.5rem;
        }

        .tag {
            display: inline-block;
            font-size: 0.6875rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.8rem;
        }

        h1 {
            font-family: var(--serif);
            font-size: clamp(2rem, 4vw, 2.7rem);
            font-weight: 600;
            letter-spacing: 0.01em;
            line-height: 1.15;
            margin-bottom: 0.75rem;
        }

        .lead {
            color: var(--text-muted);
            font-size: 1rem;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: 0 10px 30px -18px rgba(15, 23, 42, 0.16);
            overflow: hidden;
        }

        .card-inner { padding: 1.4rem; }
        
        @media (min-width: 900px) {
            .card-inner { padding: 2rem; }
        }

        .errors {
            margin-bottom: 1rem;
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #991b1b;
            border-radius: var(--radius);
            padding: 0.75rem 0.9rem;
            font-size: 0.875rem;
        }

        .section-title {
            font-family: var(--serif);
            font-size: 1.25rem;
            letter-spacing: 0.02em;
            margin-bottom: 0.9rem;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem 1.2rem;
            margin-bottom: 1.25rem;
        }

        @media (min-width: 900px) {
            .grid { grid-template-columns: 1fr 1fr; }
            .span-2 { grid-column: 1 / -1; }
        }

        .field { display: flex; flex-direction: column; }

        .field label {
            font-size: 0.8125rem;
            font-weight: 600;
            letter-spacing: 0.01em;
            color: var(--text-muted);
            margin-bottom: 0.4rem;
        }

        .field input,
        .field select,
        .field textarea {
            font-family: var(--sans);
            font-size: 0.9375rem;
            color: var(--text);
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 0.65rem 0.8rem;
            width: 100%;
        }

        .field textarea { resize: vertical; min-height: 120px; }

        .field input::placeholder,
        .field textarea::placeholder { color: #94a3b8; }

        .field select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.8rem center;
            padding-right: 2rem;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
            background: #fff;
            outline: none;
        }

        .field input[type="file"] {
            padding: 0.5rem 0.75rem;
            cursor: pointer;
            color: var(--text-light);
            background: #fff;
        }

        .field input[type="file"]::file-selector-button {
            font-family: var(--sans);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            border: none;
            border-radius: var(--radius);
            padding: 0.35rem 0.75rem;
            margin-right: 0.7rem;
            cursor: pointer;
            background: var(--brand);
            color: #fff;
        }

        .divider {
            border: 0;
            border-top: 1px solid var(--border);
            margin: 1rem 0 1.2rem;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: flex-end;
            margin-top: 1rem;
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
            </nav>
        </div>
    </header>

    <main>
        <section class="register" aria-labelledby="register-heading">
            <div class="wrap register-inner">
                <div class="register-head">
                    <p class="tag">New registration</p>
                    <h1 id="register-heading">Entrepreneur Registration</h1>
                    <p class="lead">Fill in the details below to register your business in the PenangPreneur portal.</p>
                </div>

                <div class="card">
                    <div class="card-inner">
                        @if ($errors->any())
                            <div class="errors">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <h2 class="section-title">Personal Information</h2>
                            <div class="grid">
                                <div class="field">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="e.g. Ahmad bin Ali" required>
                                </div>
                                <div class="field">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="e.g. 012-3456789" required>
                                </div>
                                <div class="field span-2">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="e.g. ahmad@example.com" required>
                                </div>
                            </div>

                            <hr class="divider">

                            <h2 class="section-title">Business Details</h2>
                            <div class="grid">
                                <div class="field">
                                    <label for="agency_name">Agency Name</label>
                                    <select id="agency_name" name="agency_name" required>
                                        <option value="" disabled {{ old('agency_name') ? '' : 'selected' }}>Select an agency</option>
                                        <option value="ICU" {{ old('agency_name') === 'ICU' ? 'selected' : '' }}>ICU</option>
                                        <option value="KEMAS" {{ old('agency_name') === 'KEMAS' ? 'selected' : '' }}>KEMAS</option>
                                        <option value="FAMA" {{ old('agency_name') === 'FAMA' ? 'selected' : '' }}>FAMA</option>
                                        <option value="PDC" {{ old('agency_name') === 'PDC' ? 'selected' : '' }}>PDC</option>
                                        <option value="MARA" {{ old('agency_name') === 'MARA' ? 'selected' : '' }}>MARA</option>
                                        <option value="TEKUN" {{ old('agency_name') === 'TEKUN' ? 'selected' : '' }}>TEKUN</option>
                                        <option value="PERDA" {{ old('agency_name') === 'PERDA' ? 'selected' : '' }}>PERDA</option>
                                        <option value="RISDA" {{ old('agency_name') === 'RISDA' ? 'selected' : '' }}>RISDA</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label for="business_category">Business Category</label>
                                    <select id="business_category" name="business_category" required>
                                        <option value="" disabled {{ old('business_category') ? '' : 'selected' }}>Select a category</option>
                                        <option value="Food" {{ old('business_category') === 'Food' ? 'selected' : '' }}>Food &amp; Beverage</option>
                                        <option value="Fashion" {{ old('business_category') === 'Fashion' ? 'selected' : '' }}>Fashion &amp; Apparel</option>
                                        <option value="Agriculture" {{ old('business_category') === 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                                        <option value="Services" {{ old('business_category') === 'Services' ? 'selected' : '' }}>Services</option>
                                        <option value="Beauty" {{ old('business_category') === 'Beauty' ? 'selected' : '' }}>Beauty &amp; Cosmetics</option>
                                        <option value="Handicraft" {{ old('business_category') === 'Handicraft' ? 'selected' : '' }}>Handicraft</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}" placeholder="Enter product name" required>
                                </div>
                                <div class="field">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Enter address" required>
                                </div>
                                <div class="field">
                                    <label for="premises_address">Premises Address</label>
                                    <input type="text" id="premises_address" name="premises_address" value="{{ old('premises_address') }}" placeholder="Enter premises address" required>
                                </div>

                                <div class="field">
                                    <label for="product_image">Product Image</label>
                                    <input type="file" id="product_image" name="product_image" accept="image/*">
                                </div>
                                
                                <div class="field">
                                    <label for="premises_image">Premises Image</label>
                                    <input type="file" id="premises_image" name="premises_image" accept="image/*">
                                </div>

                                <div class="field span-2">
                                    <label for="product_description">Product Description</label>
                                    <textarea id="product_description" name="product_description" placeholder="Briefly describe your product..." required>{{ old('product_description') }}</textarea>
                                </div>
                            </div>

                            <div class="actions">
                                <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit Registration</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="wrap footer-inner">
            <p class="footer-copy">&copy; {{ date('Y') }} PenangPreneur Portal. All rights reserved.</p>
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