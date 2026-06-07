{{-- @include('layout.header') --}}
@extends('welcome.welcome')

@section('content')
<div class="container">

    <!-- Header -->
    <div class="page-header">
        <div>
            <h3 class="text-3xl font-bold text-white">
                Penawaran
            </h3>
        </div>
        <div class="action-group">
            @can('create offer')
            <a href="{{ route('penawaran.create') }}" class="btn-add">
                + Add Penawaran
            </a>
            @endcan
        </div>
    </div>



    <!-- Card -->
    <!-- Table -->
    <div class="employee-card">
        <div class="table-wrapper">
            <table class=table-design>

                <!-- Head -->
                <thead>
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            Author
                        </th>
                        <th>
                            Company
                        </th>
                        <th>
                            Number Letter
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Location
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Tanggal Pengajuan
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Products
                        </th>
                        <th>
                            Status Penawaran
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody>

                    @forelse ($penawaran as $key => $item)
                    <tr>

                        <!-- No -->
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <!-- Author -->
                        <td>
                            {{ $item->user->name }}
                        </td>
                        <!-- Company -->
                        <td>
                            {{ $item->company_name }}
                        </td>
                        <!-- Number letter -->
                        <td>
                            {{ $item->offer_number }}
                        </td>
                        <!-- Customer -->
                        <td>
                            {{ $item->customer_name }}
                        </td>

                        <!-- Location -->
                        <td>
                            {{ $item->location }}
                        </td>

                        <!-- Email -->
                        <td>
                            {{ $item->customer_email }}
                        </td>

                        <!-- Tanggal Pengajuan -->
                        <td>
                            {{ $item->created_at->format('d-m-Y') }}
                        </td>
                        <!-- Description -->
                        <td>
                            {{ $item->description }}
                        </td>

                        <!-- Product Details -->
                        <td>
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
                        <td>
                            @php
                            $current = $item->currentApproval();
                            $next = $current ? $item->nextApprovalAfter($current->sequence) : null;
                            @endphp

                            @if ($current)
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
                            @if ($item->status == 'approved')
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

                        <!-- Action -->
                        <td>
                            <div class="action-group">

                                <!-- Detail -->
                                <a href="{{ route('penawaran.show', $item->id) }}" class="btn-detail">
                                    Detail
                                </a>

                                @can('edit offer')
                                {{--
                                <!-- Edit -->
                                <a href="{{ route('penawaran.edit', $item->id) }}" class="btn-edit">
                                    Edit
                                </a> --}}
                                @endcan

                                @can('delete offer')
                                <!-- Delete -->
                                <form action="{{ route('penawaran.destroy', $item->id) }}" method="POST"
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