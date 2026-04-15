@include('layout.header')

<div class="max-w-5xl mx-auto pt-32 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Edit Product Data
            </h2>
        </div>

        <!-- Error -->
        @if ($errors->any())
        <div class="mx-6 mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-600 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Product Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Product Name
                    </label>
                    <input type="text" name="product_name"
                        value="{{ old('product_name', $product->product_name) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
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
                        value="{{ old('product_code', $product->product_code) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    @error('product_code')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Product Price
                    </label>
                    <input type="number" step="0.01" name="product_price"
                        value="{{ old('product_price', $product->product_price) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    @error('product_price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Description
                    </label>
                    <textarea name="description" rows="3"
                        class="w-full px-3 py-2 rounded-xl border border-gray-300 
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Button -->
            <div class="flex justify-end pt-4 border-t">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@include('layout.footer')