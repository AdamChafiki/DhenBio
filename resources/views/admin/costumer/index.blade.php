@extends('layout.admin')

@section('title', 'عرض العملاء')

@section('header', 'قائمة العملاء')

@section('content')
    <div class="p-4 bg-white rounded-lg shadow-md min-h-screen">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">العملاء</h2>
        
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if ($customers->isEmpty())
            <p class="text-center text-gray-500">لم يتم العثور على أي عملاء.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-teal-600 text-white">
                    <tr>
                        <th class="border border-gray-300 p-2">الاسم</th>
                        <th class="border border-gray-300 p-2">المدينة</th>
                        <th class="border border-gray-300 p-2">رقم الهاتف</th>
                        <th class="border border-gray-300 p-2">العنوان</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="bg-gray-100 border border-gray-300">
                            <td class="p-2 text-center">{{ $customer->name }}</td>
                            <td class="p-2 text-center">{{ $customer->city }}</td>
                            <td class="p-2 text-center">{{ $customer->phone }}</td>
                            <td class="p-2 text-center">{{ $customer->address }}</td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection