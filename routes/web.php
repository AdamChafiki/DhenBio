<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    $products = App\Models\Product::all();
    return view('welcome', compact('products'));
});



// Admin
// Show login form
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Handle login submission
Route::post('/admin/login', [AdminController::class, 'login']);

// Admin dashboard (protected by middleware)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('admin')->name('admin.dashboard');

// Admin logout
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('products', ProductController::class)->except('show');
});

Route::get('/admin/customers', [AdminController::class, 'showCustomers'])->name('admin.customers');


// Public `show` route for customers
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show'); // Use "products.show"



// cart
// View the cart
Route::get('cart', [CartController::class, 'viewCart'])->name('cart.view');

// Add to cart
Route::post('cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

// Clear the cart
Route::post('cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

// Remove from cart
Route::post('cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');



// Order
Route::post('/submit-order', [OrderController::class, 'submitOrder'])->name('order.submit');
Route::get('//admin/orders', [OrderController::class, 'showOrders'])->name('order.show');
Route::put('/admin/orders/{orderId}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');