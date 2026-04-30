<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Registrations Report</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; color: #1e293b; }

        /* ── Header ── */
        .report-header { text-align: center; margin-bottom: 18px; border-bottom: 2px solid #1e40af; padding-bottom: 10px; }
        .report-header h2 { font-size: 16px; color: #1e40af; margin: 0 0 4px; }
        .report-header p { margin: 2px 0; color: #475569; font-size: 9px; }

        /* ── Table ── */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; table-layout: fixed; }

        th, td {
            border: 1px solid #cbd5e1;
            padding: 6px 7px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
        }

        th {
            background-color: #1e40af;
            color: #ffffff;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        tbody tr:nth-child(even) { background-color: #f8fafc; }
        tbody tr:nth-child(odd)  { background-color: #ffffff; }

        /* ── Cells ── */
        .cell-no    { width: 3%;  text-align: center; font-weight: bold; color: #64748b; }
        .cell-ref   { width: 10%; font-weight: bold; color: #1e40af; font-size: 9px; }
        .cell-name  { width: 12%; font-weight: 600; }
        .cell-email { width: 13%; }
        .cell-phone { width: 9%;  }
        .cell-addr  { width: 14%; font-size: 9px; color: #334155; }
        .cell-agency{ width: 9%;  }
        .cell-cat   { width: 8%;  }
        .cell-paddr { width: 14%; font-size: 9px; color: #334155; }
        .cell-img   { width: 8%;  text-align: center; }
        .cell-date  { width: 7%;  white-space: nowrap; color: #475569; }

        /* ── Images ── */
        .thumbnail {
            max-width: 55px;
            max-height: 55px;
            object-fit: cover;
            border-radius: 3px;
            border: 1px solid #e2e8f0;
            display: block;
            margin: 0 auto 3px;
        }

        .img-label {
            font-size: 7.5px;
            color: #94a3b8;
            text-align: center;
            display: block;
        }

        .no-photo {
            color: #94a3b8;
            font-style: italic;
            font-size: 8px;
            display: block;
            text-align: center;
        }

        /* ── Category badge ── */
        .badge {
            display: inline-block;
            background: #eff6ff;
            color: #1e40af;
            border: 1px solid #bfdbfe;
            border-radius: 3px;
            padding: 1px 4px;
            font-size: 8px;
            font-weight: bold;
        }

        /* ── Footer ── */
        .report-footer {
            margin-top: 16px;
            border-top: 1px solid #e2e8f0;
            padding-top: 6px;
            font-size: 8px;
            color: #94a3b8;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

    <!-- Report Header -->
    <div class="report-header">
        <h2>PenangPreneur Registrations Report</h2>
        <p>Pejabat EXCO Pembangunan Luar Bandar, Agroteknologi &amp; Keterjaminan Makanan Dan Keusahawanan</p>
        <p>Generated on: {{ date('d F Y, h:i A') }} &nbsp;|&nbsp; Total records: {{ count($registrations) }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="cell-no">No.</th>
                <th class="cell-ref">Reference</th>
                <th class="cell-name">Full Name</th>
                <th class="cell-email">Email</th>
                <th class="cell-phone">Phone</th>
                <th class="cell-addr">Address</th>
                <th class="cell-agency">Agency</th>
                <th class="cell-cat">Category</th>
                <th class="cell-paddr">Premises Address</th>
                <th class="cell-img">Product Image</th>
                <th class="cell-img">Premises Image</th>
                <th class="cell-date">Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $index => $reg)
            <tr>

                {{-- No. --}}
                <td class="cell-no">{{ $index + 1 }}</td>

                {{-- Reference --}}
                <td class="cell-ref">{{ $reg->reference_number }}</td>

                {{-- Full Name --}}
                <td class="cell-name">{{ $reg->full_name }}</td>

                {{-- Email --}}
                <td class="cell-email">{{ $reg->email }}</td>

                {{-- Phone --}}
                <td class="cell-phone">{{ $reg->phone_number ?? '—' }}</td>

                {{-- Personal Address --}}
                <td class="cell-addr">{{ $reg->address ?? '—' }}</td>

                {{-- Agency --}}
                <td class="cell-agency">{{ $reg->agency_name }}</td>

                {{-- Category --}}
                <td class="cell-cat"><span class="badge">{{ $reg->business_category }}</span></td>

                {{-- Premises Address --}}
                <td class="cell-paddr">{{ $reg->premises_address ?? '—' }}</td>

                {{-- Product Image --}}
                <td class="cell-img">
                    @php
                        $productPath   = $reg->product_image   ? public_path('storage/' . $reg->product_image)   : null;
                        $productBase64 = null;
                        if ($productPath && file_exists($productPath)) {
                            $ext           = pathinfo($productPath, PATHINFO_EXTENSION);
                            $productBase64 = 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($productPath));
                        }
                    @endphp
                    @if($productBase64)
                        <img src="{{ $productBase64 }}" class="thumbnail" alt="Product">
                        <span class="img-label">Product</span>
                    @else
                        <span class="no-photo">No image</span>
                    @endif
                </td>

                {{-- Premises Image --}}
                <td class="cell-img">
                    @php
                        $premisesPath   = $reg->premises_image   ? public_path('storage/' . $reg->premises_image)   : null;
                        $premisesBase64 = null;
                        if ($premisesPath && file_exists($premisesPath)) {
                            $ext            = pathinfo($premisesPath, PATHINFO_EXTENSION);
                            $premisesBase64 = 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($premisesPath));
                        }
                    @endphp
                    @if($premisesBase64)
                        <img src="{{ $premisesBase64 }}" class="thumbnail" alt="Premises">
                        <span class="img-label">Premises</span>
                    @else
                        <span class="no-photo">No image</span>
                    @endif
                </td>

                {{-- Registered Date --}}
                <td class="cell-date">{{ $reg->created_at->format('d M Y') }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Report Footer -->
    <div class="report-footer">
        <span>&copy; {{ date('Y') }} PenangPreneur Portal — Admin Export</span>
        <span>Tingkat 31, KOMTAR, 10000 Pulau Pinang &nbsp;|&nbsp; info@penangpreneur.gov.my</span>
    </div>

</body>
</html>