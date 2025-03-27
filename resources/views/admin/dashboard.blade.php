@extends('layouts.admin')

@section('title')
Admin Dashboard - Your Store Name
@endsection

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>

    <div class="mt-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Revenue Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75 text-white">
                        <i class="fas fa-dollar-sign text-xl"></i>
                    </div>
                    <div class="mx-4">
                        <h4 class="text-2xl font-semibold text-gray-700">$8,520</h4>
                        <div class="text-gray-500">Total Revenue</div>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-600 bg-opacity-75 text-white">
                        <i class="fas fa-shopping-cart text-xl"></i>
                    </div>
                    <div class="mx-4">
                        <h4 class="text-2xl font-semibold text-gray-700">126</h4>
                        <div class="text-gray-500">Total Orders</div>
                    </div>
                </div>
            </div>

            <!-- Total Products -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-600 bg-opacity-75 text-white">
                        <i class="fas fa-box text-xl"></i>
                    </div>
                    <div class="mx-4">
                        <h4 class="text-2xl font-semibold text-gray-700">364</h4>
                        <div class="text-gray-500">Total Products</div>
                    </div>
                </div>
            </div>

            <!-- Total Customers -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-600 bg-opacity-75 text-white">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="mx-4">
                        <h4 class="text-2xl font-semibold text-gray-700">789</h4>
                        <div class="text-gray-500">Total Customers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="mt-8">
        <h4 class="text-gray-700 text-lg font-medium mb-4">Recent Orders</h4>
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                            Order ID</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                            Customer</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                            Total</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                            Date</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-right text-sm leading-4 text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Order Row -->
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <div class="text-sm leading-5 text-gray-900">#ORD-1234</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <div class="text-sm leading-5 text-gray-900">John Doe</div>
                            <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-900">
                            $128.50
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5 text-gray-900">
                            22 Mar, 2023
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-300 text-sm leading-5 font-medium">
                            <a href="/admin/orders/1234" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                        </td>
                    </tr>
                    <!-- More order rows here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sales Analytics Chart Section -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h4 class="text-gray-700 text-lg font-medium mb-4">Sales Analytics</h4>
        <div class="h-64">
            <!-- This is where you would integrate a chart using a library like Chart.js -->
            <div class="flex items-center justify-center h-full text-gray-500">
                Chart would be rendered here - Integrate with Chart.js or another library
            </div>
        </div>
    </div>
@endsection