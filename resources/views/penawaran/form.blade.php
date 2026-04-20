@include('layout.header')

<div class="max-w-5xl mx-auto px-4 pt-28 mt-10 pb-10">
    <!-- Card -->
    <div class="bg-white/80 backdrop-blur-md shadow-xl rounded-2xl border border-gray-200">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h5 class="text-lg font-semibold text-gray-800">
                Surat Penawaran
            </h5>
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-10">
        </div>

        <!-- Body -->
        <div class="p-6">
            <form class="grid grid-cols-1 md:grid-cols-2 gap-5"
                method="POST"
                action="{{ route('penawaran.store') }}"
                enctype="multipart/form-data">

                @csrf

                <!-- Offer Number -->
                <div class="md:col-span-2">
                    <h2 class="text-xl font-bold text-gray-700">
                        Nomer Penawaran: {{ $offerNumber }}
                    </h2>
                </div>

                <!-- Company Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Company Name
                    </label>
                    <input type="text" name="company_name"
                        value="{{ old('company_name') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('company_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subject -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Subject
                    </label>
                    <input type="text" name="subject_name"
                        value="{{ old('subject_name') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('subject_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Category Penawaran
                    </label>
                    <input type="text" name="category_penawaran"
                        value="{{ old('category_penawaran') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('category_penawaran')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contact Person -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Contact Person
                    </label>
                    <input type="text" name="contact_person"
                        value="{{ old('contact_person') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('contact_person')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No Quotation -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        No. Quotation
                    </label>
                    <input type="text" name="no_quotation"
                        value="{{ old('no_quotation') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('no_quotation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Purposed Value -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Purposed Value
                    </label>
                    <input type="number" step="0.01" name="purposed_value"
                        value="{{ old('purposed_value') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('purposed_value')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Date SPH
                    </label>
                    <input type="date" name="date_sph"
                        value="{{ old('date_sph') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('date_sph')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Description
                    </label>
                    <textarea name="description" rows="3"
                        class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Upload Dokumen
                    </label>
                    <input type="file" name="upload_dokumen"
                        class="w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                    @error('upload_dokumen')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="md:col-span-2 text-right">
                    <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@include('layout.footer')