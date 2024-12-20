@extends('layout.admin')

@section('title', 'عرض الطلبات')

@section('header', 'قائمة الطلبات')

@section('content')
    <div class="p-4 bg-white rounded-lg shadow-md min-h-screen">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">الطلبات</h2>

        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if ($orders->isEmpty())
            <div class="p-4 text-red-800 bg-red-100 rounded-lg">
                لا يوجد طلبات
            </div>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-teal-600 text-white">
                <tr>
                    <th class="border border-gray-300 p-2">رقم الطلب</th>
                    <th class="border border-gray-300 p-2">اسم العميل</th>
                    <th class="border border-gray-300 p-2">اسم المنتج</th>
                    <th class="border border-gray-300 p-2">السعر الإجمالي</th>
                    <th class="border border-gray-300 p-2">الحالة</th>
                    <th class="border border-gray-300 p-2">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="bg-gray-100 border border-gray-300">
                        <td class="p-2 text-center">{{ $order->id }}</td>
                        <td class="p-2 text-center">
                            {{ $order->customer ? $order->customer->name : 'N/A' }}
                        </td>
                        <td class="p-2 text-center">
                            {{ $order->product ? $order->product->name : 'N/A' }}
                        </td>
                        <td class="p-2 text-center">{{ number_format($order->total_price, 2) }} MD</td>
                        <td class="p-2 text-center">
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="border border-gray-300 rounded p-1">
                                    <option value="قيد الانتظار" {{ $order->status == 'قيد الانتظار' ? 'selected' : '' }}>
                                        قيد الانتظار
                                    </option>
                                    <option value="مكتمل" {{ $order->status == 'مكتمل' ? 'selected' : '' }}>مكتمل</option>
                                    <option value="ملغى" {{ $order->status == 'ملغى' ? 'selected' : '' }}>ملغى</option>
                                </select>
                                <button type="submit" class="text-blue-600 hover:underline">تحديث</button>
                            </form>
                        </td>
                        <td class="p-2 text-center">
                            <a href="#" class="text-blue-600"
                                onclick="showOrderDetails({{ $order->id }}, '{{ $order->product->name ?? 'N/A' }}', '{{ number_format($order->total_price, 2) }}', '{{ $order->customer->name ?? 'N/A' }}', '{{ $order->customer->email ?? 'N/A' }}', '{{ $order->customer->phone ?? 'N/A' }}', '{{ $order->customer->address ?? 'N/A' }}')">عرض التفاصيل</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for Order Details -->
    <div id="orderModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div
            class="bg-white rounded-lg p-6 w-11/12 md:w-1/2 lg:w-1/3 max-w-3xl shadow-lg">
            <h3 class="text-2xl font-semibold mb-6 text-teal-600">تفاصيل الطلب</h3>

            <!-- Order Information -->
            <div class="mb-6">
                <p class="text-lg font-medium"><strong>رقم الطلب:</strong> <span id="orderId"
                        class="text-gray-700"></span></p>
                <p class="text-lg font-medium"><strong>اسم المنتج:</strong> <span id="productName"
                        class="text-gray-700"></span></p>
                <p class="text-lg font-medium"><strong>السعر الإجمالي:</strong> <span id="totalPrice"
                        class="text-teal-600"></span> MD</p>
            </div>

            <!-- Customer Information -->
            <h4 class="text-xl font-semibold mt-4 text-teal-600">معلومات العميل</h4>
            <div class="mb-4">
                <p class="text-lg font-medium"><strong>اسم العميل:</strong> <span id="customerName"
                        class="text-gray-700"></span></p>
                <p class="text-lg font-medium"><strong>رقم الهاتف:</strong> <span id="customerPhone"
                        class="text-gray-700"></span></p>
                <p class="text-lg font-medium"><strong>العنوان:</strong> <span id="customerAddress"
                        class="text-gray-700"></span></p>
            </div>

            <div class="mt-4 text-right">
                <button onclick="closeModal()"
                    class="px-4 py-2 text-white bg-teal-600 rounded hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-300 transition">إغلاق</button>
            </div>
        </div>
    </div>

    <script>
        function showOrderDetails(orderId, productName, totalPrice, customerName, customerEmail, customerPhone, customerAddress) {
            // Populate modal with order and customer details
            document.getElementById('orderId').textContent = orderId;
            document.getElementById('productName').textContent = productName;
            document.getElementById('totalPrice').textContent = totalPrice;
            document.getElementById('customerName').textContent = customerName;
            document.getElementById('customerPhone').textContent = customerPhone;
            document.getElementById('customerAddress').textContent = customerAddress;

            // Remove 'hidden' class and display modal
            const modal = document.getElementById('orderModal');
            modal.classList.remove('hidden');
            modal.classList.add('block'); // Ensure modal is visible
        }

        function closeModal() {
            // Close modal and add 'hidden' class back
            const modal = document.getElementById('orderModal');
            modal.classList.add('hidden');
        }
    </script>
@endsection
