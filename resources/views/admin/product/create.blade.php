@extends('layout.admin')

@section('title', 'لوحة تحكم')

@section('header', 'إضافة منتج')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-gray-50 shadow-lg rounded-lg">
    <div class="p-6 bg-teal-600 rounded-t-lg text-white">
        <h2 class="text-2xl font-bold text-center">إضافة منتج جديد</h2>
    </div>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Product Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">اسم المنتج</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                       class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">سعر المنتج</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ old('price') }}"
                       class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500">
                @error('price')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Product Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">وصف المنتج</label>
            <textarea name="description" id="description" rows="4" 
                      class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Product Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">صورة المنتج</label>
            <input type="file" name="image" id="image" accept="image/*" 
                   class="mt-1 block w-full text-gray-700" onchange="previewImage(event)">
            <div class="mt-3">
                <img id="image-preview" class="max-w-xs rounded-lg shadow" style="display: none;" />
            </div>
            @error('image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="px-6 py-3 text-white bg-teal-600 rounded-lg shadow hover:bg-teal-700 focus:ring-4 focus:ring-teal-400 focus:outline-none">
                إضافة المنتج
            </button>
        </div>
    </form>
</div>

<!-- JavaScript for Image Preview -->
<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('image-preview');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '';
            imagePreview.style.display = 'none';
        }
    }
</script>
@endsection
