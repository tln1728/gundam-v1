@extends('layouts.admin')

@section('title')
    order-view
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <a href="/admin/orders" class="mr-4 text-gray-600 hover:text-indigo-600">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="text-gray-700 text-3xl font-medium">Order #ORD-1234</h3>
            <span
                class="ml-4 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
        </div>
        <div class="flex space-x-2">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                <i class="fas fa-print mr-2"></i> Print
            </button>
            <button class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                <i class="fas fa-file-invoice mr-2"></i> Generate Invoice
            </button>
        </div>
    </div>

    <!-- Order Summary and Actions -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Order Info -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h4 class="text-lg font-medium text-gray-700 mb-4">Order Information</h4>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Order ID:</span>
                    <span class="font-medium">#ORD-1234</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Date Placed:</span>
                    <span>March 23, 2023 - 3:45 PM</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Status:</span>
                    <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Payment Method:</span>
                    <span>Credit Card (•••• 4242)</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Payment Status:</span>
                    <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Paid</span>
                </div>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h4 class="text-lg font-medium text-gray-700 mb-4">Customer Information</h4>
            <div class="flex items-center mb-4">
                <img class="h-10 w-10 rounded-full mr-3"
                    src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
                <div>
                    <div class="font-medium text-gray-900">John Doe</div>
                    <div class="text-gray-500 text-sm">Customer since Jan 10, 2023</div>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex items-center">
                    <i class="fas fa-envelope text-gray-400 w-5"></i>
                    <span class="ml-2">john@example.com</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-phone text-gray-400 w-5"></i>
                    <span class="ml-2">+1 (555) 123-4567</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-shopping-bag text-gray-400 w-5"></i>
                    <span class="ml-2">8 previous orders</span>
                </div>
            </div>
            <div class="mt-4">
                <a href="/admin/customers/1" class="text-indigo-600 hover:text-indigo-900 text-sm">View Customer Profile</a>
            </div>
        </div>

        <!-- Order Actions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h4 class="text-lg font-medium text-gray-700 mb-4">Order Actions</h4>
            <div class="space-y-3">
                <div x-data=" status: 'completed' }">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Update Status</label>
                    <div class="flex space-x-2">
                        <select id="status" x-model="status"
                            class="rounded-lg border border-gray-300 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent flex-grow">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="refunded">Refunded</option>
                        </select>
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Update
                        </button>
                    </div>
                </div>

                <div>
                    <button
                        class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200 mb-2 flex items-center justify-center">
                        <i class="fas fa-truck mr-2"></i> Add Tracking Number
                    </button>
                    <button
                        class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200 mb-2 flex items-center justify-center">
                        <i class="fas fa-envelope mr-2"></i> Email Customer
                    </button>
                    <button
                        class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200 mb-2 flex items-center justify-center">
                        <i class="fas fa-tag mr-2"></i> Add Note
                    </button>
                    <button
                        class="w-full bg-red-100 text-red-700 px-4 py-2 rounded-md hover:bg-red-200 flex items-center justify-center">
                        <i class="fas fa-ban mr-2"></i> Cancel Order
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Shipping and Billing -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Shipping Address -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-lg font-medium text-gray-700">Shipping Address</h4>
                <button class="text-indigo-600 hover:text-indigo-900 text-sm">
                    <i class="fas fa-edit mr-1"></i> Edit
                </button>
            </div>
            <div class="space-y-1">
                <p class="font-medium">John Doe</p>
                <p>123 Main Street</p>
                <p>Apt 4B</p>
                <p>New York, NY 10001</p>
                <p>United States</p>
                <p class="mt-2">+1 (555) 123-4567</p>
            </div>
        </div>

        <!-- Billing Address -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-lg font-medium text-gray-700">Billing Address</h4>
                <button class="text-indigo-600 hover:text-indigo-900 text-sm">
                    <i class="fas fa-edit mr-1"></i> Edit
                </button>
            </div>
            <div class="space-y-1">
                <p class="font-medium">John Doe</p>
                <p>123 Main Street</p>
                <p>Apt 4B</p>
                <p>New York, NY 10001</p>
                <p>United States</p>
                <p class="mt-2">+1 (555) 123-4567</p>
            </div>
        </div>
    </div>

    <!-- Order Items -->
    <div class="mt-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h4 class="text-lg font-medium text-gray-700">Order Items</h4>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                SKU
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Product 1 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-md object-cover" src="https://via.placeholder.com/150"
                                            alt="Product image">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Smartphone X</div>
                                        <div class="text-sm text-gray-500">Black, 128GB</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">SM-X12345</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">$899.99</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">1</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">$899.99</div>
                            </td>
                        </tr>

                        <!-- Product 2 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-md object-cover" src="https://via.placeholder.com/150"
                                            alt="Product image">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Wireless Earbuds</div>
                                        <div class="text-sm text-gray-500">White</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">WE-56789</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">$129.99</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">1</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">$129.99</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2">
            <!-- Order Timeline -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h4 class="text-lg font-medium text-gray-700 mb-4">Order Timeline</h4>
                <div class="flow-root">
                    <ul class="-mb-8">
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                            <i class="fas fa-check text-white"></i>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-900">Order delivered</p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2023-03-25">Mar 25, 2023</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                            <i class="fas fa-truck text-white"></i>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-900">Order shipped</p>
                                            <p class="text-sm text-gray-500">Tracking: #TRK-789456123</p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2023-03-24">Mar 24, 2023</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center ring-8 ring-white">
                                            <i class="fas fa-box text-white"></i>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-900">Order processed</p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2023-03-23">Mar 23, 2023</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative pb-8">
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-gray-500 flex items-center justify-center ring-8 ring-white">
                                            <i class="fas fa-credit-card text-white"></i>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-900">Payment received</p>
                                            <p class="text-sm text-gray-500">Transaction ID: TXN-123456789</p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2023-03-23">Mar 23, 2023</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Order Notes -->
            <div class="bg-white rounded-lg shadow-md p-6 mt-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg font-medium text-gray-700">Order Notes</h4>
                    <button class="text-indigo-600 hover:text-indigo-900 text-sm">
                        <i class="fas fa-plus mr-1"></i> Add Note
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-gray-900">Customer requested gift wrapping</p>
                                <p class="text-xs text-gray-500 mt-1">Added by Admin User</p>
                            </div>
                            <div class="text-right text-xs text-gray-500">
                                <time datetime="2023-03-23">Mar 23, 2023 - 3:50 PM</time>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-gray-900">Called customer to confirm shipping address</p>
                                <p class="text-xs text-gray-500 mt-1">Added by Admin User</p>
                            </div>
                            <div class="text-right text-xs text-gray-500">
                                <time datetime="2023-03-23">Mar 23, 2023 - 4:15 PM</time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Summary -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h4 class="text-lg font-medium text-gray-700 mb-4">Payment Summary</h4>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Subtotal:</span>
                    <span>$1,029.98</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Shipping:</span>
                    <span>$12.99</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Tax:</span>
                    <span>$85.47</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Discount:</span>
                    <span class="text-red-600">-$50.00</span>
                </div>
                <div class="border-t pt-3 mt-3">
                    <div class="flex justify-between font-medium">
                        <span>Total:</span>
                        <span>$1,078.44</span>
                    </div>
                </div>
                <div class="border-t pt-3 mt-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Payment Method:</span>
                        <span>Credit Card</span>
                    </div>
                    <div class="flex justify-between mt-1">
                        <span class="text-gray-600">Card:</span>
                        <span>Visa •••• 4242</span>
                    </div>
                    <div class="flex justify-between mt-1">
                        <span class="text-gray-600">Transaction ID:</span>
                        <span class="text-sm">TXN-123456789</span>
                    </div>
                </div>
                <div class="border-t pt-3 mt-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Refunded Amount:</span>
                        <span>$0.00</span>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <button class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    <i class="fas fa-receipt mr-2"></i> View Invoice
                </button>
            </div>
        </div>
    </div>
@endsection