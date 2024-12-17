<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = App\Models\Product::all();
    return view('welcome', compact('products'));
});


// Show login form
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Handle login submission
Route::post('/admin/login', [AdminController::class, 'login']);

// Admin dashboard (protected by middleware)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('admin')->name('admin.dashboard');

// Admin logout
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


//Product
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('products', ProductController::class);
});