@include('layout.header')

<div class="max-w-5xl mx-auto pt-28 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Edit Penawaran
            </h2>
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
        </div>

        <!-- Form -->
        <form action="{{ route('penawaran.update', $penawaran->id) }}" method="POST" enctype="multipart/form-data"
            class="p-6 space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Company Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Company Name</label>
                    <input type="text" name="company_name"
                        value="{{ old('company_name', $penawaran->company_name) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                    @error('company_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subject -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Subject</label>
                    <input type="text" name="subject_name"
                        value="{{ old('subject_name', $penawaran->subject_name) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                    @error('subject_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Category</label>
                    <input type="text" name="category_penawaran"
                        value="{{ old('category_penawaran', $penawaran->category_penawaran) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                    @error('category_penawaran')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contact Person -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Contact Person</label>
                    <input type="text" name="contact_person"
                        value="{{ old('contact_person', $penawaran->contact_person) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                    @error('contact_person')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No Quotation -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">No. Quotation</label>
                    <input type="text" name="no_quotation"
                        value="{{ old('no_quotation', $penawaran->no_quotation) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                    @error('no_quotation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Purposed Value -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Purposed Value</label>
                    <input type="number" step="0.01" name="purposed_value"
                        value="{{ old('purposed_value', $penawaran->purposed_value) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                    @error('purposed_value')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Date SPH</label>
                    <input type="date" name="date_sph"
                        value="{{ old('date_sph', \Carbon\Carbon::parse($penawaran->date_sph)->format('Y-m-d')) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                    @error('date_sph')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Upload Dokumen</label>

                    @if ($penawaran->upload_dokumen)
                        <a href="{{ asset('storage/' . $penawaran->upload_dokumen) }}"
                           target="_blank"
                           class="text-blue-600 text-sm underline">
                            Lihat file lama
                        </a>
                    @endif

                    <input type="file" name="upload_dokumen"
                        class="w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:bg-blue-50 file:text-blue-600
                        hover:file:bg-blue-100 mt-2">

                    @error('upload_dokumen')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2 lg:col-span-3">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">{{ old('description', $penawaran->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="{{ route('penawaran.index') }}"
                    class="px-6 py-2 rounded-xl border border-gray-300 text-gray-600 hover:bg-gray-100">
                    Cancel
                </a>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md transition">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>

@include('layout.footer')