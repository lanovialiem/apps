@include('layout.header')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Stock Management</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('stock.create') }}" class="btn btn-primary">
            Add Stock
        </a>
        {{-- <a href="{{ route('stock.report') }}" class="btn btn-success">
            Rekap
        </a> --}}
    </div>
</div>
<table class="table table-striped mb-0">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Warehouse Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stock as $index => $items)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $items->warehouse->warehouse_name }}</td>
            <td>{{ $items->product->product_name }}</td>
            <td>{{ $items->quantity }}</td>
            <td class="text-center">
                {{-- <a href="{{ route('stock.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                    Detail
                </a> --}}
                <a href="{{ route('stock.edit', $items->id) }}" class="btn btn-sm btn-warning">
                    Edit
                </a>
                <form action="{{ route('stock.destroy', $items->id) }}" method="POST" style="display: inline-block;"
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
    </tbody>
</table>

@include('layout.footer')