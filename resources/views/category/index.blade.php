{{-- @include('layout.header') --}}
@extends('welcome.welcome')
{{-- head start --}}
@section('content')
<div class="container">
    <div class="page-header">

        <div>
            <!-- Title -->
            <h1 class="text-3xl font-bold text-white">
                Category
            </h1>

            <p class="text-blue-100 mt-2 text-sm">
                Category Kerja Perusahaan
            </p>
        </div>

        <!-- Buttons -->
        <div class="action-group">
            @can('create category')
            <a href="{{ route('category.create') }}" class="btn-add">
                + Add Category
            </a>
            @endcan

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
                        <th>Job Category</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($category as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->job_category }}</td>
                        <td>
                            <div>

                                {{-- <a href="{{ route('category.show', $item->id) }}"
                                    class="btn-detail">
                                    Detail
                                </a>
                                @can('edit category')
                                <a href="{{ route('category.edit', $item->id) }}"
                                    class="btn-edit">
                                    Edit
                                </a>
                                @endcan --}}
                                @can('delete category')
                                <form action="{{ route('category.destroy', $item->id) }}" method="POST"
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

                    @if ($category->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-400">
                            No data available.
                        </td>
                    </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection


{{-- @include('layout.footer') --}}