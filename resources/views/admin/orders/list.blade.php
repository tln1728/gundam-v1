@extends('layouts.admin')

@section('title')
    order
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Orders</h3>
    </div>

    <!-- Search and Filter Section -->
    <div class="mt-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="relative">
            <input type="text" placeholder="Search orders..."
                class="w-full md:w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
            <div class="absolute left-3 top-2">
                <i class="fas fa-search text-gray-400"></i>
            </div>
        </div>

        <div class="mt-4 md:mt-0 flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2">
            <select
                class="rounded-lg border border-gray-300 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>

            <select
                class="rounded-lg border border-gray-300 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                <option value="">All Time</option>
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
                <option value="year">This Year</option>
            </select>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="mt-8 bg-white overflow-hidden shadow-md rounded-lg">
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
                        Date</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Total</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Status</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Payment</th>
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
                        <div class="text-sm leading-5 font-medium text-gray-900">John Doe</div>
                        <div class="text-sm leading-5 text-gray-500">john@example.com</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                        <div class="text-sm leading-5 text-gray-900">23 Mar, 2023</div>
                        <div class="text-sm leading-5 text-gray-500">3:45 PM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                        <div class="text-sm leading-5 text-gray-900">$129.99</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                        <div class="text-sm leading-5 text-gray-900">Credit Card</div>
                    </td>
                    <td
                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-300 text-sm leading-5 font-medium">
                        <a href="/admin/orders/view" class="text-indigo-600 hover:text-indigo-900 mr-3">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/admin/orders/invoice/1234" class="text-green-600 hover:text-green-900 mr-3">
                            <i class="fas fa-file-invoice"></i>
                        </a>
                    </td>
                </tr>
                <!-- More order rows here -->
            </tbody>
        </table>

        <!-- Pagination (same as products page) -->
        <div class="px-6 py-3 flex items-center justify-between border-t border-gray-300">
            <div class="flex-1 flex justify-between sm:hidden">
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Previous
                </a>
                <a href="#"
                    class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Next
                </a>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm leading-5 text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span
                            class="font-medium">45</span> results
                    </p>
                </div>
                <div>
                    <nav class="relative inline-flex shadow-sm">
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            1
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            2
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            3
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection