<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Show login form
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Handle login submission
Route::post('/admin/login', [AdminController::class, 'login']);

// Admin dashboard (protected by middleware)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('admin')->name('admin.dashboard');

// Admin logout
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');









        // Redirect back to login with error message
        // return redirect('/admin/login')->withErrors(['message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة']);});