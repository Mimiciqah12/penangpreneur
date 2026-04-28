<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     * Redirects unauthenticated visitors to the admin login page.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::get('admin_authenticated')) {
            return redirect()->route('admin.login')
                ->with('error', 'Please sign in to access the admin panel.');
        }

        return $next($request);
    }
}