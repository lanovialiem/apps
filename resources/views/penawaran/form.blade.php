{{-- @include('layout.header') --}}

@extends('welcome.welcome')

@section('content')
<div class="container mx-auto pt-32 px-4 py-10">
    <div class="max-w-6xl mx-auto">

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-200">

            <!-- Header -->
            <div class="flex items-center justify-between px-8 py-5 bg-gradient-to-r from-blue-600 to-indigo-600">
                <div>
                    <h1 class="text-2xl font-bold text-white">
                        Surat Penawaran
                    </h1>
                    <p class="text-sm text-blue-100 mt-1">
                        Nomor Penawaran: {{ $offerNumber }}
                    </p>
                </div>

                <img src="{{ asset('images/logo.png') }}"
                    class="h-12 w-auto object-contain bg-white p-2 rounded-xl shadow" alt="Logo">
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('penawaran.store') }}" enctype="multipart/form-data"
                class="p-8 space-y-8" id="form-id">

                @csrf

                <!-- Customer Info -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 mb-5">
                        Customer Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <!-- Company Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">
                                Company Name
                            </label>

                            <input type="text" name="company_name" value="{{ old('company_name') }}"
                                placeholder="Enter company name"
                                class="w-full rounded-xl border border-gray-300 text-black px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                            @error('company_name')
                            <p class="text-sm text-red-500 mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Customer Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">
                                Customer Name
                            </label>

                            <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                placeholder="Enter customer name"
                                class="w-full rounded-xl border border-gray-300 text-black px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                            @error('customer_name')
                            <p class="text-sm text-red-500 mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Customer Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">
                                Customer Email
                            </label>

                            <input type="email" name="customer_email" value="{{ old('customer_email') }}"
                                placeholder="Enter customer email"
                                class="w-full rounded-xl border border-gray-300 text-black px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                            @error('customer_email')
                            <p class="text-sm text-red-500 mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Products -->
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">
                            Product Selection
                        </h2>

                        <div class="flex gap-3">
                            <button type="button" id="add-row"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl shadow transition">
                                + Add Row
                            </button>

                            <button type="button" id="delete-row"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl shadow transition">
                                - Delete Row
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto border border-gray-200 rounded-2xl">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50 text-gray-700 uppercase text-medium leading-normal">
                                <tr class="text-gray-700 uppercase text-sm leading-normal">
                                    <th class="px-6 py-4">Product</th>
                                    <th class="px-6 py-4 w-40">Quantity</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">
                                <tr id="product0"
                                    class="hover:bg-gray-50 transition bg-gray-50 text-gray-700 uppercase text-medium leading-normal">
                                    <td class="px-6 py-4">
                                        <select name="product_id[]"
                                            class="w-full rounded-xl border  text-black bg-white border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                                            <option value="">
                                                Select Product
                                            </option>

                                            @foreach ($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->product_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td class="px-6 py-4">
                                        <input type="number" name="quantity[]" min="1" placeholder="0"
                                            class="w-full rounded-xl border  text-black bg-white border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex items-center justify-between pt-6 border-t">

                    <button type="button" id="hello-button"
                        class="text-gray-600 hover:text-blue-600 font-medium transition">
                        Hello
                    </button>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl shadow-lg transition">
                        Submit Penawaran
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

{{-- @include('layout.footer') --}}
@push('scripts')
<script>
    $(document).ready(function() {
        let rowCount = 1;

        // Product options template
        const productOptions = `
            <option value="">Select Product</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->product_name }}
                </option>
            @endforeach
        `;

        // Create new row
        function createRow(index) {
            return `
                <tr id="product${index}" class="hover:bg-gray-50 transition">     
                    <!-- Product -->
                    <td class="px-6 py-4">
                        <select
                            name="product_id[]"
                            class="w-full rounded-xl border  text-black bg-white border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            ${productOptions}
                        </select>
                    </td>

                    <!-- Quantity -->
                    <td class="px-6 py-4">
                        <input
                            type="number"
                            name="quantity[]"
                            min="1"
                            class="w-full rounded-xl border  text-black bg-white border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </td>
                </tr>
            `;
        }

        function updateProductOptions() {

            // ambil semua product yang sudah dipilih
            let selectedProducts = [];
            
            $('select[name="product_id[]"]').each(function() {
                let value = $(this).val();
                if (value) {
                    selectedProducts.push(value);
                }
            });

            // reset semua option
            $('select[name="product_id[]"]').each(function() {

                let currentSelect = $(this);
                let currentValue = currentSelect.val();

                currentSelect.find('option').prop('disabled', false);

                // disable option yang sudah dipilih di select lain
                currentSelect.find('option').each(function() {
                    let optionValue = $(this).val();

                    if (
                        optionValue &&
                        optionValue !== currentValue &&
                        selectedProducts.includes(optionValue)
                    ) {
                        $(this).prop('disabled', true);
                    }
                });
            });
        }

        // Add Row
        $('#add-row').on('click', function(e) {
            e.preventDefault();
            $('tbody').append(createRow(rowCount));
            updateProductOptions();
            rowCount++;
        });

        // Delete Row
        $('#delete-row').on('click', function(e) {
            e.preventDefault();
            const productRows = $('tr[id^="product"]');
            if (productRows.length > 1) {
                productRows.last().remove();
                updateProductOptions();
                rowCount--;
            }
        });

        // Debug Button
        $('#hello-button').on('click', function() {
            alert('jQuery is working! 🎉');
        });

        //Form Submission Validation
        $('#form-id').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('penawaran.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert('Data berhasil disimpan');
                    console.log(response);
                    // reset form
                    $('#form-id')[0].reset();
                    // remove extra rows
                    $('tr[id^="product"]').not(':first').remove();
                },

                error: function(xhr) {
                    console.log(xhr);

                    // VALIDATION ERROR
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += '• ' + value[0] + '\n';
                        });
                        alert(errorMessage);
                    } else {
                        alert('❌ Terjadi kesalahan server');
                    }
                }
            });
        });
    });
</script>
@endpush