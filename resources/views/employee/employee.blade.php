@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Employees</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            Add Employee
        </a>
        <a href="{{ route('employees.report') }}" class="btn btn-success">
            Rekap
        </a>
        <a href="{{ route('category.index') }}"
           class="btn {{ request()->routeIs('category.index') ? 'btn-warning text-white fw-bold' : 'btn-outline-warning' }}">
            Category Job
        </a>
        <a href="{{ route('category_code.index') }}"
           class="btn {{ request()->routeIs('category_code.index') ? 'btn-info text-white fw-bold' : 'btn-outline-info' }}">
            Job Code
        </a>
    </div>
</div>


<div class="card shadow rounded-3 mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Employee List</h5>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped table-bordered mb-0">
            <thead class="table-primary text-center">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Identity ID</th>
                    <th>Badge ID</th>
                    <th>Full Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>

                    <th style="width: 220px;">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employee as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->identity_id }}</td>
                        <td>{{ $item->badge_id }}</td>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>

                        <td class="text-center">
                            <a href="{{ route('employees.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                                Detail
                            </a>
                            <a href="{{ route('employees.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('employees.destroy', $item->id) }}" method="POST"
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

                @if ($employee->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">No data available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@include('layout.footer')
