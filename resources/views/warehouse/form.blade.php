@include('layout.header')

<div class="container py-4">
    <div class="card shadow rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Warehouse</h5>
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" height="40">
        </div>
        <div class="card-body">
            <form class="row g-4" method="POST" action="{{ route('warehouse.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                    <label class="form-label">Name Warehouse</label>
                    <input type="text" class="form-control" name="warehouse_name" value="{{ old('warehouse_name') }}"
                        required>
                    @error('warehouse_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Code Warehouse</label>
                    <input type="text" class="form-control" name="warehouse_code" value="{{ old('warehouse_code') }}"
                        required>
                    @error('warehouse_code')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Location Warehouse</label>
                    <input type="text" class="form-control" name="warehouse_location"
                        value="{{ old('warehouse_location') }}" required>
                    @error('warehouse_location')
                    <div class="text-danger">{{ $message }}</div>
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