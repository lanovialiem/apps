@include('layout.header')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Stock Movement Management</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('stock_movement.create') }}" class="btn btn-primary">
            Add stock
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
            <th>Hallo</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($projectEmployee as $index => $project)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->company_name }}</td>
                <td>{{ $project->address }}</td>
                <td>{{ $project->mcu }}</td>
                <td>{{ $project->position }}</td>
                <td>{{ $project->gender }}</td>
                <td>{{ $project->induction }}</td>
                <td>{{ $project->date_resign }}</td>
                <td>{{ $project->status }}</td>
                <td class="text-center">
                    <a href="{{ route('stock.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                        Detail
                    </a>
                    <a href="{{ route('stock.edit', $item->id) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    <form action="{{ route('stock.destroy', $item->id) }}" method="POST"
                        style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach --}}
    </tbody>
</table>

@include('layout.footer')
