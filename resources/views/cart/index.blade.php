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
            <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-right">الصورة</th>
                        <th class="px-4 py-2 text-right">الاسم</th>
                        <th class="px-4 py-2 text-right">السعر</th>
                        <th class="px-4 py-2 text-right">الكمية</th>
                        <th class="px-4 py-2 text-right">الإجمالي</th>
                        <th class="px-4 py-2 text-right">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr>
                            <td class="px-4 py-2"><img src="{{ asset('storage/' . $item['image']) }}"
                                    alt="{{ $item['name'] }}" class="w-16 h-16 object-cover"></td>
                            <td class="px-4 py-2 text-right">{{ $item['name'] }}</td>
                            <td class="px-4 py-2 text-right">{{ $item['price'] }} MAD</td>
                            <td class="px-4 py-2 text-right">{{ $item['quantity'] }}</td>
                            <td class="px-4 py-2 text-right">{{ $item['price'] * $item['quantity'] }} MAD</td>
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

            <div class="mt-6 text-right">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-800 text-white px-6 py-3 rounded hover:bg-gray-900">إفراغ
                        السلة</button>
                </form>
            </div>
        @else
            <p class="text-gray-600">سلة التسوق فارغة.</p>
        @endif
    </div>
@endsection
