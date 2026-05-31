{{-- @include('layout.header') --}}
@extends('welcome.welcome')

@section('content')
<div class="container mx-auto pt-32 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3 mt-5">
        <h3 class="text-2xl font-semibold text-blue-600">
            Penawaran
        </h3>

        @can('create offer')
        <a href="{{ route('penawaran.create') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
            + Add Penawaran
        </a>
        @endcan
    </div>

    <!-- Card -->
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">

        <!-- Title -->
        <div class="px-6 py-4 border-b">
            <h5 class="text-lg font-semibold text-gray-700">
                List Penawaran
            </h5>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-600">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider text-center">
                    <tr>
                        <th class="px-4 py-3 text-left text-lg">
                            No
                        </th>
                        <th class="px-4 py-3 text-left text-lg">
                            Author
                        </th>
                        <th class="px-4 py-3 text-left text-lg">
                            Company
                        </th>
                        <th class="px-4 py-3 text-left text-lg">
                            Number Letter
                        </th>
                        <th class="px-4 py-3 text-left text-lg">
                            Name
                        </th>
                        <th class="px-4 py-3 text-left text-lg">
                            Email
                        </th>
                        <th class="px-4 py-3 text-left text-lg">
                            Products
                        </th>
                        <th class="px-4 py-3 text-left text-lg">
                            Status Penawaran
                        </th>
                        {{-- <th class="px-4 py-3 text-left text-lg">
                            By
                        </th> --}}
                        <th class="px-4 py-3 text-left text-lg">
                            Action
                        </th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">

                    @forelse ($penawaran as $key => $item)
                    <tr class="hover:bg-blue-50 transition">

                        <!-- No -->
                        <td class="px-4 py-3 text-center">
                            {{ $key + 1 }}
                        </td>
                        <!-- Author -->
                        <td class="px-4 py-3 font-medium text-lg text-gray-800">
                            {{ $item->user->name }}
                        </td>
                        <!-- Company -->
                        <td class="px-4 py-3 font-medium text-lg text-gray-800">
                            {{ $item->company_name }}
                        </td>
                        <!-- Number letter -->
                        <td class="px-4 py-3 font-medium text-lg text-gray-800">
                            {{ $item->offer_number }}
                        </td>
                        <!-- Customer -->
                        <td class="px-4 py-3">
                            {{ $item->customer_name }}
                        </td>

                        <!-- Email -->
                        <td class="px-4 py-3">
                            {{ $item->customer_email }}
                        </td>

                        <!-- Product Details -->
                        <td class="px-4 py-3">
                            @forelse ($item->orderProducts as $index => $order)
                            <div
                                class="flex items-center justify-between gap-4 px-4 py-2 mb-2 rounded-xl bg-gray-50 border border-gray-100">
                                <!-- Product Name -->
                                <div class="flex items-start gap-2">
                                    <span class="text-lg font-semibold text-blue-600 mt-0.5">
                                        {{ $index + 1 }}.
                                    </span>
                                    <span class="text-lg text-gray-700">
                                        {{ $order->product->product_name ?? '-' }}
                                    </span>
                                </div>

                                <!-- Quantity -->
                                <div
                                    class="min-w-[60px] text-lg text-center px-3 py-1 rounded-lg bg-blue-100 text-blue-700 text-xs font-semibold">
                                    Qty: {{ $order->quantity }}
                                </div>
                            </div>
                            @empty
                            <span class="text-gray-400 text-sm">
                                No Product
                            </span>
                            @endforelse
                        </td>

                        <!-- Status Approval Name-->
                        <td class="px-4 py-3">

                            @php
                            $current = $item->currentApproval();
                            $next = $current ? $item->nextApprovalAfter($current->sequence) : null;
                            @endphp

                            @if($current)

                            <span class="px-3 py-1 rounded-lg bg-yellow-100 text-yellow-700 text-xs font-semibold">
                                Waiting:
                                {{ $current->approvalLevel->role->name ?? '-' }}
                            </span>

                            @elseif($next)

                            <span class="px-3 py-1 rounded-lg bg-blue-100 text-blue-700 text-xs font-semibold">
                                Pending:
                                {{ $next->approvalLevel->role->name ?? '-' }}
                            </span>

                            @else

                            @if($item->status == 'approved')
                            <span class="px-3 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-semibold">
                                Approved
                            </span>

                            @elseif($item->status == 'rejected')
                            <span class="px-3 py-1 rounded-lg bg-red-100 text-red-700 text-xs font-semibold">
                                Rejected
                            </span>

                            @else
                            <span class="px-3 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-semibold">
                                Completed
                            </span>
                            @endif

                            @endif

                        </td>

                        {{-- by --}}
                        {{-- <td class="px-4 py-3">

                        </td> --}}

                        <!-- Action -->
                        <td class="px-4 py-3">
                            <div class="flex justify-center gap-2">

                                <!-- Detail -->
                                <a href="{{ route('penawaran.show', $item->id) }}"
                                    class="px-3 py-1.5 text-xs text-white bg-blue-500 rounded-lg hover:bg-blue-600 shadow">
                                    Detail
                                </a>

                                @can('edit offer')
                                {{-- <!-- Edit -->
                                <a href="{{ route('penawaran.edit', $item->id) }}"
                                    class="px-3 py-1.5 text-xs text-gray-800 bg-yellow-300 rounded-lg hover:bg-yellow-400 shadow">
                                    Edit
                                </a> --}}
                                @endcan

                                @can('delete offer')
                                <!-- Delete -->
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

                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-400">
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

{{-- @include('layout.footer') --}}