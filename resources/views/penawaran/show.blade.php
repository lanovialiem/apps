@extends('welcome.welcome')

@section('content')
<div class="container mx-auto pt-32 px-4 text-black">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-semibold text-blue-600">
            Detail Penawaran
        </h3>

        <a href="{{ route('penawaran.index') }}"
            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm text-black">
            Back
        </a>
    </div>

    <!-- MAIN CARD -->
    <div class="bg-white shadow-xl rounded-2xl border border-gray-200 p-6 text-black">

        <!-- INFO PENAWARAN -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <p class="text-sm text-gray-500">Company</p>
                <p class="font-semibold text-lg text-black">{{ $penawaran->company_name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Offer Number</p>
                <p class="font-semibold text-lg text-black">{{ $penawaran->offer_number }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Customer Name</p>
                <p class="font-semibold text-lg text-black">{{ $penawaran->customer_name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="font-semibold text-lg text-black">{{ $penawaran->customer_email }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Author</p>
                <p class="font-semibold text-lg text-black">{{ $penawaran->user->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Status</p>

                <span class="px-3 py-1 rounded-lg text-xs font-semibold
                    @if($penawaran->status == 'approved') bg-green-100 text-green-700
                    @elseif(str_starts_with($penawaran->status, 'rejected')) bg-red-100 text-red-700
                    @else bg-gray-100 text-gray-700
                    @endif">

                    {{ ucfirst($penawaran->status) }}
                </span>
            </div>

        </div>

        <!-- PRODUCTS -->
        <div class="mt-8">
            <h5 class="text-lg font-semibold mb-3 text-black">Products</h5>

            @forelse ($penawaran->orderProducts as $i => $order)
            <div class="flex justify-between items-center bg-gray-50 border p-3 rounded-xl mb-2 text-black">

                <div class="flex gap-2">
                    <span class="text-blue-600 font-bold">{{ $i + 1 }}.</span>
                    <span class="text-black">
                        {{ $order->product->product_name ?? '-' }}
                    </span>
                </div>

                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-semibold">
                    Qty: {{ $order->quantity }}
                </span>

            </div>
            @empty
            <p class="text-gray-400">No Product</p>
            @endforelse
        </div>

        <!-- APPROVAL FLOW -->
        <div class="mt-10">
            <h5 class="text-lg font-semibold mb-3 text-black">Approval Flow</h5>

            @foreach($penawaran->approvals as $approval)
            <div class="flex justify-between items-center border p-3 rounded-xl mb-2 text-black">

                <div>
                    <p class="font-semibold text-black">
                        {{ $approval->role }}
                    </p>
                    <p class="text-lg text-black mt-1">
                        {{ $approval->approver->name ?? '-' }}
                    </p>
                    {{-- <p class="text-sm text-black">
                        {{ $approval->approvalLevel->role->name ?? '-' }}
                    </p> --}}
                </div>

                <div class="text-right">

                    <span class="text-xs px-2 py-1 rounded-lg
                            @if($approval->status == 'approved') bg-green-100 text-green-700
                            @elseif($approval->status == 'rejected') bg-red-100 text-red-700
                            @else bg-yellow-100 text-yellow-700
                            @endif">

                        {{ ucfirst($approval->status) }}
                    </span>

                    {{-- <p class="text-lg text-black mt-1">
                        {{ $approval->approver->name ?? '-' }}
                    </p> --}}

                </div>

            </div>
            @endforeach
        </div>

    </div>

</div>
@endsection