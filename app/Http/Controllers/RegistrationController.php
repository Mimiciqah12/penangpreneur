<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Handle form submission, save to DB, send confirmation email, redirect to success page.
     */
    public function store(Request $request)
    {
        // 1. Validate all fields
        $validated = $request->validate([
            'full_name'           => 'required|string|max:255',
            'phone_number'        => 'required|string|max:20',
            'email'               => 'required|email|max:255',
            'agency_name'         => 'required|string|max:255',
            'business_category'   => 'required|string|max:255',
            'product_name'        => 'required|string|max:255',
            'product_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'product_description' => 'required|string',
        ]);

        // 2. Handle product image upload
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');
        }

        // 3. Generate a unique reference number e.g. ENT-2026-XXXX
        $referenceNumber = 'ENT-' . date('Y') . '-' . strtoupper(Str::random(4));

        // 4. Save to database
        $registration = Registration::create([
            'full_name'           => $validated['full_name'],
            'phone_number'        => $validated['phone_number'],
            'email'               => $validated['email'],
            'agency_name'         => $validated['agency_name'],
            'business_category'   => $validated['business_category'],
            'product_name'        => $validated['product_name'],
            'product_image'       => $imagePath,
            'product_description' => $validated['product_description'],
            'reference_number'    => $referenceNumber,
        ]);

       // 5. Send confirmation email to the user
Mail::send('emails.registration_confirmation', [
    'registration' => $registration,
], function ($message) use ($registration) {
    $message->to($registration->email, $registration->full_name)
            ->subject('Registration Confirmation — Entrepreneur Portal');
});

        // 6. Redirect to success page, passing the reference number
        return redirect()->route('register.success')
                         ->with('reference_number', $registration->reference_number)
                         ->with('full_name', $registration->full_name);
    }

    /**
     * Show the success page.
     */
    public function success()
    {
        // If someone visits /success directly without submitting, send them back
        if (!session('reference_number')) {
            return redirect()->route('register');
        }

        return view('success');
    }
}