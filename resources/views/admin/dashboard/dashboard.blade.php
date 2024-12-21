@extends('layout.admin')

@section('title', 'لوحة تحكم')

@section('header', 'لوحة تحكم')

@section('content')
    <div class="container mx-auto p-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">

            <div class="bg-blue-100 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-700">المنتجات</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $productsCount }}</p>
                <p class="text-gray-600">عدد المنتجات في المتجر</p>
            </div>

            <div class="bg-green-100 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-700">العملاء</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $customersCount }}</p>
                <p class="text-gray-600">عدد العملاء المسجلين</p>
            </div>

            <div class="bg-yellow-100 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-700">الطلبات</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $ordersCount }}</p>
                <p class="text-gray-600">عدد الطلبات المنفذة</p>
            </div>

        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">عدد الطلبات اليومية</h3>

            <canvas id="ordersPerDayChart"></canvas>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script>
        // Prepare orders per day data
        const ordersPerDay = @json($ordersPerDay);

        // Extract dates and counts for the x and y axis of the chart
        const dates = ordersPerDay.map(order => order.date);

        // Round counts to ensure integer values for the y-axis
        const counts = ordersPerDay.map(order => Math.round(order.count)); // Round to integer

        // Get the chart context
        const ctx = document.getElementById('ordersPerDayChart').getContext('2d');

        // Create the bar chart
        const ordersPerDayChart = new Chart(ctx, {
            type: 'bar', // Bar chart for orders per day
            data: {
                labels: dates, // X-axis labels (dates)
                datasets: [{
                    label: 'عدد الطلبات',
                    data: counts, // Y-axis data (number of orders per day)
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Bar color
                    borderColor: 'rgb(75, 192, 192)', // Bar border color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'التاريخ'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'عدد الطلبات'
                        },
                        ticks: {
                            stepSize: 1, // Set the step size to 1 for integer values
                            precision: 0 // Ensure no decimal places
                        }
                    }
                }
            }
        });
    </script>

@endsection
