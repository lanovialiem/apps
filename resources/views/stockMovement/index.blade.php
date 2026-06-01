{{-- @include('layout.header') --}}

@extends('welcome.welcome')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1 class="text-3xl font-bold text-white">
                Stock Movement History
            </h1>
            <p class="text-blue-100 mt-2 text-sm">
                Riwayat perpindahan stock barang
            </p>
        </div>

        <div>
            <a href="{{ route('stock_movement.create') }}" class="btn-add">
                + Add Stock Movement
            </a>
        </div>

    </div>

    {{-- CARD --}}
    <div class="employee-card">

        {{-- TABLE WRAPPER --}}
        <div class="table-wrapper">

            <table class="table-design">

                {{-- HEAD --}}
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Warehouse</th>
                        <th>Type</th>
                        <th>Previous</th>
                        <th>Qty</th>
                        <th>Current</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>
                    @forelse ($stockMovements as $item)
                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td class="font-medium">
                            {{ $item->product->product_name ?? '-' }}
                        </td>

                        <td>
                            {{ $item->warehouse->warehouse_name ?? '-' }}
                        </td>

                        <td>
                            <span class="inline-block px-2 py-1 text-xs rounded-md
                                {{ $item->movement_type == 'tambah'
                                    ? 'bg-green-100 text-green-700'
                                    : 'bg-red-100 text-red-700' }}">
                                {{ $item->movement_type }}
                            </span>
                        </td>

                        <td class="text-blue-600 font-semibold">
                            {{ $item->previous_stock }}
                        </td>

                        <td>
                            {{ $item->quantity }}
                        </td>

                        <td class="text-green-600 font-semibold">
                            {{ $item->new_stock }}
                        </td>

                        <td>
                            {{ $item->movement_date }}
                        </td>

                        <td>
                            {{ $item->description }}
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-400">
                            No stock movement data yet
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection