@include('layout.header')

<div class="max-w-3xl mx-auto pt-32 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Form Stock
            </h2>
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('stock.store') }}" enctype="multipart/form-data"
            class="p-6 space-y-6">
            @csrf

            <!-- Product -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Product
                </label>
                <select name="product_id" id="product_id"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    <option value="">-- Pilih Product --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->product_name }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Warehouse -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Warehouse
                </label>
                <select name="warehouse_id" id="warehouse_id"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    <option value="">-- Pilih Warehouse --</option>
                    @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">
                            {{ $warehouse->warehouse_name }}
                        </option>
                    @endforeach
                </select>
                @error('warehouse_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Quantity -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Quantity
                </label>
                <input type="number" name="quantity" min="0"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                @error('quantity')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <div class="flex justify-end pt-4 border-t">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md transition">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

@include('layout.footer')