@extends('layouts.admin')

@section('title')
    product-create
@endsection

@section('content')
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Add New Product</h3>
        <a href="{{ route('products.create') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
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
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
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
                        <!-- More categories -->
                    </select>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">$</span>
                        </div>
                        <input type="number" name="price" id="price" step="0.01"
                            class="p-3 border focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                            placeholder="0.00">
                    </div>
                </div>

                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                    <input type="number" name="stock" id="stock"
                        class="mt-1 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 p-3 rounded-md">
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="mt-1 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 p-3 rounded-md"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Product Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 2MB
                            </p>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="in_stock">In Stock</option>
                        <option value="out_of_stock">Out of Stock</option>
                        <option value="low_stock">Low Stock</option>
                    </select>
                </div>

                <div>
                    <label for="featured" class="block text-sm font-medium text-gray-700">Featured Product</label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="featured" id="featured"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2">Mark as featured</span>
                        </label>
                    </div>
                </div>

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
                            <div class="bg-gray-50 p-4 rounded-lg relative">
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
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            placeholder="e.g., Size, Color, etc.">
                                    </div>

                                    <div>
                                        <label :for="'variant_value_' + index"
                                            class="block text-sm font-medium text-gray-700">Value</label>
                                        <input type="text" :id="'variant_value_' + index" x-model="variant.value"
                                            :name="'variants[' + index + '][value]'"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            placeholder="e.g., Large, Red, etc.">
                                    </div>

                                    <div>
                                        <label :for="'variant_price_' + index"
                                            class="block text-sm font-medium text-gray-700">Price Adjustment</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                                $
                                            </span>
                                            <input type="number" :id="'variant_price_' + index" x-model="variant.price"
                                                :name="'variants[' + index + '][price]'"
                                                step="0.01"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div x-show="variants.length === 0" class="text-center py-4 text-gray-500">
                            No variants added yet. Click "Add Variant" to add product variants.
                        </div>
                    </div>
                </div>

                <!-- Additional Images Form Repeater -->
                <div class="md:col-span-2 mt-6" x-data="imageRepeater()">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-lg font-medium text-gray-700">Additional Images</h4>
                        <button type="button" @click="addImage()"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-plus mr-2"></i> Add Image
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <template x-for="(image, index) in images" :key="index">
                            <div class="border rounded-lg p-4 relative">
                                <button type="button" @click="removeImage(index)"
                                    class="absolute top-2 right-2 text-gray-400 hover:text-red-500 focus:outline-none">
                                    <i class="fas fa-times"></i>
                                </button>

                                <div class="space-y-3">
                                    <div>
                                        <label :for="'additional_image_' + index"
                                            class="block text-sm font-medium text-gray-700">Image</label>
                                        <div
                                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                    fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label :for="'additional_image_' + index"
                                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                        <span>Upload</span>
                                                        <input :id="'additional_image_' + index"
                                                            :name="'additional_images[]'" type="file" class="sr-only"
                                                            @change="previewImage($event, index)">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div x-show="image.preview" class="mt-2">
                                        <img :src="image . preview" class="h-32 w-full object-cover rounded-md"
                                            alt="Preview">
                                    </div>

                                    <div>
                                        <label :for="'image_caption_' + index"
                                            class="block text-sm font-medium text-gray-700">Caption (optional)</label>
                                        <input type="text" :name="'image_captions[]'" :id="'image_caption_' + index"
                                            x-model="image.caption"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Image caption">
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div x-show="images.length === 0" class="col-span-full text-center py-4 text-gray-500">
                            No additional images added yet. Click "Add Image" to add more product images.
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

        function imageRepeater() {
            return {
                images: [],

                addImage() {
                    this.images.push({
                        file: null,
                        preview: null,
                        caption: ''
                    });
                },

                removeImage(index) {
                    this.images.splice(index, 1);
                },

                previewImage(event, index) {
                    const file = event.target.files[0];
                    if (!file) return;

                    this.images[index].file = file;

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.images[index].preview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>
@endsection