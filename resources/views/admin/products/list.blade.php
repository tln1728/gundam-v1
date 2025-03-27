@extends('layouts.admin')

@section('title')
    product
@endsection

@section('content')
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Products</h3>
        <a href="{{route('products.create')}}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            <i class="fas fa-plus mr-2"></i> Add New Product
        </a>
    </div>

    <!-- Search and Filter Section -->
    <div class="mt-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="relative">
            <input type="text" placeholder="Search products..."
                class="w-full md:w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
            <div class="absolute left-3 top-2">
                <i class="fas fa-search text-gray-400"></i>
            </div>
        </div>

        <div class="mt-4 md:mt-0 flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2">
            <select
                class="rounded-lg border border-gray-300 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                <option value="">All Categories</option>
                <option value="1">Electronics</option>
                <option value="2">Clothing</option>
                <option value="3">Home & Kitchen</option>
            </select>

            <select
                class="rounded-lg border border-gray-300 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                <option value="">All Status</option>
                <option value="in_stock">In Stock</option>
                <option value="out_of_stock">Out of Stock</option>
                <option value="low_stock">Low Stock</option>
            </select>
        </div>
    </div>

    <!-- Products Table -->
    <div class="mt-8 bg-white overflow-hidden shadow-md rounded-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Image</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Product</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Category</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Price</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Stock</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Status</th>
                    <th
                        class="px-6 py-3 border-b-2 border-gray-300 text-right text-sm leading-4 text-gray-500 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Product Row -->
                @foreach ($products as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <img src="https://placehold.co/400" class="h-12 w-12 rounded object-cover" alt="Product Image">
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <div class="text-sm leading-5 font-medium text-gray-900">Smartphone X</div>
                            <div class="text-sm leading-5 text-gray-500">SKU: SM-X12345</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <div class="text-sm leading-5 text-gray-900">Electronics</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <div class="text-sm leading-5 text-gray-900">$899.99</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <div class="text-sm leading-5 text-gray-900">125</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">In
                                Stock</span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-300 text-sm leading-5 font-medium">
                            <a href="/admin/products/edit/1" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-600 hover:text-red-900"
                                onclick="return confirm('Are you sure you want to delete this product?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <!-- More product rows here -->
            </tbody>
        </table>

        <!-- Pagination -->

        <div class="px-6 py-3 border-t border-gray-300">
            {{ $products->links() }}
        </div>
    </div>

@endsection