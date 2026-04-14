@include('layout.header')

<div class="container mx-auto pt-32 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <h3 class="text-2xl font-semibold text-blue-600">
            Job Code
        </h3>

        <a href="{{ route('category_code.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
            + Add Job Code
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
                        <th class="px-4 py-3 text-left">Job Code</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">
                    @foreach ($category_code as $key => $item)
                        <tr class="hover:bg-blue-50 transition">

                            <!-- No -->
                            <td class="px-4 py-3 text-center">
                                {{ $key + 1 }}
                            </td>

                            <!-- Job Code -->
                            <td class="px-4 py-3 font-medium text-gray-800">
                                <span class="px-2 py-1 text-xs bg-indigo-100 text-indigo-700 rounded">
                                    {{ $item->job_code }}
                                </span>
                            </td>

                            <!-- Action -->
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('category_code.edit', $item->id) }}"
                                       class="px-3 py-1.5 text-xs text-gray-800 bg-yellow-300 rounded-lg hover:bg-yellow-400 shadow">
                                        Edit
                                    </a>

                                    <form action="{{ route('category_code.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-1.5 text-xs text-white bg-red-500 rounded-lg hover:bg-red-600 shadow">
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