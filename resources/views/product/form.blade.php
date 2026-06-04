@extends('welcome.welcome')

@section('content')
<div class="container mx-auto pt-32 px-4 py-10">
    <div class="max-w-5xl mx-auto">

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-200">

            <!-- Header -->
            <div class="flex items-center justify-between px-8 py-5 bg-gradient-to-r from-indigo-600 to-blue-600">
                <div>
                    <h1 class="text-2xl font-bold text-white">
                        Product Registration
                    </h1>
                    <p class="text-sm text-blue-100 mt-1">
                        Tambahkan data product baru
                    </p>
                </div>

                <img src="{{ asset('images/logo.png') }}"
                    class="h-12 w-auto object-contain bg-white p-2 rounded-xl shadow" alt="Logo">
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data"
                class="p-8 space-y-8">

                @csrf

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Product Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">
                            Product Name
                        </label>
                        <input type="text" name="product_name" value="{{ old('product_name') }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('product_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Product Brand -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">
                            Product Brand
                        </label>
                        <input type="text" name="product_brand" value="{{ old('product_brand') }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('product_brand')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">
                            Category
                        </label>

                        <select name="category_products_id"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Choose Category</option>

                            @foreach ($categoryProducts as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('category_products_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_products_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Unit -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">
                            Product Unit
                        </label>

                        <select name="product_unit"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">Choose Unit</option>

                            @foreach ($select_product_unit as $x)
                                <option value="{{ $x }}"
                                    {{ old('product_unit') == $x ? 'selected' : '' }}>
                                    {{ $x }}
                                </option>
                            @endforeach
                        </select>

                        @error('product_unit')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Product Code -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">
                            Product Code
                        </label>
                        <input type="text" name="product_code" value="{{ old('product_code') }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('product_code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">
                            Product Price
                        </label>
                        <input type="number" step="0.01" name="product_price" value="{{ old('product_price') }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('product_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">
                            Product Picture
                        </label>

                        <input type="file" name="product_picture"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                            file:rounded-xl file:border-0 file:bg-blue-50 file:text-blue-600
                            hover:file:bg-blue-100">

                        @error('product_picture')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description full -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">
                            Description
                        </label>

                        <textarea name="description" rows="3"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-black focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Jenis cat / kegunaan">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Footer -->
                <div class="flex justify-end pt-6 border-t">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl shadow-lg transition">
                        Submit Product
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection