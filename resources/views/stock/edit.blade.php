    {{-- @include('layout.header') --}}

    @extends('welcome.welcome')

    @section('content')
        <div class="max-w-3xl mx-auto pt-32 px-4">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

                <!-- Header -->
                <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">
                        Edit Stock
                    </h2>
                    <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('stock.update', $stock->id) }}" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Product -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Product
                        </label>
                        <select name="product_id" id="product_id"
                            class="w-full px-3 py-2 rounded-lg border text-black
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                            <option value="">-- Pilih Product --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ $product->id == $stock->product_id ? 'selected' : '' }}>
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
                            class="w-full px-3 py-2 rounded-lg border text-black
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                            <option value="">-- Pilih Warehouse --</option>
                            @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}"
                                    {{ $warehouse->id == $stock->warehouse_id ? 'selected' : '' }}>
                                    {{ $warehouse->warehouse_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('warehouse_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Type Stock -->
                    {{-- <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Stock Type
                        </label>

                        <select name="movementType" id="movementType"
                            class="w-full px-3 py-2 rounded-lg border text-black
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                            <option value="">-- Pilih Warehouse --</option>
                            <option value="Tambah" {{ $stock->movementType == 'tambah' ? 'selected' : '' }}>
                                Tambah Stock
                            </option>
                            <option value="Kurang" {{ $stock->movementType == 'kurang' ? 'selected' : '' }}>
                                Kurang Stock
                            </option>
                        </select>
                        @error('movementType')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <!-- Quantity -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Quantity
                        </label>
                        <input type="number" name="quantity" min="0"
                            value="{{ old('quantity', $stock->quantity) }}"
                            class="w-full px-3 py-2 rounded-lg border text-black
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                        @error('quantity')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
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
    @endsection
    {{-- @include('layout.footer') --}}

    @push('scripts')
        {{-- <script>
            const stocks = @json($stocks);
            const currentStockId = {{ $stock->id }};

            const productSelect = document.getElementById('product_id');
            const warehouseSelect = document.getElementById('warehouse_id');
            const stockType = document.getElementById('movementType');

            function checkStockType() {

                const productId = productSelect.value;
                const warehouseId = warehouseSelect.value;

                if (!productId || !warehouseId) {
                    stockType.value = "";
                    return;
                }

                const exist = stocks.find(item =>
                    item.id != currentStockId &&
                    item.product_id == productId &&
                    item.warehouse_id == warehouseId
                );

                stockType.value = exist ? "Tambah" : "Kurang";
            }

            productSelect.addEventListener("change", checkStockType);
            warehouseSelect.addEventListener("change", checkStockType);

            checkStockType();
        </script> --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const qtyInput = document.querySelector('input[name="quantity"]');
                const previousStock = parseInt(document.getElementById('previous_stock').value);

                const movementType = document.getElementById('movementType');
                const movementQty = document.getElementById('movement_qty');
                const newStockText = document.getElementById('new_stock_text');

                function calculateMovement() {

                    const newStock = parseInt(qtyInput.value) || 0;

                    let type = "Update";
                    let qty = 0;

                    if (newStock > previousStock) {
                        type = "tambah";
                        qty = newStock - previousStock;
                    } else if (newStock < previousStock) {
                        type = "kurang";
                        qty = previousStock - newStock;
                    }

                    movementType.textContent = type;
                    movementQty.textContent = qty;
                    newStockText.textContent = newStock;
                }

                qtyInput.addEventListener('input', calculateMovement);

                calculateMovement();

            });
        </script>
    @endpush()
