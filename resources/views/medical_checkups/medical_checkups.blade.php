@include('layout.header')

<div class="container mx-auto pt-32 px-4">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <!-- Title -->
        <h3 class="text-2xl font-semibold text-blue-600">
            Medical Checkups
        </h3>
        <!-- Actions -->
        <div class="flex flex-wrap gap-2">
            @can('create medical checkup')
            <a href="{{ route('medical_checkups.create') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow transition">
                + Add MCU
            </a>
            @endcan
            {{-- <a href="{{ route('medical_checkups.report') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg shadow transition">
                Rekap
            </a> --}}
        </div>
    </div>


    <!-- Card -->
    <div class="bg-white/80 backdrop-blur shadow-xl rounded-2xl overflow-hidden border border-gray-200">

        <!-- Title -->
        <div class="px-6 py-4 border-b">
            <h5 class="text-lg font-semibold text-gray-700">MCU List</h5>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-600">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider text-center">
                    <tr>
                        <th class="px-4 py-3 w-[50px]">No</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Hospital</th>
                        <th class="px-4 py-3">MCU Date
                            <p class="text-gray-500 text-xs">tahun-bulan-tanggal</p>
                        </th>
                        <th class="px-4 py-3">Expire Date</th>
                        <th class="px-4 py-3">Result</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">File</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">
                    @forelse ($medical_checkups as $key => $item)
                    @php
                    $today = \Carbon\Carbon::today();
                    $mcu = \Carbon\Carbon::parse($item->mcu_date);
                    $expire = \Carbon\Carbon::parse($item->expire_date);
                    $soon = $mcu->copy()->addMonths(11);
                    @endphp

                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-4 py-3 text-center">{{ $key + 1 }}</td>
                        <td class="px-4 py-3 font-medium text-gray-800">
                            {{ $item->employee->full_name }}
                        </td>
                        <td class="px-4 py-3">{{ $item->hospital }}</td>
                        <td class="px-4 py-3 text-center">{{ $item->mcu_date }}</td>

                        <!-- Expire Status -->
                        <td class="px-4 py-3 text-center">
                            @if($today->gte($expire))
                            <span class="px-3 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">
                                Expired
                            </span>
                            @elseif($today->gte($soon))
                            <span class="px-3 py-1 text-xs font-semibold text-yellow-800 bg-yellow-300 rounded-full">
                                Expiring Soon
                            </span>
                            @else
                            <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-200 rounded-full">
                                Valid
                            </span>
                            @endif
                            <div class="text-xs text-gray-400 mt-1">
                                {{ $item->expire_date }}
                            </div>
                        </td>

                        <td class="px-4 py-3 text-center">{{ $item->result }}</td>
                        <td class="px-4 py-3 text-center">{{ $item->description }}</td>

                        <!-- File -->
                        <td class="px-4 py-3 text-center">
                            @if ($item->file_mcu)
                            <a href="{{ asset('storage/' . $item->file_mcu) }}" target="_blank"
                                class="text-xs px-3 py-1 bg-green-500 text-white rounded-lg hover:bg-green-600">
                                View
                            </a>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>

                        <!-- Action -->
                        <td class="px-4 py-3">
                            <div class="flex justify-center">
                                @can('delete medical checkup')
                                <form action="{{ route('medical_checkups.destroy', $item->id) }}" method="POST"
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

                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-400">
                            No data available.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>

@include('layout.footer')

{{-- @push('scripts')
<scripts>
    $(function(){
    $('#expiry-date').datetimepicker({
    format: 'Y-MM-DD'
    })
    .on('dp.change',function(ev){
    var data = $('#expiry-date').val();
    @this.set('expiry-date', data);
    });
    });
</scripts>

@endpush --}}