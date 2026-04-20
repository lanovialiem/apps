@include('layout.header')

<div class="container mx-auto pt-32 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <h3 class="text-2xl font-semibold text-blue-600">
            Stock Management
        </h3>

        @can('create stock')
        <a href="{{ route('stock.create') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
            + Add Stock
        </a>
        @endcan
    </div>

    <!-- Card -->
    <div class="bg-white/80 backdrop-blur shadow-xl rounded-2xl overflow-hidden border border-gray-200">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-600">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider text-center">
                    <tr>
                        <th class="px-4 py-3 w-[50px]">No</th>
                        <th class="px-4 py-3 text-left">Warehouse</th>
                        <th class="px-4 py-3 text-left">Product</th>
                        <th class="px-4 py-3 text-left">Code</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">
                    @foreach ($stock as $index => $items)
                    <tr class="hover:bg-blue-50 transition">

                        <!-- No -->
                        <td class="px-4 py-3 text-center">
                            {{ $index + 1 }}
                        </td>

                        <!-- Warehouse -->
                        <td class="px-4 py-3 font-medium text-gray-800">
                            {{ $items->warehouse->warehouse_name }}
                        </td>

                        <!-- Product -->
                        <td class="px-4 py-3 text-gray-700">
                            {{ $items->product->product_name }}
                        </td>

                        <!-- Product -->
                        <td class="px-4 py-3 text-gray-700">
                            {{ $items->product->product_code }}
                        </td>

                        <!-- Quantity -->
                        <td class="px-4 py-3 text-center">
                            <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                {{ $items->quantity }}
                            </span>
                        </td>

                        <!-- Actions -->
                        <td class="px-4 py-3">
                            <div class="flex justify-center gap-2">

                                @can('edit stock')
                                <a href="{{ route('stock.edit', $items->id) }}"
                                    class="px-3 py-1.5 text-xs font-medium text-gray-800 bg-yellow-300 rounded-lg hover:bg-yellow-400 shadow-sm">
                                    Edit
                                </a>
                                @endcan

                                @can('delete stock')
                                <form action="{{ route('stock.destroy', $items->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="px-3 py-1.5 text-xs font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 shadow-sm">
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

@include('layout.footer')