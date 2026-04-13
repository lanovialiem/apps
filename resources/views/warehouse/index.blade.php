@include('layout.header')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Warehouse Management</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('warehouse.create') }}" class="btn btn-primary">
            Add Warehouse
        </a>
        {{-- <a href="{{ route('warehouse.report') }}" class="btn btn-success">
            Rekap
        </a> --}}
    </div>
</div>
<table class="table table-striped mb-0">
    <thead class="table-light">
        <tr>
                <th>No</th>
                <th>Name Warehouse</th>
                <th>Code Warehouse</th>
                <th>Location Warehouse</th>
                <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($warehouse as $index => $ware_)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $ware_->warehouse_name }}</td>
                <td>{{ $ware_->warehouse_code }}</td>
                <td>{{ $ware_->warehouse_location }}</td>
                <td class="text-center">
                    {{-- <a href="{{ route('warehouse.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                        Detail
                    </a>
                    <a href="{{ route('warehouse.edit', $item->id) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a> --}}
                    <form action="{{ route('warehouse.destroy', $ware_->id) }}" method="POST"
                        style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
