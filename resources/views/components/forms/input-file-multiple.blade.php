@props(['name'])

<div class="md:col-span-2" x-data="{ 
                files: [],
                isDragging: false,
                handleFiles(event) {
                    const newFiles = event.target.files || (event.dataTransfer && event.dataTransfer.files);
                    if (!newFiles || !newFiles.length) return;

                    // Process each file
                    Array.from(newFiles).forEach(file => {
                        // Skip if file already exists in our array (check by name and size)
                        if (this.files.some(f => f.name === file.name && f.size === file.size)) return;

                        // Create image preview
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.files.push({
                                file: file,
                                name: file.name,
                                size: file.size,
                                preview: e.target.result,
                                id: Date.now() + Math.random().toString(36).substring(2, 10)
                            });

                            // Update the hidden input files
                            this.updateFormFiles();
                        };
                        reader.readAsDataURL(file);
                    });
                },
                removeFile(fileId) {
                    this.files = this.files.filter(f => f.id !== fileId);
                    // Update the hidden input files after removal
                    this.updateFormFiles();
                },
                clearFiles() {
                    this.files = [];
                    // Clear the hidden input
                    this.updateFormFiles();
                },
                updateFormFiles() {
                    // Create a new DataTransfer object
                    const dataTransfer = new DataTransfer();

                    // Add all files from our array to the DataTransfer object
                    this.files.forEach(fileObj => {
                        dataTransfer.items.add(fileObj.file);
                    });

                    // Set the files property of the hidden input
                    document.getElementById('images-input').files = dataTransfer.files;
                }
             }" x-on:dragover.prevent="isDragging = true" x-on:dragleave.prevent="isDragging = false"
    x-on:drop.prevent="isDragging = false; handleFiles($event)">
    <label class="block text-sm font-medium text-gray-700">Product Images</label>
    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-md transition-colors duration-200"
        :class="isDragging ? 'border-indigo-500 bg-indigo-50' : files . length ? 'border-green-500' : 'border-gray-300'">
        <div class="w-full space-y-1 text-center">
            <!-- Show previews if available -->
            <template x-if="files.length">
                <div class="space-y-4">
                    <div class="flex flex-wrap gap-2 justify-center">
                        <template x-for="file in files" :key="file . id">
                            <div class="relative group">
                                <img :src="file . preview"
                                    class="h-24 w-24 object-cover rounded border border-gray-200" />
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-200 rounded flex items-center justify-center">
                                    <button type="button" class="text-white p-1 hover:text-red-500 focus:outline-none"
                                        @click.prevent="removeFile(file.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-1 text-xs text-gray-500 truncate max-w-[96px]" x-text="file.name"></div>
                            </div>
                        </template>
                    </div>

                    <div class="flex justify-center space-x-2">
                        <label for="images-browse"
                            class="cursor-pointer inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span>Add More</span>
                            <input id="images-browse" type="file" class="sr-only" accept="image/*" multiple
                                @change="handleFiles($event)">
                        </label>
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                            @click.prevent="clearFiles()">
                            Clear All
                        </button>
                    </div>
                    <p class="text-xs text-gray-500">
                        <span x-text="files.length"></span> files selected
                    </p>
                </div>
            </template>

            <!-- Default upload icon when no files -->
            <template x-if="!files.length">
                <div>
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                        aria-hidden="true">
                        <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600 justify-center">
                        <label for="images-browse"
                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Upload files</span>
                            <input id="images-browse" type="file" class="sr-only" accept="image/*" multiple
                                @change="handleFiles($event)">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 2MB each
                    </p>
                </div>
            </template>

            <!-- This is the actual input that will be submitted with the form -->
            <input id="images-input" name="{{ $name }}[]" type="file" class="hidden" accept="image/*" multiple>
        </div>
    </div>
</div>