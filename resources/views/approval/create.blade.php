@extends('welcome.welcome')
@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6">

        <!-- Card Form -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">

            <!-- Header -->
            <div class="bg-blue-600 p-6 flex justify-between items-center">
                <div>
                    <h2 class="text-white text-xl font-bold">Form Approvals</h2>
                    <p class="text-blue-100 text-sm">Kelola data proses approval</p>
                </div>
                <div class="bg-blue-500 p-3 rounded-full text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('approvals.store') }}" method="POST" class="p-6 space-y-4">
                @csrf

                <!--  get from all penawaran Input untuk Penawaran ID (Jika diedit) -->
                <input type="text" name="penawaran_id" value="{{ $penawaran_id ?? old('penawaran_id') }}">

                <!-- Grid Layout 2 Kolom -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- 1. Nama / Title get from user->name -->
                    <div class="col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name Approval <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"
                            placeholder="Contoh: Bejo" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 2. Role get from user role ( Siapa yg Approve ) -->
                    <div class="col-span-1">
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role Penanggung
                            Jawab</label>
                        <select name="role" id="role"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                            <option value="">-- Pilih Role --</option>
                            <option value="Manager" {{ old('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                            <option value="Director" {{ old('role') == 'Director' ? 'selected' : '' }}>Director</option>
                            <option value="Finance" {{ old('role') == 'Finance' ? 'selected' : '' }}>Finance</option>
                            <option value="CEO" {{ old('role') == 'CEO' ? 'selected' : '' }}>CEO</option>
                        </select>
                    </div>

                    <!-- 3. Level Approval -->
                    <div class="col-span-1">
                        <label for="level" class="block text-sm font-medium text-gray-700 mb-1">Level Approv</label>
                        <div class="flex items-center">
                            <input type="number" name="level" id="level" value="{{ old('level', 1) }}" min="1"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                            <span class="ml-2 text-gray-500 text-sm">Urutan Ke</span>
                        </div>
                    </div>

                    <!-- 4. Status -->
                    <div class="col-span-2">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status Saat
                            Ini</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="pending"
                                    {{ old('status', $approval->status ?? 'pending') == 'pending' ? 'checked' : '' }}
                                    class="form-radio text-yellow-600">
                                <span class="ml-2 text-gray-700">Pending</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="approved"
                                    {{ old('status') == 'approved' ? 'checked' : '' }} class="form-radio text-green-600">
                                <span class="ml-2 text-gray-700">Approved</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="rejected"
                                    {{ old('status') == 'rejected' ? 'checked' : '' }} class="form-radio text-red-600">
                                <span class="ml-2 text-gray-700">Rejected</span>
                            </label>
                        </div>
                    </div>


                    <!-- 5. Description -->
                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi /
                            Catatan</label>
                        <textarea name="description" id="description" rows="3"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"
                            placeholder="Tuliskan deskripsi atau alasan penolakan/persetujuan...">{{ old('description') }}</textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end mt-6 pt-4 border-t border-gray-100">
                    <a href="{{ route('approvals.index') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 mr-2">
                        Batal
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 shadow-sm">
                        Simpan Data
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
