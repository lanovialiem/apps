{{-- @include('layout.header') --}}

@extends('welcome.welcome')
@section('content')
<div class="container">

    <!-- Header -->
    <div class="page-header">
        <div>
            <h3 class="text-3xl font-bold text-white">
                Product
            </h3>
            <p class="text-blue-100 mt-2 text-sm">
                Produk Perusahaan
            </p>
        </div>
        <div class="action-group">
            @can('create product')
            <a href="{{ route('product.create') }}" class="btn-add">
                + Add Product
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
                        <th>Product Picture</th>
                        <th>Product Name</th>
                        <th>Product Unit</th>
                        <th>Product Brand</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Total Stock Product</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody>
                    @foreach ($products as $key => $item)
                    <tr>
                        {{-- @dd($products) --}}
                        <!-- No -->
                        <td>
                            {{ $key + 1 }}
                        </td>

                        <!-- pricture -->
                        <td>
                            @if ($item->product_picture)
                            <img src="{{ asset('storage/' . $item->product_picture) }}" alt="product image"
                                class="w-16 h-16 object-cover">
                            @else
                            No Product Picture
                            @endif
                        </td>

                        <!-- Name -->
                        <td>
                            {{ $item->product_name }}
                        </td>

                        <!-- Unit -->
                        <td>
                            {{ $item->product_unit }}
                        </td>

                        <!-- Product Brand -->
                        <td>
                            {{ $item->product_brand }}
                        </td>


                        <!-- Code -->
                        <td>
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">
                                {{ $item->product_code }}
                            </span>
                        </td>

                        <!-- Description -->
                        <td>
                            {{ $item->description }}
                        </td>

                        <!-- Price -->
                        <td>
                            Rp {{ number_format($item->product_price, 0, ',', '.') }}
                        </td>

                        <!-- Stock -->
                        <td>
                            {{-- <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    @if ($item->stock_quantity > 10)
                                        bg-green-100 text-green-700
                                    @elseif($item->stock_quantity > 0)
                                        bg-yellow-100 text-yellow-700
                                    @else
                                        bg-red-100 text-red-600
                                    @endif">
                                {{ $item->stock_quantity }}
                            </span> --}}
                            {{ $item->stock->sum('quantity') }}
                        </td>

                        <!-- Action -->
                        <td>
                            <div class="action-group">

                                <a href="{{ route('product.show', $item->id) }}" class="btn-detail">
                                    Detail
                                </a>

                                @can('edit product')
                                <a href="{{ route('product.edit', $item->id) }}" class="btn-edit">
                                    Edit
                                </a>
                                @endcan
                                @can('delete product')
                                <form action="{{ route('product.destroy', $item->id) }}" method="POST"
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

                    @if ($products->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-400">
                            No data available
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