@include('layout.header')

<div class="container mx-auto pt-32 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3 mt-5">
        <h3 class="text-2xl font-semibold text-blue-600">Penawaran</h3>
        @can('create offer')
            <a href="{{ route('penawaran.create') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
                + Add Penawaran
            </a>
        @endcan
    </div>

    <!-- Card -->
    <div class="bg-white/80 backdrop-blur shadow-xl rounded-2xl overflow-hidden border border-gray-200 mt-3">

        <!-- Title -->
        <div class="px-6 py-4 border-b">
            <h5 class="text-lg font-semibold text-gray-700">List Penawaran</h5>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-600">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider text-center">
                    <tr>
                        <th class="px-4 py-3 w-[50px]">No</th>
                        <th class="px-4 py-3 text-left">Company</th>
                        <th class="px-4 py-3 text-left">File</th>
                        <th class="px-4 py-3 text-left">Subject</th>
                        <th class="px-4 py-3 text-left">Category</th>
                        <th class="px-4 py-3">Quotation</th>
                        <th class="px-4 py-3">Value</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3 text-left">Description</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">
                    @foreach ($penawaran as $key => $item)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-4 py-3 text-center">{{ $key + 1 }}</td>

                            <td class="px-4 py-3 font-medium text-gray-800">
                                {{ $item->company_name }}
                            </td>

                            <!-- File-Document -->
                            {{-- <td class="px-4 py-3 font-medium text-gray-800">
                                @if ($item->upload_document)
                                    <img src="{{ asset('storage/dokumen_penawaran/' . $item->upload_document) }}"
                                        alt="upload_document" class="w-16 h-16 object-cover">
                                @else
                                    No Document
                                @endif
                            </td> --}}

                            <td class="px-4 py-3">
                                {{ $item->subject_name }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">
                                    {{ $item->category_penawaran }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-center">
                                {{ $item->no_quotation }}
                            </td>

                            <td class="px-4 py-3 text-right font-semibold text-green-600">
                                Rp {{ number_format($item->purposed_value, 0, ',', '.') }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                {{ \Carbon\Carbon::parse($item->date_sph)->format('d M Y') }}
                            </td>

                            <td class="px-4 py-3 text-gray-500">
                                {{ Str::limit($item->description, 40) }}
                            </td>

                            <!-- Action -->
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('penawaran.show', $item->id) }}"
                                        class="px-3 py-1.5 text-xs text-white bg-blue-500 rounded-lg hover:bg-blue-600 shadow">
                                        Detail
                                    </a>
                                    @can('edit offer')
                                        <a href="{{ route('penawaran.edit', $item->id) }}"
                                            class="px-3 py-1.5 text-xs text-gray-800 bg-yellow-300 rounded-lg hover:bg-yellow-400 shadow">
                                            Edit
                                        </a>
                                    @endcan
                                    @can('delete offer')
                                        <form action="{{ route('penawaran.destroy', $item->id) }}" method="POST"
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

                    @if ($penawaran->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center py-6 text-gray-400">
                                No data available.
                            </td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>

</div>

@include('layout.footer')
