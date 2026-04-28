<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

// ── PUBLIC ROUTES ──

// Home page
Route::get('/', function () {
    return view('index');
})->name('home');

// Registration form
Route::get('/register', [RegistrationController::class, 'create'])->name('register');

// Handle form submission
Route::post('/submit-registration', [RegistrationController::class, 'store'])->name('register.submit');

// Success page
Route::get('/success', [RegistrationController::class, 'success'])->name('register.success');


// ── ADMIN AUTH ROUTES (unauthenticated — public) ──

Route::get('/admin/login',  [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout',[AdminAuthController::class, 'logout'])->name('admin.logout');


// ── ADMIN ROUTES (protected) ──

Route::prefix('admin')
    ->name('admin.')
    ->middleware(\App\Http\Middleware\AdminAuthenticated::class)
    ->group(function () {

        // Eksport Excel dan PDF MESTI berada di atas route /{id} supaya
        // perkataan 'export' tidak dibaca sebagai ID pendaftaran.
        Route::get('/export/excel', [AdminController::class, 'exportExcel'])->name('export.excel');
        Route::get('/export/pdf',   [AdminController::class, 'exportPdf'])->name('export.pdf');

        // Laluan utama dan pengurusan rekod
        Route::get('/',        [AdminController::class, 'index'])->name('index');
        Route::get('/{id}',    [AdminController::class, 'show'])->name('show');
        Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');
    });