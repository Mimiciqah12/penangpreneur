<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: 'DM Sans', Arial, sans-serif;
            background: #f5f5f3;
            margin: 0;
            padding: 40px 20px;
            color: #0d1117;
        }

        .wrapper {
            max-width: 560px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #8a909e;
        }

        .dot {
            display: inline-block;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #c9a84c;
            margin-right: 6px;
            vertical-align: middle;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e8e8e4;
            border-radius: 10px;
            padding: 40px 36px;
        }

        .check-icon {
            width: 60px;
            height: 60px;
            background: #f5f5f3;
            border: 1px solid #e8e8e4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 24px;
        }

        h1 {
            font-size: 22px;
            font-weight: 700;
            color: #0d1117;
            text-align: center;
            margin: 0 0 10px;
        }

        .subtitle {
            font-size: 14px;
            color: #8a909e;
            text-align: center;
            margin: 0 0 32px;
            line-height: 1.7;
            font-weight: 300;
        }

        .ref-box {
            background: #f5f5f3;
            border: 1px solid #e8e8e4;
            border-radius: 6px;
            padding: 16px 20px;
            text-align: center;
            margin-bottom: 32px;
        }

        .ref-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #8a909e;
            margin-bottom: 6px;
        }

        .ref-number {
            font-size: 22px;
            font-weight: 700;
            color: #c9a84c;
            letter-spacing: 0.04em;
        }

        .divider {
            border: none;
            border-top: 1px solid #e8e8e4;
            margin: 0 0 24px;
        }

        .details-title {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #8a909e;
            margin-bottom: 14px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            padding: 8px 0;
            border-bottom: 1px solid #f5f5f3;
        }

        .detail-row:last-child { border-bottom: none; }

        .detail-key {
            color: #8a909e;
            font-weight: 400;
        }

        .detail-val {
            color: #0d1117;
            font-weight: 500;
            text-align: right;
        }

        .cta {
            text-align: center;
            margin-top: 32px;
        }

        .cta a {
            display: inline-block;
            background: #0d1117;
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 6px;
        }

        .footer {
            text-align: center;
            margin-top: 28px;
            font-size: 12px;
            color: #8a909e;
            line-height: 1.7;
            font-weight: 300;
        }
    </style>
</head>
<body>
    <div class="wrapper">

        <div class="header">
            <p class="brand"><span class="dot"></span>Entrepreneur Portal</p>
        </div>

        <div class="card">

            <div class="check-icon">✓</div>

            <h1>Registration Confirmed</h1>
            <p class="subtitle">
                Dear {{ $registration->full_name }},<br>
                your business registration has been successfully submitted.
            </p>

            <div class="ref-box">
                <p class="ref-label">Your Reference Number</p>
                <p class="ref-number">{{ $registration->reference_number }}</p>
            </div>

            <hr class="divider">

            <p class="details-title">Submission Details</p>

            <div class="detail-row">
                <span class="detail-key">Full Name</span>
                <span class="detail-val">{{ $registration->full_name }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Phone Number</span>
                <span class="detail-val">{{ $registration->phone_number }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Email</span>
                <span class="detail-val">{{ $registration->email }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Agency</span>
                <span class="detail-val">{{ $registration->agency_name }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Business Category</span>
                <span class="detail-val">{{ $registration->business_category }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Product Name</span>
                <span class="detail-val">{{ $registration->product_name }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Submitted On</span>
                <span class="detail-val">{{ $registration->created_at->format('d M Y, h:i A') }}</span>
            </div>

            <div class="cta">
                <a href="{{ url('/') }}">Back to Portal</a>
            </div>

        </div>

        <div class="footer">
            <p>This is an automated confirmation. Please do not reply to this email.</p>
            <p>© {{ date('Y') }} Entrepreneur Portal. All rights reserved.</p>
        </div>

    </div>
</body>
</html>