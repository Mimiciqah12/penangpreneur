<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Registrations Report</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            color: #1e293b;
            background: #fff;
        }

        /* ── Header ── */
        .header {
            border-bottom: 3px solid #1e40af;
            padding-bottom: 10px;
            margin-bottom: 14px;
        }

        .header-title {
            font-size: 17px;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 3px;
        }

        .header-sub {
            font-size: 8.5px;
            color: #64748b;
            margin-bottom: 1px;
        }

        /* ── Table ── */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead tr {
            background: #1e293b;
        }

        thead th {
            color: #fff;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 7px 6px;
            text-align: left;
            border: none;
        }

        thead th.center { text-align: center; }

        tbody tr { border-bottom: 1px solid #e2e8f0; }
        tbody tr:nth-child(even) { background: #f8fafc; }
        tbody tr:nth-child(odd)  { background: #ffffff; }

        tbody td {
            padding: 7px 6px;
            vertical-align: middle;
            border: none;
            word-wrap: break-word;
        }

        /* Column widths */
        .col-no     { width: 4%;  text-align: center; color: #94a3b8; font-weight: bold; font-size: 9px; }
        .col-ref    { width: 11%; color: #1e40af; font-weight: bold; font-size: 9px; }
        .col-name   { width: 13%; font-weight: 600; }
        .col-email  { width: 14%; color: #475569; }
        .col-phone  { width: 9%;  }
        .col-addr   { width: 13%; color: #475569; font-size: 9px; }
        .col-agency { width: 8%;  }
        .col-cat    { width: 8%;  text-align: center; }
        .col-paddr  { width: 13%; color: #475569; font-size: 9px; }
        .col-img    { width: 6%;  text-align: center; }
        .col-date   { width: 8%;  color: #475569; }

        /* Category badge */
        .badge {
            display: inline-block;
            background: #eff6ff;
            color: #1e40af;
            border: 1px solid #bfdbfe;
            border-radius: 3px;
            padding: 2px 5px;
            font-size: 8px;
            font-weight: bold;
        }

        /* Images */
        .thumbnail {
            max-width: 48px;
            max-height: 48px;
            object-fit: cover;
            border-radius: 3px;
            border: 1px solid #e2e8f0;
            display: block;
            margin: 0 auto;
        }

        .no-photo {
            color: #cbd5e1;
            font-size: 8px;
            font-style: italic;
        }

        /* ── Footer ── */
        .footer {
            margin-top: 14px;
            border-top: 1px solid #e2e8f0;
            padding-top: 7px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="header-title">PenangPreneur Registrations Report</div>
        <div class="header-sub">Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi &amp; Keterjaminan Makanan Dan Keusahawanan</div>
        <div class="header-sub">Generated: {{ date('d F Y, h:i A') }} &nbsp;&bull;&nbsp; Total records: {{ count($registrations) }}</div>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th class="col-no">#</th>
                <th class="col-ref">Reference</th>
                <th class="col-name">Full Name</th>
                <th class="col-email">Email</th>
                <th class="col-phone">Phone</th>
                <th class="col-addr">Address</th>
                <th class="col-agency">Agency</th>
                <th class="col-cat center">Category</th>
                <th class="col-paddr">Premises Address</th>
                <th class="col-img center">Product</th>
                <th class="col-img center">Premises</th>
                <th class="col-date">Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $index => $reg)

            @php
                // Product image
                $productPath = $reg->product_image ? public_path('storage/' . $reg->product_image) : null;
                $productB64  = null;
                if ($productPath && file_exists($productPath)) {
                    $ext        = strtolower(pathinfo($productPath, PATHINFO_EXTENSION));
                    $productB64 = 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($productPath));
                }

                // Premises image
                $premisesPath = $reg->premises_image ? public_path('storage/' . $reg->premises_image) : null;
                $premisesB64  = null;
                if ($premisesPath && file_exists($premisesPath)) {
                    $ext         = strtolower(pathinfo($premisesPath, PATHINFO_EXTENSION));
                    $premisesB64 = 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($premisesPath));
                }
            @endphp

            <tr>
                <td class="col-no">{{ $index + 1 }}</td>
                <td class="col-ref">{{ $reg->reference_number }}</td>
                <td class="col-name">{{ $reg->full_name }}</td>
                <td class="col-email">{{ $reg->email }}</td>
                <td class="col-phone">{{ $reg->phone_number ?? '—' }}</td>
                <td class="col-addr">{{ $reg->address ?? '—' }}</td>
                <td class="col-agency">{{ $reg->agency_name }}</td>
                <td class="col-cat"><span class="badge">{{ $reg->business_category }}</span></td>
                <td class="col-paddr">{{ $reg->premises_address ?? '—' }}</td>

                <td class="col-img">
                    @if($productB64)
                        <img src="{{ $productB64 }}" class="thumbnail" alt="Product">
                    @else
                        <span class="no-photo">None</span>
                    @endif
                </td>

                <td class="col-img">
                    @if($premisesB64)
                        <img src="{{ $premisesB64 }}" class="thumbnail" alt="Premises">
                    @else
                        <span class="no-photo">None</span>
                    @endif
                </td>

                <td class="col-date">{{ $reg->created_at->format('d M Y') }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <table width="100%" style="border:none;">
            <tr>
                <td style="border:none; padding:0; font-size:8px; color:#94a3b8;">
                    &copy; {{ date('Y') }} PenangPreneur Portal &mdash; Admin Export
                </td>
                <td style="border:none; padding:0; font-size:8px; color:#94a3b8; text-align:right;">
                    Tingkat 31, KOMTAR, 10000 Pulau Pinang &nbsp;|&nbsp; info@penangpreneur.gov.my
                </td>
            </tr>
        </table>
    </div>

</body>
</html>