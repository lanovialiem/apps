@extends('welcome.welcome')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="text-3xl font-semibold text-white">
                Warehouse Management
            </h1>
        </div>

        <div>
            @can('create warehouse')
            <a href="{{ route('warehouse.create') }}" class="btn-add">
                + Add Warehouse
            </a>
            @endcan
        </div>
    </div>

    {{-- CARD --}}
    <div class="employee-card">
        <div class="table-wrapper">

            <table class="table-design">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Warehouse Name</th>
                        <th>Code</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($warehouse as $index => $ware_)
                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>
                            {{ $ware_->warehouse_name }}
                        </td>

                        <td>
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">
                                {{ $ware_->warehouse_code }}
                            </span>
                        </td>

                        <td>
                            {{ $ware_->warehouse_location }}
                        </td>

                        <td>
                            <div>

                                @can('delete warehouse')
                                <form action="{{ route('warehouse.destroy', $ware_->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-delete">
                                        Hapus
                                    </button>

                                </form>
                                @endcan

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-400">
                            No warehouse data available
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection