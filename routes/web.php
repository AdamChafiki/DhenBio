<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

// Show login form
Route::get('/admin/login', function () {
    return view('admin.login');
});

// Admin dashboard (protected by middleware)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin');

// Handle login submission
Route::post('/admin/login', function (Request $request) {
    // Validate email and password
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Hardcoded admin credentials for simplicity
    $adminEmail = 'admin@example.com';
    $adminPassword = 'admin@example.com';

    // Check if provided credentials match admin credentials
    if ($request->email === $adminEmail && $request->password === $adminPassword) {
        // Store admin status in session
        session(['admin' => true]);

        // Redirect to dashboard
        return redirect('/admin/dashboard');
    } else {
        // Redirect back to login with error message
        return redirect('/admin/login')->withErrors(['message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة']);
    }
});

Route::get('/admin/logout', function () {
    session()->forget('admin');
    return redirect('/admin/login');
});