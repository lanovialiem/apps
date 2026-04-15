@include('layout.header')

<div class="container mx-auto pt-32 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Product Registration Form
            </h2>
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Product Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Product Name
                    </label>
                    <input type="text" name="product_name"
                        value="{{ old('product_name') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                    @error('product_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Code -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Product Code
                    </label>
                    <input type="text" name="product_code"
                        value="{{ old('product_code') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                    @error('product_code')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description (full width) -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Description
                    </label>
                    <textarea name="description" rows="3"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Product Price
                    </label>
                    <input type="number" step="0.01" name="product_price"
                        value="{{ old('product_price') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                    @error('product_price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Product Picture
                    </label>
                    <input type="file" name="product_picture"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0 file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                    @error('product_picture')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Button -->
            <div class="flex justify-end pt-4 border-t">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md transition">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@include('layout.footer')