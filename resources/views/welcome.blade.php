@extends('layout.app')

@section('title', 'الرئيسية') <!-- Optional title for the page -->
@section('content')
    {{-- Hero Section --}}
    <section class="flex items-center relative  p-7 bg-gray-100">
        <div class="z-20">
            <img class="img-fluid" src="https://dhenbio.com/Theme1/img/home/hero-banner.jpg" alt>
        </div>
        <div class="space-y-4 mr-2 ">
            <h1 class="text-2xl font-semibold text-gray-500">الراعي الرسمي للسعادة</h1>
            <h3 class="text-5xl font-bold"> شركة الدهن بيو</h3>
            <p class="break-words w-96">
                على طريق السعادة ، تجدنا في انتظارك ... تستنشق من عبير منتوجاتنا الحياة ... الاصالة ، والعراقة ، والصفاء ...
                #دهن_بيو والسعادة للجميع 🌹دهن بيو ،، الراعي الرسمي للسعادة
            </p>
        </div>
        <div class="absolute bg-teal-600 w-[300px] h-full top-0 right-0 z-0"></div>
    </section>
    {{-- Category Section --}}
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <header>
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">تصنيفات</h2>
            </header>
            <ul class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <li class="relative group">
                    <a href="#" class="group block overflow-hidden">
                        <!-- Image -->
                        <img src="https://dhenbio.com/storage/categories/OFSI8LyUsCitjGs3CXCkKVyxI.jpg" alt=""
                            class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px] " />


                        <!-- Hover Effect (Button) -->
                        <div
                            class="absolute inset-0 flex justify-center items-center bg-opacity-50 bg-black opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="text-white px-4 py-2 bg-teal-600 rounded-full">العروض</button>
                        </div>

                    </a>
                </li>
                <li class="relative group">
                    <a href="#" class="group block overflow-hidden">
                        <!-- Image -->
                        <img src="https://dhenbio.com/storage/categories/YCxVX8579yNJbbUUHgW4zvw4V.jpg"" alt=""
                            class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px] " />


                        <!-- Hover Effect (Button) -->
                        <div
                            class="absolute inset-0 flex justify-center items-center bg-opacity-50 bg-black opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="text-white px-4 py-2 bg-teal-600 rounded-full">زيت أركان</button>
                        </div>

                    </a>
                </li>
                <li class="relative group">
                    <a href="#" class="group block overflow-hidden">
                        <!-- Image -->
                        <img src="https://dhenbio.com/storage/categories/xqpDcjhL2ceAXIO90qTGPMvGa.jpeg" alt=""
                            class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px] " />


                        <!-- Hover Effect (Button) -->
                        <div
                            class="absolute inset-0 flex justify-center items-center bg-opacity-50 bg-black opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="text-white px-4 py-2 bg-teal-600 rounded-full">أملو و منتوجات أخرى</button>
                        </div>

                    </a>
                </li>
            </ul>
            <div class="mt-5">
                <header>
                    <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">منتوجاتنا</h2>
                </header>
                <ul class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($products as $product)
                        <li class="relative group bg-red-500 h-[100px] w-[300px]">
                            <a href="{{ route('products.show', $product->id) }}" class="group block overflow-hidden">
                                <!-- Image -->
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="h-[100px] w-[300px] object-cover transition duration-500 group-hover:scale-105 sm:h-[300px]">
                            </a>
                            <p class="mt-2 text-lg text-gray-500">{{ $product->name }}</p>
                            <span class="mt-2 text-sm text-teal-500">{{ $product->price }} MAD</span>

                            <!-- Buttons -->
                            <div
                                class="absolute inset-x-0 top-0 flex justify-between items-center px-4 py-2 bg-opacity-50 bg-black opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <!-- Cart Button -->
                                <button
                                    class="text-white text-sm px-4 py-2 bg-teal-600 rounded-md hover:bg-teal-700 transition-bg duration-300 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M17 17h-11v-14h-2" />
                                        <path d="M6 5l14 1l-1 7h-13" />
                                    </svg>
                                    Add to cart
                                </button>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>
@endsection
