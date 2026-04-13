@include('layout.header')

<div class="container py-4">
    <div class="card shadow rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Stock</h5>
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" height="40">
        </div>
        <div class="card-body">
            <form class="row g-4" method="POST" action="{{ route('stock.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        <option value="">-- Pilih Product --</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="warehouse_id" class="form-label">Warehouse</label>
                    <select name="warehouse_id" id="warehouse_id" class="form-control" required>
                        <option value="">-- Pilih Warehouse --</option>
                        @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="0" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>

@include('layout.footer')