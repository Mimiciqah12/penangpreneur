<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLogin()
    {
        // Already authenticated — redirect to dashboard
        if (Session::get('admin_authenticated')) {
            return redirect()->route('admin.index');
        }

        return view('admin.login');
    }

    /**
     * Handle the admin login form submission.
     *
     * Credentials are stored in config/admin.php (or .env).
     * Never hard-code passwords in source code.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $validUsername = config('admin.username', env('ADMIN_USERNAME', 'admin'));
        $validPassword = config('admin.password', env('ADMIN_PASSWORD', 'changeme'));

        if (
            $request->username === $validUsername &&
            $request->password === $validPassword
        ) {
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();
            Session::put('admin_authenticated', true);

            return redirect()->intended(route('admin.index'));
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Invalid username or password.']);
    }

    /**
     * Log the admin out.
     */
    public function logout(Request $request)
    {
        Session::forget('admin_authenticated');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'You have been signed out.');
    }
}