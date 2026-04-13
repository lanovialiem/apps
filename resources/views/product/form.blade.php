@include('layout.header')

<div class="container py-4">
    <div class="card shadow rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Product Registration Form</h5>
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" height="40">
        </div>
        <div class="card-body">
            <form class="row g-4" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Product View --}}
                <div class="col-md-6">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name"
                        placeholder="Enter Product Name" value="{{ old('product_name') }}">
                    @error('product_name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="product_code" class="form-label">Product Code</label>
                    <input type="text" class="form-control" id="product_code" name="product_code"
                        placeholder="Enter Product Code" value="{{ old('product_code') }}">
                    @error('product_code') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Enter Product Description">{{ old('description') }}</textarea>
                    @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="product_price" name="product_price"
                        placeholder="Enter Product Price" value="{{ old('product_price') }}" step="0.01">
                    @error('product_price') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- <div class="col-md-6">
                    <label for="stock_quantity" class="form-label">Stock Quantity</label>
                    <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
                        placeholder="Enter Stock Quantity" value="{{ old('stock_quantity') }}">
                    @error('stock_quantity') <div class="text-danger">{{ $message }}</div> @enderror
                </div> --}}

                <div class="col-md-6">
                    <label for="product_picture" class="form-label">Product Picture</label>
                    <input type="file" class="form-control" id="product_picture" name="product_picture"
                        accept="image/*">
                    @error('product_picture') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@include('layout.footer')