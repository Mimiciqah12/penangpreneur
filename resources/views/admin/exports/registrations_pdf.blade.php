<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Registrations Report</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        h2 { text-align: center; color: #1e293b; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #cbd5e1; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #f1f5f9; font-weight: bold; color: #334155; }
        .thumbnail { max-width: 60px; max-height: 60px; object-fit: cover; border-radius: 4px; }
        .no-photo { color: #94a3b8; font-style: italic; font-size: 9px; }
    </style>
</head>
<body>

    <h2>PenangPreneur Registrations Report</h2>
    <p>Generated on: {{ date('d M Y, h:i A') }}</p>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No.</th>
                <th style="width: 15%;">Reference</th>
                <th style="width: 10%;">Photo</th>
                <th style="width: 20%;">Full Name</th>
                <th style="width: 20%;">Email</th>
                <th style="width: 10%;">Contact</th>
                <th style="width: 10%;">Agency</th>
                <th style="width: 10%;">Category</th>
                <th style="width: 10%;">Registered Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $index => $reg)
            <tr>
                <td>{{ $index + 1 }}</td>
                
                <td>{{ $reg->reference_number }}</td>
                
                <td style="text-align: center;">
                    @php
                        $imagePath = $reg->product_image ? public_path('storage/' . $reg->product_image) : null;
                        $base64Image = null;

                        // Teknik Base64 supaya PDF di Laragon/Windows dapat baca gambar
                        if ($imagePath && file_exists($imagePath)) {
                            $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
                            $imageData = file_get_contents($imagePath);
                            $base64Image = 'data:image/' . $extension . ';base64,' . base64_encode($imageData);
                        }
                    @endphp

                    @if($base64Image)
                        <img src="{{ $base64Image }}" class="thumbnail" alt="Product">
                    @else
                        <span class="no-photo">No Image</span>
                    @endif
                </td>
                
                <td>{{ $reg->full_name }}</td>
                
                <td>{{ $reg->email }}</td>

                <td>{{ $reg->phone_number ?? '' }}</td>
                
                <td>{{ $reg->agency_name }}</td>
                
                <td>{{ $reg->business_category }}</td>
                
                <td>{{ $reg->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>