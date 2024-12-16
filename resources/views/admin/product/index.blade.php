@extends('layout.admin')

@section('title', 'عرض المنتجات')

@section('header', 'قائمة المنتجات')

@section('content')
    <div class="p-4 bg-white rounded-lg shadow-md min-h-screen">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">المنتجات</h2>
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-teal-600 text-white">
                <tr>
                    <th class="border border-gray-300 p-2">الصورة</th>
                    <th class="border border-gray-300 p-2">اسم المنتج</th>
                    <th class="border border-gray-300 p-2">السعر</th>
                    <th class="border border-gray-300 p-2">الوصف</th>
                    <th class="border border-gray-300 p-2">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="bg-gray-100 border border-gray-300">
                        <td class="p-2 text-center">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-20 mx-auto">
                        </td>
                        <td class="p-2 text-center">{{ $product->name }}</td>
                        <td class="p-2 text-center">{{ number_format($product->price, 2) }} درهم</td>
                        <td class="p-2 text-center">{{ $product->description }}</td>
                        <td class="p-2 text-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline">تعديل</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">لا توجد منتجات.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
