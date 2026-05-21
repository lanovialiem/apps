@extends('welcome.welcome')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-10">

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">

            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white">
                            Form Approval
                        </h2>

                        <p class="text-blue-100 mt-1 text-sm">
                            Kelola proses approval penawaran
                        </p>
                    </div>

                    <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('approvals.store') }}" method="POST" class="p-8">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Penawaran -->
                    <div class="md:col-span-2">
                        <label for="penawaran_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            Pilih Penawaran
                        </label>

                        <select name="penawaran_id" id="penawaran_id"
                            class="w-full rounded-xl border px-4 py-5 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            <option value="">
                                -- Pilih Penawaran --
                            </option>

                            @foreach ($penawarans as $penawaran)
                                <option value="{{ $penawaran->id }}"
                                    {{ old('penawaran_id') == $penawaran->id ? 'selected' : '' }}>

                                    {{ $penawaran->subject_name }}
                                    -
                                    {{ $penawaran->company_name }}

                                </option>
                            @endforeach

                        </select>

                        @error('penawaran_id')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Nama Approval -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Approval
                        </label>
                        <div class="bg-gray-50 border rounded-xl px-4 py-3 text-gray-700">
                            {{ Auth::user()->name }}
                        </div>
                    </div>

                    <!-- Role -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Role Penanggung Jawab
                        </label>

                        <div class="bg-gray-50 border rounded-xl px-4 py-3 text-gray-700">
                            {{ Auth::user()->roles->first()->name ?? 'No Role Assigned' }}
                        </div>
                    </div>

                    <!-- Level -->
                    <div>
                        <label for="level" class="block text-sm font-semibold text-gray-700 mb-2 p-3"> Level Approval
                        </label>

                        <div class="relative">
                            <input type="number" name="level" id="level" min="1" value="{{ old('level', 1) }}"
                                class="w-full rounded-xl border pl-4 pr-10 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Status
                        </label>

                        <div class="flex flex-wrap gap-4">

                            <!-- Pending -->
                            <label
                                class="flex items-center gap-2 px-4 py-2 rounded-xl border border-yellow-200 bg-yellow-50 cursor-pointer">

                                <input type="radio" name="status" value="pending"
                                    class="text-yellow-500 focus:ring-yellow-400"
                                    {{ old('status', 'pending') == 'pending' ? 'checked' : '' }}>

                                <span class="text-sm font-medium text-yellow-700">
                                    Pending
                                </span>
                            </label>

                            <!-- Approved -->
                            <label
                                class="flex items-center gap-2 px-4 py-2 rounded-xl border border-green-200 bg-green-50 cursor-pointer">

                                <input type="radio" name="status" value="approved"
                                    class="text-green-500 focus:ring-green-400"
                                    {{ old('status') == 'approved' ? 'checked' : '' }}>

                                <span class="text-sm font-medium text-green-700">
                                    Approved
                                </span>
                            </label>

                            <!-- Rejected -->
                            <label
                                class="flex items-center gap-2 px-4 py-2 rounded-xl border border-red-200 bg-red-50 cursor-pointer">

                                <input type="radio" name="status" value="rejected"
                                    class="text-red-500 focus:ring-red-400"
                                    {{ old('status') == 'rejected' ? 'checked' : '' }}>

                                <span class="text-sm font-medium text-red-700">
                                    Rejected
                                </span>
                            </label>

                        </div>
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Catatan / Deskripsi
                        </label>

                        <textarea name="description" id="description" rows="4" placeholder="Tambahkan catatan approval..."
                            class="w-full rounded-xl border px-4 py-5 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
                    </div>

                </div>

                <!-- Footer -->
                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t">

                    <a href="{{ route('approvals.index') }}"
                        class="px-5 py-2.5 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition">

                        Batal
                    </a>

                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-md transition">

                        Simpan Approval
                    </button>

                </div>

            </form>
        </div>
    </div>
@endsection
