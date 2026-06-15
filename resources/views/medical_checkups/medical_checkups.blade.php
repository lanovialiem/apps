{{-- @include('layout.header') --}}

@extends('welcome.welcome')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1 class="text-3xl font-bold text-white">
                Medical Checkups
            </h1>
            <p class="text-blue-100 mt-2 text-sm">
                Data pemeriksaan kesehatan karyawan
            </p>
        </div>

        <div class="flex gap-2">
            @can('create medical checkup')
            <a href="{{ route('medical_checkups.create') }}" class="btn-add">
                + Add MCU
            </a>
            @endcan
        </div>

    </div>

    {{-- CARD --}}
    <div class="employee-card">

        {{-- TABLE WRAPPER --}}
        <div class="table-wrapper">

            <table class="table-design">

                {{-- HEADER --}}
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Hospital</th>
                        <th>MCU Date</th>
                        <th>Expire Date</th>
                        <th>Result</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>
                    @forelse ($medical_checkups as $key => $item)

                    @php
                        $today = \Carbon\Carbon::today();
                        $mcu = \Carbon\Carbon::parse($item->mcu_date);
                        $expire = \Carbon\Carbon::parse($item->expire_date);
                        $soon = $mcu->copy()->addMonths(11);
                    @endphp

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td class="font-medium text-gray-800">
                            {{ $item->employee->full_name }}
                        </td>

                        <td>
                            {{ $item->hospital }}
                        </td>

                        <td>
                            {{ $item->mcu_date }}
                        </td>

                        {{-- EXPIRY --}}
                        <td>
                            @if($today->gte($expire))
                                <span class="px-2 py-1 text-xs rounded-md bg-red-100 text-red-700">
                                    Expired
                                </span>
                            @elseif($today->gte($soon))
                                <span class="px-2 py-1 text-xs rounded-md bg-yellow-100 text-yellow-700">
                                    Expiring Soon
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-md bg-green-100 text-green-700">
                                    Valid
                                </span>
                            @endif

                            <div class="text-xs text-gray-400 mt-1">
                                {{ $item->expire_date }}
                            </div>
                        </td>

                        <td>
                            {{ $item->result }}
                        </td>

                        <td class="text-gray-500">
                            {{ $item->description }}
                        </td>

                        {{-- FILE --}}
                        <td>
                            @if ($item->file_mcu)
                                <a href="{{ asset('storage/' . $item->file_mcu) }}" target="_blank"
                                   class="px-2 py-1 text-xs text-blue-500 hover:text-blue-700 rounded-md">
                                    View
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>

                        {{-- ACTION --}}
                        <td>
                            <div class="action-group justify-center">

                                @can('delete medical checkup')
                                <form action="{{ route('medical_checkups.destroy', $item->id) }}" method="POST"
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
@endsection