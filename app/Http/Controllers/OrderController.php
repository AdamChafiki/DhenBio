<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);


        Costumer::create([
            'name' => $request->name,
            'city' => $request->city,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        // Handle the order submission logic here
        Session::put('cart', []);

        return redirect()->back()->with('success', 'تم تقديم الطلب بنجاح');
    }
}
