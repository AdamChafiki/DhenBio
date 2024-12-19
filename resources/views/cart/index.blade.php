@extends('layout.app')

@section('title', 'سلة التسوق')

@section('header', 'سلة التسوق')

@section('content')
    <div class="container mx-auto p-6">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">سلة التسوق</h1>
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (count($cart) > 0)
            <!-- Shopping Cart Table -->
            <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden mb-8">
                <thead>
                    <tr class="bg-teal-100">
                        <th class="px-4 py-2 text-right">الصورة</th>
                        <th class="px-4 py-2 text-right">الاسم</th>
                        <th class="px-4 py-2 text-right">السعر</th>
                        <th class="px-4 py-2 text-right">الكمية</th>
                        <th class="px-4 py-2 text-right">الإجمالي</th>
                        <th class="px-4 py-2 text-right">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach ($cart as $id => $item)
                        @php
                            $itemTotal = $item['price'] * $item['quantity'];
                            $totalPrice += $itemTotal;
                        @endphp
                        <tr>
                            <td class="px-4 py-2">
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                    class="w-16 h-16 object-cover">
                            </td>
                            <td class="px-4 py-2 text-right">{{ $item['name'] }}</td>
                            <td class="px-4 py-2 text-right">{{ $item['price'] }} MAD</td>
                            <td class="px-4 py-2 text-right">{{ $item['quantity'] }}</td>
                            <td class="px-4 py-2 text-right">{{ $itemTotal }} MAD</td>
                            <td class="px-4 py-2 text-right">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">إزالة</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Total Price -->
            <div class="text-right mb-6">
                <p class="text-xl font-semibold text-gray-800">
                    المجموع الكلي: <span class="text-teal-600">{{ $totalPrice }} MAD</span>
                </p>
            </div>

            <!-- Clear Cart Button -->
            <div class="text-right">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-800 text-white px-6 py-3 rounded hover:bg-gray-900">
                        إفراغ السلة
                    </button>
                </form>
            </div>

            <!-- Customer Information Form -->
            <div class="mt-10 bg-teal-50 shadow-md p-6 rounded-lg">
                <h2 class="text-2xl font-semibold text-teal-700 mb-4">معلومات الزبون</h2>
                <form action="{{ route('order.submit') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">الاسم الكامل</label>
                            <input type="text" name="name" id="name"
                                class="w-full p-3 rounded border border-teal-300 focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label for="city" class="block text-gray-700 font-medium mb-2"> المدينة</label>
                            <input type="text" name="city" id="city"
                                class="w-full p-3 rounded border border-teal-300 focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">رقم الهاتف</label>
                            <input type="text" name="phone" id="phone"
                                class="w-full p-3 rounded border border-teal-300 focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label for="address" class="block text-gray-700 font-medium mb-2">العنوان</label>
                            <input type="text" name="address" id="address"
                                class="w-full p-3 rounded border border-teal-300 focus:ring-2 focus:ring-teal-500">
                        </div>
                    </div>
                    <div class="mt-6 text-right">
                        <button type="submit" class="bg-teal-600 text-white px-6 py-3 rounded hover:bg-teal-700">
                            إتمام الطلب
                        </button>
                    </div>
                </form>
                <div class="mt-4">
                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <p class="text-gray-600">سلة التسوق فارغة.</p>
        @endif
    </div>
@endsection
