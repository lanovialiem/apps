@include('layout.header')

<div class="container mx-auto pt-32 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <h3 class="text-2xl font-semibold text-blue-600">
            Product
        </h3>
        @can('create product')
        <a href="{{ route('product.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
            + Add Product
        </a>
        @endcan
    </div>

    <!-- Card -->
    <div class="bg-white/80 backdrop-blur shadow-xl rounded-2xl overflow-hidden border border-gray-200">

        <!-- Title -->
        <div class="px-6 py-4 border-b">
            <h5 class="text-lg font-semibold text-gray-700">
                Product List
            </h5>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-600">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider text-center">
                    <tr>
                        <th class="px-4 py-3 w-[50px]">No</th>
                        <th class="px-4 py-3 text-left">Product Name</th>
                        <th class="px-4 py-3 text-left">Code</th>
                        <th class="px-4 py-3 text-left">Description</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Stock</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">
                    @foreach ($products as $key => $item)
                        <tr class="hover:bg-blue-50 transition">

                            <!-- No -->
                            <td class="px-4 py-3 text-center">
                                {{ $key + 1 }}
                            </td>

                            <!-- Name -->
                            <td class="px-4 py-3 font-medium text-gray-800">
                                {{ $item->product_name }}
                            </td>

                            <!-- Code -->
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">
                                    {{ $item->product_code }}
                                </span>
                            </td>

                            <!-- Description -->
                            <td class="px-4 py-3 text-gray-600">
                                {{ $item->description }}
                            </td>

                            <!-- Price -->
                            <td class="px-4 py-3 text-right font-semibold text-green-600">
                                Rp {{ number_format($item->product_price, 0, ',', '.') }}
                            </td>

                            <!-- Stock -->
                            <td class="px-4 py-3 text-center">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    @if($item->stock_quantity > 10)
                                        bg-green-100 text-green-700
                                    @elseif($item->stock_quantity > 0)
                                        bg-yellow-100 text-yellow-700
                                    @else
                                        bg-red-100 text-red-600
                                    @endif">
                                    {{ $item->stock_quantity }}
                                </span>
                            </td>

                            <!-- Action -->
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('product.show', $item->id) }}"
                                       class="px-3 py-1.5 text-xs text-white bg-blue-500 rounded-lg hover:bg-blue-600 shadow">
                                        Detail
                                    </a>

                                    @can('edit product')
                                    <a href="{{ route('product.edit', $item->id) }}"
                                       class="px-3 py-1.5 text-xs text-gray-800 bg-yellow-300 rounded-lg hover:bg-yellow-400 shadow">
                                        Edit
                                    </a>
                                    @endcan
                                    @can('delete product')
                                    <form action="{{ route('product.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-1.5 text-xs text-white bg-red-500 rounded-lg hover:bg-red-600 shadow">
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

@include('layout.footer')