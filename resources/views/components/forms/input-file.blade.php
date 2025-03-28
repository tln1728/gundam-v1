@props(['name'])
<div class="md:col-span-2" x-data="{ 
        fileName: '', 
        filePreview: null,
        fileObject: null,
        isDragging: false,
        handleFile(event) {
            const file = event.target.files[0] || (event.dataTransfer && event.dataTransfer.files[0]);
            if (!file) return;
            
            this.fileName = file.name;
            this.fileObject = file;
            
            // Create image preview
            const reader = new FileReader();
            reader.onload = (e) => {
                this.filePreview = e.target.result;
                // Update the hidden input file
                this.updateFormFile();
            };
            reader.readAsDataURL(file);
        },
        clearFile() {
            this.fileName = '';
            this.filePreview = null;
            this.fileObject = null;
            // Clear the hidden input
            document.getElementById('image-input').value = '';
        },
        updateFormFile() {
            if (!this.fileObject) {
                document.getElementById('image-input').value = '';
                return;
            }
            
            // Create a new DataTransfer object
            const dataTransfer = new DataTransfer();
            
            // Add our file to the DataTransfer object
            dataTransfer.items.add(this.fileObject);
            
            // Set the files property of the hidden input
            document.getElementById('image-input').files = dataTransfer.files;
        }
     }" x-on:dragover.prevent="isDragging = true" x-on:dragleave.prevent="isDragging = false"
    x-on:drop.prevent="isDragging = false; handleFile($event)">
    <label class="block text-sm font-medium text-gray-700">Product Image</label>
    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-md transition-colors duration-200"
        :class="isDragging ? 'border-indigo-500 bg-indigo-50' : filePreview ? 'border-green-500' : 'border-gray-300'">
        <div class="space-y-1 text-center">
            <!-- Show preview if available -->
            <template x-if="filePreview">
                <div class="flex flex-col items-center">
                    <img :src="filePreview" class="h-32 w-auto object-contain mb-3" />
                    <p class="text-sm text-gray-700" x-text="fileName"></p>
                    <button type="button"
                        class="mt-2 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        @click.prevent="clearFile()">
                        Remove
                    </button>
                </div>
            </template>

            <!-- Default upload icon when no preview -->
            <template x-if="!filePreview">
                <div>
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                        aria-hidden="true">
                        <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="image-browse"
                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Upload a file</span>
                            <input id="image-browse" type="file" class="sr-only" accept="image/*"
                                @change="handleFile($event)">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 2MB
                    </p>
                </div>
            </template>

            <!-- This is the actual input that will be submitted with the form -->
            <input id="image-input" name="{{ $name }}" type="file" class="hidden" accept="image/*">
        </div>
    </div>
</div>