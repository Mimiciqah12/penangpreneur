<?php

/*
|--------------------------------------------------------------------------
| Admin Credentials Config  (config/admin.php)
|--------------------------------------------------------------------------
|
| Store admin credentials here, sourced from .env so they are never
| committed to version control.
|
| In your .env file add:
|
|   ADMIN_USERNAME=your_username_here
|   ADMIN_PASSWORD=your_strong_password_here
|
| Then run:  php artisan config:cache
|
*/

return [
    'username' => env('ADMIN_USERNAME', 'admin'),
    'password' => env('ADMIN_PASSWORD', 'changeme'),
];


/*
|--------------------------------------------------------------------------
| SETUP INSTRUCTIONS
|--------------------------------------------------------------------------
|
| 1. COPY FILES
|    - admin-login.blade.php   → resources/views/admin/login.blade.php
|    - admin-index.blade.php   → resources/views/admin/index.blade.php
|    - AdminAuthController.php → app/Http/Controllers/AdminAuthController.php
|    - AdminAuthenticated.php  → app/Http/Middleware/AdminAuthenticated.php
|    - admin.php               → config/admin.php
|    - Replace web.php         → routes/web.php
|
| 2. REGISTER MIDDLEWARE (Laravel 10 and below only)
|    In app/Http/Kernel.php, add to $routeMiddleware:
|
|      'admin.auth' => \App\Http\Middleware\AdminAuthenticated::class,
|
|    (Laravel 11+: middleware is auto-discovered, no Kernel.php needed)
|
| 3. SET CREDENTIALS IN .env
|    ADMIN_USERNAME=your_username
|    ADMIN_PASSWORD=your_very_strong_password
|
| 4. CLEAR CACHE
|    php artisan config:cache
|    php artisan route:cache
|
| 5. DONE
|    Visit /admin  → redirected to /admin/login
|    Log in        → redirected to /admin dashboard
|    Sign out      → returns to /admin/login
|
*/