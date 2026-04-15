@include('layout.header')

<div class="max-w-5xl mx-auto pt-28 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Form Mutasi Stock
            </h2>
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('stock_movement.store') }}" class="p-6 space-y-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Warehouse -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Nama Gudang
                    </label>

                    <select name="warehouse_id"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">

                        <option value="" disabled {{ old('warehouse_id') ? '' : 'selected' }}>
                            Pilih dari gudang mana?
                        </option>

                        @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}" {{ old('warehouse_id')==$warehouse->id ? 'selected' : ''
                            }}>
                            {{ $warehouse->warehouse_name }}
                        </option>
                        @endforeach

                    </select>

                    @error('warehouse_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Nama Produk
                    </label>
                    <select name="product_id"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                        <option disabled {{ old('product_id') ? '' : 'selected' }}>Choose...</option>
                        @foreach ($products as $x)
                        <option value="{{ $x->id }}" {{ old('product_id')==$x->id ? 'selected' : '' }}>
                            {{ $x->product_name }}
                        </option>
                        @endforeach
                    </select>
                    @error('product_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Quantity -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Quantity
                    </label>
                    <input type="number" name="quantity" min="0" value="{{ old('quantity') }}" class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    @error('quantity')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Movement Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Tipe Mutasi
                    </label>
                    <select name="movement_type" class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Tipe Mutasi --</option>
                        @foreach ($movementTypes as $type)
                        <option value="{{ $type }}" {{ old('movement_type')==$type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                        @endforeach
                    </select>
                    @error('movement_type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Movement Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Tanggal Mutasi
                    </label>
                    <input type="date" name="movement_date" value="{{ old('movement_date') }}" class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500">
                    @error('movement_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Heading Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Tujuan Mutasi
                    </label>
                    <select name="heading_type" class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Tujuan Mutasi --</option>
                        @foreach ($headTypes as $type)
                        <option value="{{ $type }}" {{ old('heading_type')==$type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                        @endforeach
                    </select>
                    @error('heading_type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2 lg:col-span-3">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Description
                    </label>
                    <textarea name="description" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300"
                        placeholder="Enter additional notes">{{ old('description') }}</textarea>
                    @error('description')
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

{{-- <script>
    document.getElementById('warehouse_id').addEventListener('change', function () {

    let warehouseId = this.value;

    fetch(`/warehouse/${warehouseId}/products`)
        .then(res => res.json())
        .then(data => {

            let productSelect = document.getElementById('product_id');

            productSelect.innerHTML = '<option value="">-- Pilih Product --</option>';

            data.forEach(stock => {
                productSelect.innerHTML += `
                    <option value="${stock.product.id}">
                        ${stock.product.product_name}
                    </option>
                `;
            });

        });
});
</script> --}}