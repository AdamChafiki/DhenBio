<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {
        // Validate customer information
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Create the customer
        $costumer = Costumer::create([
            'name' => $request->name,
            'city' => $request->city,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        // Get the cart from the session
        $cart = Session::get('cart');

        // Initialize total price
        $totalPrice = 0;

        // Loop through the cart items and save the order details for each product
        foreach ($cart as $productId => $item) {
            // Calculate the total for each item
            $itemTotal = $item['price'] * 1; // You can modify quantity if needed
            $totalPrice += $itemTotal;

            // Create the order for this product
            Order::create([
                'product_id' => $productId, // Product ID from the cart
                'costumer_id' => $costumer->id, // Link to the customer
                'status' => 'قيد الانتظار', // Default order status
                'total_price' => $itemTotal, // Total price for this product
            ]);
        }
        // Clear the cart from the session after the order is placed
        Session::forget('cart');

        // Redirect with a success message
        return redirect()->back()->with('success', 'تم تقديم الطلب بنجاح');
    }

    public function showOrders()
    {
        $orders = Order::with('customer', 'product')->get();


        $admin = Auth::user();
        // Pass orders and unique customers count to the view
        return view('admin.order.index', compact('orders', 'admin'));
    }

    public function updateStatus(Request $request, $orderId)
    {
        // Validate status input
        $request->validate([
            'status' => 'required|string|in:قيد الانتظار,مكتمل,ملغى',
        ]);

        // Find the order and update the status
        $order = Order::findOrFail($orderId);
        $order->status = $request->status;
        $order->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'تم تحديث الحالة بنجاح');
    }
}