{{-- @include('layout.header') --}}
@extends('welcome.welcome')
{{-- head start --}}
@section('content')
<div class="container">
    <div class="page-header">

        <div>
            <!-- Title -->
            <h1 class="text-3xl font-bold text-white">
                Employee
            </h1>

            <p class="text-blue-100 mt-2 text-sm">
                Data karyawan perusahaan
            </p>
        </div>

        <!-- Buttons -->
        <div class="action-group">
            @can('create employee')
            <a href="{{ route('employees.create') }}" class="btn-add">
                + Add Employee
            </a>
            @endcan
            <a href="{{ route('employees.report') }}" class="btn-report">
                Rekap
            </a>

            <!-- Category Job -->
            @can('view category')
            <a href="{{ route('category.index') }}" class="btn-category">
                Category Job
            </a>
            @endcan
            <!-- Job Code -->
            <a href="{{ route('category_code.index') }}" class="btn-job-code">
                Job Code
            </a>

        </div>
    </div>
    {{-- head end --}}

    {{-- body start --}}
    <div class="employee-card">

        <!-- Table -->
        <div class="table-wrapper">
            <table class="table-design">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Identity ID</th>
                        <th>Badge ID</th>
                        <th>Full Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($employee as $key => $item)
                    <tr>
                        <td>{{ ($employee->currentPage() - 1) * $employee->perPage() + $key + 1 }}</td>
                        <td>{{ $item->identity_id }}</td>
                        <td>{{ $item->badge_id }}</td>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>

                        <td>
                            <div class="action-group">

                                <a href="{{ route('employees.show', $item->id) }}"
                                    class="btn-detail">
                                    Detail
                                </a>
                                @can('edit employee')
                                <a href="{{ route('employees.edit', $item->id) }}"
                                    class="btn-edit">
                                    Edit
                                </a>
                                @endcan
                                @can('delete employee')
                                <form action="{{ route('employees.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn-delete">
                                        Hapus
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @if ($employee->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-400">
                            No data available.
                        </td>
                    </tr>
                    @endif
                </tbody>

            </table>

            <!-- Custom Pagination: Next and Back Buttons -->
            <div class="flex justify-between items-center mt-4">
                {{-- Previous Button --}}
                @if ($employee->previousPageUrl())
                    <a href="{{ $employee->previousPageUrl() }}" 
                       class="px-4 py-2 m-5 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                        &laquo; Back
                    </a>
                @else
                    <span class="px-4 py-2 m-5 bg-gray-100 text-gray-400 rounded cursor-not-allowed">
                        &laquo; Back
                    </span>
                @endif

                {{-- Info Text (Optional) --}}
                <span class="text-gray-600">
                    Page {{ $employee->currentPage() }} of {{ $employee->lastPage() }}
                </span>

                {{-- Next Button --}}
                @if ($employee->nextPageUrl())
                    <a href="{{ $employee->nextPageUrl() }}" 
                       class="px-4 py-2 m-5 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Next &raquo;
                    </a>
                @else
                    <span class="px-4 py-2 m-5 bg-gray-100 text-gray-400 rounded cursor-not-allowed">
                        Next &raquo;
                    </span>
                @endif
            </div>
            <!-- End Custom Pagination -->

        </div>
    </div>
</div>

@endsection


{{-- @include('layout.footer') --}}