<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Add a product to the cart
    public function addToCart(Request $request, $id)
    {
        // Fetch the product from the database
        $product = Product::findOrFail($id);

        // Get the current cart, or initialize it as an empty array
        $cart = Session::get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$id])) {
            // If the product is already in the cart, increase the quantity
            $cart[$id]['quantity']++;
        } else {
            // Add the product to the cart with an initial quantity of 1
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        // Save the cart to the session
        Session::put('cart', $cart);

        return redirect()->route('cart.view')->with('success', 'تمت إضافة المنتج إلى السلة بنجاح!');
    }

    // View the cart
    public function viewCart()
    {
        // Get the cart from the session
        $cart = Session::get('cart',[]);

        return view('cart.index', compact('cart'));
    }

    // Clear the cart
    public function clearCart()
    {
        // Forget the cart from the session
        Session::forget('cart');

        return redirect()->route('cart.view')->with('success', 'تم إفراغ السلة بنجاح!');
    }

    // Remove a product from the cart
    public function removeFromCart($id)
    {
        // Get the cart from the session
        $cart = Session::get('cart', []);

        // If the product exists in the cart, remove it
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        return redirect()->route('cart.view')->with('success', 'تمت إزالة المنتج من السلة');
    }
}