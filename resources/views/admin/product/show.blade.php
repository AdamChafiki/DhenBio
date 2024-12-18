@extends('layout.app')

@section('title', 'عرض المنتج')

@section('header', 'تفاصيل المنتج')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Single Product Layout -->
        <div class="flex flex-col lg:flex-row items-center lg:items-start bg-white  rounded-lg overflow-hidden">
            <!-- Product Image -->
            <div ">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="w-96 h-full object-container">
                                </div>

                                <!-- Product Info -->
                                <div class="w-full lg:w-1/2 p-6 lg:p-10 text-right">
                                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                                    <p class="text-gray-600 text-lg mb-6">{{ $product->description }}</p>
                                    <span class="block text-teal-600 font-bold text-2xl mb-6">{{ $product->price }} MAD</span>

                                    <!-- Buttons -->
                                    <div class="flex flex-col items-center sm:flex-row gap-4">
                                        <!-- Add to Cart Button -->
        <!-- Add to Cart Button -->
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <button type="submit" class="bg-teal-600 flex items-center text-white px-6 py-3 rounded hover:bg-teal-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon ml-2">
                <path stroke="none" d=" M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M5 12l14 0" />
            </svg>
            أضف إلى السلة
            </button>
            </form>

            <span class="text-gray-600 text-sm font-semibold">أو</span>
            <!-- Order Now Button -->
            <button class="bg-orange-500 flex items-center text-white px-6 py-3 rounded hover:bg-orange-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart ml-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M17 17h-11v-14h-2" />
                    <path d="M6 5l14 1l-1 7h-13" />
                </svg>
                اطلب الآن
            </button>
        </div>
    </div>
    </div>
    </div>
@endsection
