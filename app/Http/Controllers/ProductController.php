<?php

namespace App\Http\Controllers;

use App\Models\Product; // Use the Product model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::user();

        $products = Product::all(); // Retrieve all products
        return view('admin.product.index', compact('products','admin'));
    }

    public function create()
    {
        $admin = Auth::user();
        return view('admin.product.create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'اسم المنتج مطلوب.',
            'price.required' => 'سعر المنتج مطلوب.',
            'description.required' => 'وصف المنتج مطلوب.',
            'image.required' => 'يجب تحميل صورة المنتج.',
            'image.image' => 'يجب أن يكون الملف صورة.',
            'image.mimes' => 'يجب أن تكون الصورة بصيغة JPEG, PNG، أو JPG.',
        ]);

        // Handle File Upload
        $imagePath = $request->file('image')->store('products', 'public'); 

        $validatedData['image'] = $imagePath;

        Product::create($validatedData); 

        return redirect()->route('products.index')->with('success', 'تم إضافة المنتج بنجاح!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $admin = Auth::user();
        return view('admin.product.edit', compact('product', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'اسم المنتج مطلوب.',
            'price.required' => 'سعر المنتج مطلوب.',
            'description.required' => 'وصف المنتج مطلوب.',
            'image.image' => 'يجب أن يكون الملف صورة.',
            'image.mimes' => 'يجب أن تكون الصورة بصيغة JPEG, PNG، أو JPG.',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // Store the image
            $validatedData['image'] = $imagePath; 
        }

        $product->update($validatedData); 

        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        // Redirect with a sucess message
        return redirect()->route('products.index')->with('success', 'تم حذف المنتج بنجاح!');
    }
}