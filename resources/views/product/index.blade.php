@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Product</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('product.create') }}" class="btn btn-primary">
            Add Product
        </a>
    </div>
</div>


<div class="card shadow rounded-3 mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Product List</h5>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped table-bordered mb-0">
            <thead class="table-primary text-center">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>

                    <th style="width: 220px;">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->product_code }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->product_price }}</td>
                        <td>{{ $item->stock_quantity }}</td>

                        <td class="text-center">
                            <a href="{{ route('product.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                                Detail
                            </a>
                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('product.destroy', $item->id) }}" method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($products->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">No data available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@include('layout.footer')
