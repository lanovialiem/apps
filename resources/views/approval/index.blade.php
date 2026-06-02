@extends('welcome.welcome')

@section('content')
<div class="container">

    <div>

        {{-- Card --}}
        <div>
            {{-- Header --}}
            <div class="page-header">

                <div>

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
            <div class="employee-card">

                <div class="table-wrapper">

                    <table class="table-design">

                        {{-- Table Head --}}
                        <thead>

                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Company
                                </th>

                                <th>
                                    No Letter
                                </th>

                                <th>
                                    Author
                                </th>

                                <th>
                                    Role
                                </th>

                                <th>
                                    Description
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    approved/reject by
                                </th>
                                {{-- <th>
                                    Level
                                </th> --}}

                                <th>
                                    Sequence
                                </th>

                                <th>
                                    Created At
                                </th>

                                <th>
                                    Action
                                </th>

                            </tr>
                        </thead>

                        {{-- Table Body --}}
                        <tbody>
                            @forelse ($approvals as $approval)
                            <tr>
                                {{-- ID --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                {{-- Penawaran --}}
                                <td>
                                    <span class="px-3 py-1 rounded-xl bg-blue-100 text-blue-700 text-xs font-bold">

                                        {{ $approval->penawaran->company_name ?? 'N/A' }}
                                    </span>
                                </td>

                                {{-- Nomor surat --}}
                                <td>
                                    <span class="px-3 py-1 rounded-xl bg-blue-100 text-blue-700 text-xs font-bold">
                                        {{ $approval->penawaran->offer_number ?? 'N/A' }}
                                    </span>
                                </td>

                                {{-- Name --}}
                                <td>
                                    <div class="font-semibold text-gray-800">
                                        {{ $approval->user->name ?? 'N/A'}}
                                    </div>

                                </td>

                                {{-- Role --}}
                                <td>
                                    <span
                                        class="px-3 py-1 rounded-xl bg-indigo-100 text-indigo-700 text-xs font-semibold">
                                        {{ $approval->role }}
                                    </span>

                                </td>

                                {{-- Description --}}
                                <td>
                                    {{ $approval->description ?? 'No description available' }}
                                </td>

                                {{-- Status --}}
                                <td>
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
                                {{-- <td>
                                    <span
                                        class="w-9 h-9 inline-flex items-center justify-center rounded-full bg-slate-800 text-white font-bold text-sm">
                                        {{ $approval->approval_level_id }}
                                    </span>
                                </td> --}}

                                {{-- approver/rejcted by --}}
                                <td>
                                    @if($approval->status === 'approved')
                                    <span class="text-green-600 font-semibold">
                                        Approved by {{ $approval->approver->name ?? '-' }}
                                    </span>

                                    @elseif($approval->status === 'rejected')
                                    <span class="text-red-600 font-semibold">
                                        Rejected by {{ $approval->approver->name ?? '-' }}
                                    </span>

                                    @endif
                                </td>

                                {{-- Sequence --}}
                                <td>
                                    <span
                                        class="w-9 h-9 inline-flex items-center justify-center rounded-full bg-slate-800 text-white font-bold text-sm">
                                        {{ $approval->sequence }}
                                    </span>
                                </td>

                                {{-- Created At --}}
                                <td>
                                    {{ $approval->created_at->format('d M Y H:i') }}
                                </td>

                                {{-- Action --}}
                                <td>
                                    <div class="action-group">

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
                                        @php
                                        $userRole = strtolower(auth()->user()->roles->first()->name ?? '');
                                        @endphp

                                        @if(
                                        $approval->status === 'pending' &&
                                        (
                                        auth()->user()->hasRole('Super Admin') ||
                                        auth()->user()->hasRole($approval->role)
                                        )
                                        )
                                        <a href="{{ route('approvals.edit', $approval->id) }}"
                                            class="px-4 py-2 rounded-xl bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-semibold transition">
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
                                <td colspan="12">
                                    <div class="flex flex-col items-center justify-center py-10">
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