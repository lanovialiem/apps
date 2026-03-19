@include('layout.header')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Project List</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('project.create') }}" class="btn btn-primary">
            Add project
        </a>
        {{-- <a href="{{ route('project.report') }}" class="btn btn-success">
            Rekap
        </a> --}}
    </div>
</div>
<table class="table table-striped mb-0">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Company Name</th>
            <th>Project Name</th>
            {{-- <th>Category</th> --}}
            {{-- <th>Contact Person</th> --}}
            {{-- <th>No Quotation</th> --}}
            <th>No Contract</th>
            <th>SPH Date</th>
            <th>Contract Date</th>
            <th>Purposed Value</th>
            <th>Approved Value</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projectList as $index => $project)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $project->company_name }}</td>
                <td>{{ $project->project_name }}</td>
                {{-- <td>{{ $project->category_project }}</td> --}}
                {{-- <td>{{ $project->contact_person }}</td> --}}
                {{-- <td>{{ $project->no_quotation }}</td> --}}
                <td>{{ $project->no_contract }}</td>
                <td>{{ $project->date_sph }}</td>
                <td>{{ $project->date_contract }}</td>
                <td>Rp {{ number_format($project->purposed_value, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($project->approved_value, 0, ',', '.') }}</td>
                <td>{{ $project->status }}</td>
                <td class="text-center">
                    <a href="{{ route('project.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                        Detail
                    </a>
                    <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    <form action="{{ route('project.destroy', $item->id) }}" method="POST"
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
