@include('layout.header')

<div class="container py-4">
    <div class="card shadow rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Mutasi Stock</h5>
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" height="40">
        </div>
        <div class="card-body">
            <form class="row g-4" method="POST" action="{{ route('stock_movement.store') }}"
                enctype="multipart/form-data">
                @csrf


                <div class="col-md-6">
                    <label class="form-label">Name Warehouse</label>
                    <input type="text" class="form-control" name="warehouse_id" value="{{ old('warehouse_id') }}"
                        required>
                    @error('warehouse_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Product Name
                    </label>
                    <input type="text" name="product_id" value="{{ old('product_id') }}"
                        class="px-3 py-2 w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    @error('product_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Quantity -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Quantity
                    </label>
                    <input type="number" name="quantity" min="0" value="{{ old('quantity') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    @error('quantity')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tipe Mutasi -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Tipe Mutasi
                    </label>
                    <select name="movement_type" id="movement_type"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                        <option value="">-- Pilih Tipe Mutasi --</option>
                        @foreach ($movementTypes as $type)
                            <option value="{{ $type }}" {{ old('movement_type') == $type ? 'selected' : '' }}>
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
                    <input type="date" name="movement_date" value="{{ old('movement_date') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    @error('movement_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')
