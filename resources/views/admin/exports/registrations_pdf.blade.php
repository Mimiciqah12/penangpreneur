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
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 14px;
        }

        .header-title {
            font-size: 17px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .header-sub {
            font-size: 9px;
            color: #475569;
            margin-bottom: 2px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead tr { background: #334155; }

        thead th {
            color: #fff;
            font-size: 9px;
            font-weight: bold;
            padding: 8px 7px;
            text-align: left;
            border: 1px solid #475569;
        }

        tbody tr:nth-child(even) { background: #f8fafc; }
        tbody tr:nth-child(odd)  { background: #ffffff; }

        tbody td {
            padding: 7px;
            vertical-align: middle;
            border: 1px solid #e2e8f0;
            word-wrap: break-word;
        }

        .col-no     { width: 3%;  text-align: center; }
        .col-ref    { width: 10%; }
        .col-name   { width: 11%; font-weight: 600; }
        .col-email  { width: 13%; }
        .col-phone  { width: 8%;  }
        .col-addr   { width: 12%; font-size: 9px; }
        .col-agency { width: 7%;  }
        .col-cat    { width: 7%;  }
        .col-paddr  { width: 12%; font-size: 9px; }
        .col-img    { width: 5%;  text-align: center; }
        .col-date   { width: 7%;  }

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
            color: #94a3b8;
            font-size: 8px;
            font-style: italic;
        }

        .footer {
            margin-top: 14px;
            border-top: 1px solid #e2e8f0;
            padding-top: 7px;
            display: flex;
            justify-content: space-between;
            font-size: 8px;
            color: #94a3b8;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="header-title">PenangPreneur Registrations Report</div>
        <div class="header-sub">Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi &amp; Keterjaminan Makanan Dan Keusahawanan</div>
        <div class="header-sub">
            Generated on: {{ now()->timezone('Asia/Kuala_Lumpur')->format('d F Y, h:i A') }}
            &nbsp;&bull;&nbsp; Total records: {{ count($registrations) }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th class="col-no">No.</th>
                <th class="col-ref">Reference</th>
                <th class="col-name">Full Name</th>
                <th class="col-email">Email</th>
                <th class="col-phone">Phone</th>
                <th class="col-addr">Address</th>
                <th class="col-agency">Agency</th>
                <th class="col-cat">Category</th>
                <th class="col-paddr">Premises Address</th>
                <th class="col-img">Product</th>
                <th class="col-img">Premises</th>
                <th class="col-date">Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $index => $reg)

            @php
                $productPath = $reg->product_image ? public_path('storage/' . $reg->product_image) : null;
                $productB64  = null;
                if ($productPath && file_exists($productPath)) {
                    $ext        = strtolower(pathinfo($productPath, PATHINFO_EXTENSION));
                    $productB64 = 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($productPath));
                }

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
                <td class="col-cat">{{ $reg->business_category }}</td>
                <td class="col-paddr">{{ $reg->premises_address ?? '—' }}</td>
                <td class="col-img">
                    @if($productB64)
                        <img src="{{ $productB64 }}" class="thumbnail" alt="Product">
                    @else
                        <span class="no-photo">No Image</span>
                    @endif
                </td>
                <td class="col-img">
                    @if($premisesB64)
                        <img src="{{ $premisesB64 }}" class="thumbnail" alt="Premises">
                    @else
                        <span class="no-photo">No Image</span>
                    @endif
                </td>
                <td class="col-date">{{ $reg->created_at->timezone('Asia/Kuala_Lumpur')->format('d M Y') }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <span>&copy; {{ now()->timezone('Asia/Kuala_Lumpur')->year }} PenangPreneur Portal &mdash; Admin Export</span>
        <span>Tingkat 31, KOMTAR, 10000 Pulau Pinang &nbsp;|&nbsp; info@penangpreneur.gov.my</span>
    </div>

</body>
</html>