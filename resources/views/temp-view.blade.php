@extends('layouts.admin')

@section('title')
    Test
@endsection

@section('content')
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
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label :for="'additional_image_' + index"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload</span>
                                            <input :id="'additional_image_' + index" :name="'additional_images[]'"
                                                type="file" class="sr-only" @change="previewImage($event, index)">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-show="image.preview" class="mt-2">
                            <img :src="image . preview" class="h-32 w-full object-cover rounded-md" alt="Preview">
                        </div>

                        <div>
                            <label :for="'image_caption_' + index" class="block text-sm font-medium text-gray-700">Caption
                                (optional)</label>
                            <input type="text" :name="'image_captions[]'" :id="'image_caption_' + index"
                                x-model="image.caption"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                placeholder="Image caption">
                        </div>
                    </div>
                </div>
            </template>

            <div x-show="images.length === 0" class="bg-gray-100 rounded col-span-full text-center py-4 text-gray-500">
                No additional images added yet. Click "Add Image" to add more product images.
            </div>
        </div>
    </div>

    <!-- Alpine.js Scripts for Form Repeaters -->
    <script>
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