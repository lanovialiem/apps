@include('layout.header')

<div class="container mx-auto pt-32 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <h3 class="text-2xl font-semibold text-blue-600">
            Stock Movement Management
        </h3>

        <a href="{{ route('stock_movement.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
            + Add Stock Movement
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white/80 backdrop-blur shadow-xl rounded-2xl overflow-hidden border border-gray-200">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-600">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-4 py-3 w-[50px] text-center">No</th>
                        <th class="px-4 py-3 text-left">Information</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody>
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-4 py-6 text-center text-gray-400">
                            -
                        </td>
                        <td class="px-4 py-6 text-gray-400">
                            No stock movement data yet
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>
</div>

@include('layout.footer')