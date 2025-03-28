@extends('layouts.admin')

@section('title')
    product-create
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Add New Product</h3>
        <a href="{{ route('products.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
            <i class="fas fa-arrow-left mr-2"></i> Back to Products
        </a>
    </div>

    <!-- Product Form -->
    <div class="mt-8 bg-white rounded-lg shadow-md p-6">

        <!-- Display validation errors summary at the top if needed -->
        @if ($errors->any())
            <div class="mt-4 bg-red-50 p-4 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            There were {{ $errors->count() }} errors with your submission
                        </h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- <div class="md:col-span-2"> -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="mt-1 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm p-3 rounded-md">
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                        class="mt-1 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm p-3 rounded-md">
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category_id"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select Category</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">vnđ</span>
                        </div>
                        <input type="number" name="price" id="price" step="50000" min="0"
                            class="p-3 border focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-12 sm:text-sm border-gray-300 rounded-md"
                            placeholder="100000">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="mt-1 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 p-3 rounded-md"></textarea>
                </div>

                <x-forms.input-file name="thumbnail" />

                <!-- <div>
                            <label for="featured" class="block text-sm font-medium text-gray-700">Featured Product</label>
                            <div class="mt-1">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="featured" id="featured"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <span class="ml-2">Mark as featured</span>
                                </label>
                            </div>
                        </div> -->

                <div class="md:col-span-2 mt-6" x-data="formRepeater()">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-lg font-medium text-gray-700">Product Variants</h4>
                        <button type="button" @click="addVariant()"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-plus mr-2"></i> Add Variant
                        </button>
                    </div>

                    <div class="space-y-4">
                        <template x-for="(variant, index) in variants" :key="index">
                            <div class="bg-gray-100 p-4 rounded-lg relative">
                                <button type="button" @click="removeVariant(index)"
                                    class="absolute top-2 right-2 text-gray-400 hover:text-red-500 focus:outline-none">
                                    <i class="fas fa-times"></i>
                                </button>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label :for="'variant_name_' + index"
                                            class="block text-sm font-medium text-gray-700">Variant Name</label>
                                        <input type="text" :id="'variant_name_' + index" x-model="variant.name"
                                            :name="'variants[' + index + '][name]'"
                                            class="mt-1 p-2 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            placeholder="e.g., Size, Color, etc.">
                                    </div>

                                    <div>
                                        <label :for="'variant_value_' + index"
                                            class="block text-sm font-medium text-gray-700">Value</label>
                                        <input type="text" :id="'variant_value_' + index" x-model="variant.value"
                                            :name="'variants[' + index + '][value]'"
                                            class="mt-1 p-2 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            placeholder="e.g., Large, Red, etc.">
                                    </div>

                                    <div>
                                        <label :for="'variant_price_' + index"
                                            class="block text-sm font-medium text-gray-700">Price Adjustment</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-500 sm:text-sm">
                                                $
                                            </span>
                                            <input type="text" :id="'variant_price_' + index" x-model="variant.price"
                                                :name="'variants[' + index + '][price]'"
                                                class="border p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                step="0.01" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div x-show="variants.length === 0" class="bg-gray-100 rounded text-center py-4 text-gray-500">
                            No variants added yet. Click "Add Variant" to add product variants.
                        </div>
                    </div>
                </div>

                
            </div>

            <div class="md:col-span-2 mt-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save Product
                </button>
            </div>
        </form>
    </div>

    <!-- Alpine.js Scripts for Form Repeaters -->
    <script>
        function formRepeater() {
            return {
                variants: [],

                addVariant() {
                    this.variants.push({
                        name: '',
                        value: '',
                        price: ''
                    });
                },

                removeVariant(index) {
                    this.variants.splice(index, 1);
                }
            }
        }
    </script>
@endsection