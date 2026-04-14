@include('layout.header')

<div class="container mx-auto pt-32 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <h3 class="text-2xl font-semibold text-blue-600">
            Warehouse Management
        </h3>

        <a href="{{ route('warehouse.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
            + Add Warehouse
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
                        <th class="px-4 py-3 text-left">Warehouse Name</th>
                        <th class="px-4 py-3 text-left">Code</th>
                        <th class="px-4 py-3 text-left">Location</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">
                    @foreach ($warehouse as $index => $ware_)
                        <tr class="hover:bg-blue-50 transition">

                            <td class="px-4 py-3 text-center">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-4 py-3 font-medium text-gray-800">
                                {{ $ware_->warehouse_name }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">
                                    {{ $ware_->warehouse_code }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-gray-600">
                                {{ $ware_->warehouse_location }}
                            </td>

                            <!-- Action -->
                            <td class="px-4 py-3">
                                <div class="flex justify-center">

                                    <form action="{{ route('warehouse.destroy', $ware_->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-1.5 text-xs font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 shadow-sm">
                                            Hapus
                                        </button>

                                    </form>

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