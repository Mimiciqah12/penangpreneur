<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf; // Diperlukan untuk fungsi eksport PDF

class AdminController extends Controller
{
    /**
     * Show all registrations with search & filter.
     */
    public function index(Request $request)
    {
        $registrations = $this->filteredRegistrations($request)->paginate(10);

        // Stats for the top cards
        $total           = Registration::count();
        $thisMonth       = Registration::whereMonth('created_at', now()->month)
                                       ->whereYear('created_at', now()->year)
                                       ->count();
        $totalAgencies   = Registration::distinct('agency_name')->count('agency_name');
        $totalCategories = Registration::distinct('business_category')->count('business_category');

        return view('admin.index', compact(
            'registrations',
            'total',
            'thisMonth',
            'totalAgencies',
            'totalCategories'
        ));
    }

    /**
     * Export registrations as an Excel-friendly CSV file.
     */
    public function exportExcel(Request $request)
    {
        $registrations = $this->filteredRegistrations($request)->get();
        $fileName = 'registrations-' . now()->format('Y-m-d-His') . '.csv';

        return response()->streamDownload(function () use ($registrations) {
            $handle = fopen('php://output', 'w');

            // UTF-8 BOM helps Excel display characters correctly.
            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'Reference Number',
                'Full Name',
                'Phone Number',
                'Email',
                'Agency Name',
                'Business Category',
                'Product Name',
                'Product Description',
                'Product Image',
                'Registered At',
            ]);

            foreach ($registrations as $registration) {
                fputcsv($handle, [
                    $registration->reference_number,
                    $registration->full_name,
                    $registration->phone_number,
                    $registration->email,
                    $registration->agency_name,
                    $registration->business_category,
                    $registration->product_name,
                    $registration->product_description,
                    $registration->product_image ? asset('storage/' . $registration->product_image) : '',
                    optional($registration->created_at)->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($handle);
        }, $fileName, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /**
     * Export registrations as a PDF file with images.
     */
    public function exportPdf(Request $request)
    {
        // Ambil semua data berdasarkan filter (tanpa pagination)
        $registrations = $this->filteredRegistrations($request)->get();

        // Load view fail PDF dan hantar data
        $pdf = Pdf::loadView('admin.exports.registrations_pdf', compact('registrations'))
                  ->setPaper('a4', 'landscape'); // Guna format memanjang (landscape) supaya jadual muat

        $fileName = 'registrations-report-' . now()->format('Y-m-d-His') . '.pdf';
        
        return $pdf->download($fileName);
    }

    /**
     * Show full detail of one registration.
     */
    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('admin.show', compact('registration'));
    }

    /**
     * Delete a registration.
     */
    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);

        // Delete the product image from storage if it exists
        if ($registration->product_image) {
            Storage::disk('public')->delete($registration->product_image);
        }

        $registration->delete();

        return redirect()->route('admin.index')
                         ->with('success', 'Registration deleted successfully.');
    }

    /**
     * Build the filtered registrations query used by the list and export.
     */
    protected function filteredRegistrations(Request $request)
    {
        return Registration::query()
            ->latest()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('full_name', 'like', '%' . $request->search . '%');
            })
            ->when($request->filled('agency'), function ($query) use ($request) {
                $query->where('agency_name', $request->agency);
            })
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('business_category', $request->category);
            });
    }
}