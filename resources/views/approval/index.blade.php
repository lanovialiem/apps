@extends('welcome.welcome')

@section('content')
<div class="min-h-screen py-10 px-4 bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100">

    <div class="max-w-7xl mx-auto">

        {{-- Card --}}
        <div class="bg-white rounded-[32px] shadow-2xl border border-gray-100 overflow-hidden">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-700 via-indigo-600 to-blue-500 px-8 py-7">

                <div class="flex items-center justify-between">

                    <div>
                        <h1 class="text-3xl font-bold text-white">
                            Approval List
                        </h1>

                        <p class="text-blue-100 mt-2 text-sm">
                            Data approval penawaran perusahaan
                        </p>
                    </div>

                    {{-- <a href="{{ route('approvals.create') }}"
                        class="bg-white text-blue-700 font-semibold px-5 py-3 rounded-2xl shadow hover:bg-blue-50 transition">
                        + Tambah Approval
                    </a> --}}

                </div>
            </div>

            {{-- Table --}}
            <div class="p-8">

                <div class="overflow-x-auto rounded-3xl border border-gray-200">

                    <table class="min-w-full w-full text-base text-left whitespace-nowrap">

                        {{-- Table Head --}}
                        <thead
                            class="bg-gradient-to-r from-slate-800 to-slate-700 text-white uppercase text-xs tracking-wider">

                            <tr>
                                <th class="px-6 py-5">
                                    #
                                </th>

                                <th class="px-6 py-5">
                                    Company
                                </th>

                                <th class="px-6 py-5">
                                    No Letter
                                </th>

                                <th class="px-6 py-5">
                                    Author
                                </th>

                                <th class="px-6 py-5">
                                    Role
                                </th>

                                <th class="px-6 py-5">
                                    Description
                                </th>

                                <th class="px-6 py-5">
                                    Status
                                </th>

                                {{-- <th class="px-6 py-5 text-center">
                                    Level
                                </th> --}}

                                <th class="px-6 py-5 text-center">
                                    Sequence
                                </th>

                                <th class="px-6 py-5">
                                    Created At
                                </th>

                                <th class="px-6 py-5 text-center">
                                    Action
                                </th>

                            </tr>
                        </thead>

                        {{-- Table Body --}}
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($approvals as $approval)
                            <tr class="hover:bg-blue-50/40 transition duration-200">
                                {{-- ID --}}
                                <td class="px-6 py-5 font-semibold text-gray-700">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- Penawaran --}}
                                <td class="px-6 py-5">
                                    <span class="px-3 py-1 rounded-xl bg-blue-100 text-blue-700 text-xs font-bold">

                                        {{ $approval->penawaran->company_name ?? 'N/A' }}
                                    </span>
                                </td>

                                {{-- Nomor surat --}}
                                <td class="px-6 py-5">
                                    <span class="px-3 py-1 rounded-xl bg-blue-100 text-blue-700 text-xs font-bold">
                                        {{ $approval->penawaran->offer_number ?? 'N/A' }}
                                    </span>
                                </td>

                                {{-- Name --}}
                                <td class="px-6 py-5">
                                    <div class="font-semibold text-gray-800">
                                        {{ $approval->user->name ?? 'N/A'}}
                                    </div>

                                </td>

                                {{-- Role --}}
                                <td class="px-6 py-5">

                                    <span
                                        class="px-3 py-1 rounded-xl bg-indigo-100 text-indigo-700 text-xs font-semibold">
                                        {{ $approval->role }}
                                    </span>

                                </td>

                                {{-- Description --}}
                                <td class="px-6 py-5 text-gray-600 max-w-xs truncate">
                                    {{ $approval->description ?? 'No description available' }}
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-5">
                                    @php
                                    $status = strtolower($approval->status ?? '');
                                    @endphp

                                    <span class="px-3 py-1 rounded-full text-xs font-semibold
        @if($status === 'pending') bg-yellow-100 text-yellow-800
        {{-- @elseif($status === 'waiting') bg-gray-100 text-gray-700 --}}
        @elseif($status === 'approved') bg-green-100 text-green-700
        @elseif($status === 'rejected') bg-red-100 text-red-700
        @else bg-gray-100 text-gray-500
        @endif
    ">
                                        {{ ucfirst($status ?: 'No Status available') }}
                                    </span>
                                </td>

                                {{-- Level --}}
                                {{-- <td class="px-6 py-5 text-center">
                                    <span
                                        class="w-9 h-9 inline-flex items-center justify-center rounded-full bg-slate-800 text-white font-bold text-sm">
                                        {{ $approval->approval_level_id }}
                                    </span>
                                </td> --}}

                                {{-- Sequence --}}
                                <td class="px-6 py-5 text-center">
                                    <span
                                        class="w-9 h-9 inline-flex items-center justify-center rounded-full bg-slate-800 text-white font-bold text-sm">
                                        {{ $approval->sequence }}
                                    </span>
                                </td>

                                {{-- Created At --}}
                                <td class="px-6 py-5 text-gray-500 text-sm">
                                    {{ $approval->created_at->format('d M Y H:i') }}
                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-5">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Detail --}}
                                        {{-- <a href="{{ route('approvals.show', $approval->id) }}"
                                            class="px-3 py-1.5 text-xs text-white bg-blue-500 rounded-lg hover:bg-blue-600 shadow">
                                            Detail
                                        </a> --}}
                                        {{-- Edit --}}
                                        {{-- <a href="{{ route('approvals.edit', $approval->id) }}"
                                            class="px-4 py-2 rounded-xl bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-semibold transition">

                                            Edit
                                        </a> --}}
                                        @if($approval->status === 'pending')
                                        <a href="{{ route('approvals.edit', $approval->id) }}" class="px-4 py-2 rounded-xl bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-semibold transition">
                                            Edit
                                        </a>
                                        @endif

                                        {{-- Delete --}}
                                        {{-- <form action="{{ route('approvals.destroy', $approval->id) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="px-4 py-2 rounded-xl bg-red-100 hover:bg-red-200 text-red-700 text-xs font-semibold transition">

                                                Delete
                                            </button>

                                        </form> --}}

                                    </div>
                                </td>
                            </tr>
                            @empty

                            {{-- Empty State --}}
                            <tr>
                                <td colspan="9" class="px-6 py-14 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div
                                            class="w-20 h-20 rounded-3xl bg-gray-100 flex items-center justify-center mb-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>

                                        <h3 class="text-lg font-semibold text-gray-700">
                                            Belum ada data approval
                                        </h3>

                                        <p class="text-gray-500 mt-1 text-sm">
                                            Tambahkan approval baru untuk memulai
                                        </p>

                                    </div>

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection