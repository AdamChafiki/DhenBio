@extends('layout.admin') <!-- Assuming you have a base layout for the app -->

@section('content')
<div class="container mx-auto my-5">
    <h2 class="text-2xl font-semibold mb-4">تحديث المنتج</h2>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT') <!-- This ensures the form uses the PUT method for updating -->

        <!-- Product Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">اسم المنتج</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Product Price -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">سعر المنتج</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Product Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">وصف المنتج</label>
            <textarea id="description" name="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Product Image (optional) -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">صورة المنتج</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            <p class="mt-2 text-xs text-gray-500">إذا كنت ترغب في تغيير الصورة، يرجى تحميل صورة جديدة.</p>
        </div>

        <!-- Display current product image -->
        @if ($product->image)
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">الصورة الحالية</label>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="mt-2 max-w-full h-auto">
            </div>
        @endif

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">تحديث المنتج</button>
        </div>
    </form>
</div>
@endsection
