{{-- @include('layout.header') --}}

@extends('welcome.welcome')
@section('content')
<div class="container">

    <!-- Header -->
    <div class="page-header">
        <div>
            <h1 class="text-3xl font-semibold text-white">
                Stock Management
            </h1>
        </div>
        <div>
            @can('create stock')
            <a href="{{ route('stock.create') }}"
                class="btn-add">
                Edit Stock
            </a>
            @endcan
        </div>
    </div>


    <!-- Card -->
    <div class="employee-card">

        <!-- Table -->
        <div class="table-wrapper">
            <table class="table-design">

                <!-- Head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Warehouse</th>
                        <th>Product</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody>
                    @foreach ($stock as $index => $items)
                    <tr class="hover:bg-blue-50 transition">

                        <!-- No -->
                        <td>
                            {{ $index + 1 }}
                        </td>

                        <!-- Warehouse -->
                        <td>
                            {{ $items->warehouse->warehouse_name }}
                        </td>

                        <!-- Product -->
                        <td>
                            {{ $items->product->product_name }}
                        </td>

                        <!-- Product -->
                        <td>
                            {{ $items->product->product_code }}
                        </td>

                        <!-- Quantity -->
                        <td>
                            <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                {{ $items->quantity }}
                            </span>
                        </td>

                        <!-- Actions -->
                        <td>
                            <div class="action-group">

                                {{-- @can('edit stock')
                                <a href="{{ route('stock.edit', $items->id) }}" class="btn-edit">
                                    Edit
                                </a>
                                @endcan --}}

                                @can('delete stock')
                                <form action="{{ route('stock.destroy', $items->id) }}" method="POST"
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
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
@endsection

{{-- @include('layout.footer') --}}