@include('layout.header')

<div class="container mx-auto pt-32 px-4">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <h3 class="text-2xl font-semibold text-blue-600">
            Stock Movement History
        </h3>

        <a href="{{ route('stock_movement.create') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
            + Add Stock Movement
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                    <tr>
                        <th class="px-3 py-3">No</th>
                        <th class="px-3 py-3">Product</th>
                        <th class="px-3 py-3">Warehouse</th>
                        <th class="px-3 py-3">Type</th>
                        <th class="px-3 py-3">Previous</th>
                        <th class="px-3 py-3">Qty</th>
                        <th class="px-3 py-3">Current</th>
                        <th class="px-3 py-3">Date</th>
                        <th class="px-3 py-3">Description</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($stockMovements as $key => $item)
                    <tr class="border-t hover:bg-blue-50 transition">
                        <td class="px-3 py-3 text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-3 py-3 font-medium text-gray-800">
                            {{ $item->product->product_name ?? '-' }}
                        </td>

                        <td class="px-3 py-3">
                            {{ $item->warehouse->warehouse_name ?? '-' }}
                        </td>

                        <td class="px-3 py-3">
                            <span
                                class="px-2 py-1 rounded text-xs
                                    {{ $item->movement_type == 'tambah' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $item->movement_type }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-blue-600 font-semibold">
                            {{ $item->previous_stock }}
                        </td>

                        <td class="px-3 py-3">
                            {{ $item->quantity }}
                        </td>

                        <td class="px-3 py-3 text-green-600 font-semibold">
                            {{ $item->new_stock }}
                        </td>

                        <td class="px-3 py-3">
                            {{ $item->movement_date }}
                        </td>

                        <td class="px-3 py-3 text-gray-500">
                            {{ $item->description }}
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-8 text-gray-400">
                            No stock movement data yet
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

@include('layout.footer')