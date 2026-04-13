@include('layout.header')

<div class="container mt-5">
    <div class="card shadow rounded-3">
        <div class="card-header">
            <h4 class="mb-0">Edit Product Data</h4>
        </div>
        <div class="card-body">

            {{-- Tampilkan error --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Product Edit --}}
                    <div class="col-md-6">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" id="product_name"
                            value="{{ old('product_name', $product->product_name) }}" required>
                        @error('product_name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="product_code" class="form-label">Product Code</label>
                        <input type="text" class="form-control" name="product_code" id="product_code"
                            value="{{ old('product_code', $product->product_code) }}" required>
                        @error('product_code') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="number" class="form-control" name="product_price" id=" product_price"
                            value="{{ old('product_price', $product->product_price) }}" step="0.01" required>
                        @error('product_price') <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="col-md-6">
                        <label for="stock_quantity" class="form-label">Stock Quantity</label>
                        <input type="number" class="form-control" name="stock_quantity" id="stock_quantity"
                            value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
                        @error('stock_quantity') <div class="text-danger">{{ $message }}</div> @enderror
                    </div> --}}
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description"
                            rows="3">{{ old('description', $product->description) }}</textarea>
                        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="col-12 mt-3 text-end">
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')