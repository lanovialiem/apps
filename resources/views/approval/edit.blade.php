@extends('welcome.welcome')

@section('content')
<div class="min-h-screen py-10 px-4 bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100">

    <div class="max-w-3xl mx-auto">

        {{-- Card --}}
        <div class="bg-white rounded-[28px] shadow-2xl border border-gray-100 overflow-hidden">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-700 via-indigo-600 to-blue-500 px-8 py-6">

                <h1 class="text-2xl font-bold text-white">
                    Edit Approval
                </h1>

                <p class="text-blue-100 text-sm mt-1">
                    Ubah status approval penawaran
                </p>

            </div>

            {{-- Body --}}
            <div class="p-8">

                <form action="{{ route('approvals.update', $approval->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Info --}}
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Company
                        </label>

                        <div class="px-4 py-3 rounded-xl bg-gray-50 border text-gray-700">
                            {{ $approval->penawaran->company_name ?? '-' }}
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Nomor
                        </label>

                        <div class="px-4 py-3 rounded-xl bg-gray-50 border text-gray-700">
                            {{ $approval->penawaran->offer_number ?? '-' }}
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Customer
                        </label>

                        <div class="px-4 py-3 rounded-xl bg-gray-50 border text-gray-700">
                            {{ $approval->penawaran->customer_name ?? '-' }}
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Email
                        </label>

                        <div class="px-4 py-3 rounded-xl bg-gray-50 border text-gray-700">
                            {{ $approval->penawaran->customer_email ?? '-' }}
                        </div>
                    </div>

                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Product Details
                        </label>

                        <div class="rounded-xl border bg-gray-50 overflow-hidden">

                            <table class="w-full text-sm text-left">

                                <thead class="bg-gray-100 text-gray-600 text-xs uppercase tracking-wider">
                                    <tr>
                                        <th class="px-4 py-3 w-12">#</th>
                                        <th class="px-4 py-3">Product Name</th>
                                        <th class="px-4 py-3 w-40 text-center">Quantity</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">

                                    @forelse ($approval->penawaran->orderProducts ?? [] as $index => $order)

                                    <tr class="hover:bg-white transition">

                                        {{-- Number --}}
                                        <td class="px-4 py-3 font-semibold text-gray-600">
                                            {{ $index + 1 }}
                                        </td>

                                        {{-- Product Name --}}
                                        <td class="px-4 py-3 text-gray-700">
                                            {{ $order->product->product_name ?? '-' }}
                                        </td>

                                        {{-- Quantity --}}
                                        <td class="px-4 py-3 text-center">
                                            <span
                                                class="px-3 py-1 rounded-lg bg-blue-100 text-blue-700 text-xs font-semibold">
                                                {{ $order->quantity }}
                                            </span>
                                        </td>

                                    </tr>

                                    @empty

                                    <tr>
                                        <td colspan="3" class="px-4 py-6 text-center text-gray-400">
                                            No Product Available
                                        </td>
                                    </tr>

                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    </div>

                    {{-- Role --}}
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Role
                        </label>

                        <div class="px-4 py-3 rounded-xl bg-indigo-50 text-indigo-700 border font-semibold">
                            {{ $approval->role }}
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Status Approval
                        </label>

                        @php
                        $status = strtolower($approval->status ?? '');
                        @endphp

                        <select name="status" class="w-full px-4 py-3 rounded-xl border text-sm font-semibold cursor-pointer transition
                            @if($status == 'pending') bg-yellow-50 text-yellow-700
                            @elseif($status == 'waiting') bg-gray-50 text-gray-700 
                            @elseif($status == 'approved') bg-green-50 text-green-700 
                            @elseif($status == 'rejected') bg-red-50 text-red-700 
                            @endif
                            ">
                            {{--
                            <option value="pending" {{ $status=='pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="waiting" {{ $status=='waiting' ? 'selected' : '' }}>
                                Waiting
                            </option> --}}

                            <option value="approved" {{ $status=='approved' ? 'selected' : '' }}>
                                Approved
                            </option>

                            <option value="rejected" {{ $status=='rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>

                        </select>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end gap-3">

                        <a href="{{ route('approvals.index') }}"
                            class="px-5 py-3 rounded-xl bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 shadow transition">
                            save
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection