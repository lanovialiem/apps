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

                                <input type="text" name="company_name" id="company_name"
                                    value="{{ old('company_name') }}" placeholder="Enter company name"
                                    class="field-input w-full rounded-xl border border-gray-300 text-black px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                                <small id="error_company_name" class="error-text text-red-500 text-sm mt-1 hidden"></small>
                            </div>

                            <!-- Customer Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-2">
                                    Customer Name
                                </label>

                                <input type="text" name="customer_name" id="customer_name"
                                    value="{{ old('customer_name') }}" placeholder="Enter customer name"
                                    class="field-input w-full rounded-xl border border-gray-300 text-black px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                                <small id="error_customer_name" class="error-text text-red-500 text-sm mt-1 hidden"></small>
                            </div>

                            <!-- Customer Email -->
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-2">
                                    Customer Email
                                </label>

                                <input type="email" name="customer_email" id="customer_email"
                                    value="{{ old('customer_email') }}" placeholder="Enter customer email"
                                    class="field-input w-full rounded-xl border border-gray-300 text-black px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                                <small id="error_customer_email"
                                    class="error-text text-red-500 text-sm mt-1 hidden"></small>
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

                                <tbody class="divide-y divide-gray-100" id="product-tbody">
                                    <!-- Row Pertama (Index 0) - Static, tidak menggunakan $index -->
                                    <tr id="product0" class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4">
                                            <select name="product_id[]" id="product_select_0"
                                                class="product-select w-full rounded-xl border text-black bg-white border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small id="error_product_0"
                                                class="error-text text-red-500 text-sm mt-1 block hidden"></small>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" name="quantity[]" id="quantity_0" min="1"
                                                placeholder="0"
                                                class="quantity-input w-full rounded-xl border text-black bg-white border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                                            <small id="error_quantity_0"
                                                class="error-text text-red-500 text-sm mt-1 block hidden"></small>
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

            // Product options template untuk row dinamis
            const productOptions = `
            <option value="">Select Product</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
            @endforeach
        `;

            // Create new row function
            function createRow(index) {
                return `
                <tr id="product${index}" class="hover:bg-gray-50 transition product-row">
                    <td class="px-6 py-4">
                        <select name="product_id[]" id="product_select_${index}"
                            class="product-select w-full rounded-xl border text-black bg-white border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            ${productOptions}
                        </select>
                        <small id="error_product_${index}" class="error-text text-red-500 text-sm mt-1 block hidden"></small>
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" name="quantity[]" id="quantity_${index}" min="1" placeholder="0"
                            class="quantity-input w-full rounded-xl border text-black bg-white border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        <small id="error_quantity_${index}" class="error-text text-red-500 text-sm mt-1 block hidden"></small>
                    </td>
                </tr>
            `;
            }

            // Clear all error messages
            function clearAllErrors() {
                // Hide all error text elements
                $('.error-text').text('').addClass('hidden');

                // Remove error border styling
                $('.border-red-500').removeClass('border-red-500').addClass('border-gray-300');
                $('.field-input, .product-select, .quantity-input').removeClass('border-red-500').addClass(
                    'border-gray-300');
            }

            // Show error for specific field
            function showError(elementId, message) {
                $('#error_' + elementId).text(message).removeClass('hidden');
                $('#' + elementId).removeClass('border-gray-300').addClass('border-red-500');
            }

            // Update product options - disable yang sudah dipilih
            function updateProductOptions() {
                let selectedProducts = [];

                $('.product-select').each(function() {
                    let value = $(this).val();
                    if (value) {
                        selectedProducts.push(value);
                    }
                });

                $('.product-select').each(function() {
                    let currentSelect = $(this);
                    let currentValue = currentSelect.val();

                    currentSelect.find('option').prop('disabled', false);

                    currentSelect.find('option').each(function() {
                        let optionValue = $(this).val();

                        if (optionValue && optionValue !== currentValue && selectedProducts
                            .includes(optionValue)) {
                            $(this).prop('disabled', true);
                        }
                    });
                });
            }

            // Event: Add Row
            $('#add-row').on('click', function(e) {
                e.preventDefault();
                $('#product-tbody').append(createRow(rowCount));
                updateProductOptions();
                rowCount++;
            });

            // Event: Delete Row
            $('#delete-row').on('click', function(e) {
                e.preventDefault();
                const productRows = $('tr[id^="product"]');
                if (productRows.length > 1) {
                    productRows.last().remove();
                    updateProductOptions();
                    rowCount--;
                }
            });

            // Event: When product selection changes
            $(document).on('change', '.product-select', function() {
                updateProductOptions();
            });

            // Event: Hello button (debug)
            $('#hello-button').on('click', function() {
                alert('jQuery is working! Row count: ' + rowCount);
            });

            // Event: Form Submit via AJAX
            $('#form-id').on('submit', function(e) {
                e.preventDefault();

                // Clear previous errors first
                clearAllErrors();

                $.ajax({
                    url: "{{ route('penawaran.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Data berhasil disimpan!');
                        console.log(response);

                        // Reset form
                        $('#form-id')[0].reset();

                        // Remove extra rows (keep first row only)
                        $('tr[id^="product"]').not('#product0').remove();
                        rowCount = 1;
                    },
                    error: function(xhr) {
                        console.log('Error response:', xhr.responseJSON);

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            // Handle regular field errors (company_name, customer_name, customer_email)
                            // Format: errors['company_name'][0]
                            if (errors && errors['company_name']) {
                                showError('company_name', errors['company_name'][0]);
                            }
                            if (errors && errors['customer_name']) {
                                showError('customer_name', errors['customer_name'][0]);
                            }
                            if (errors && errors['customer_email']) {
                                showError('customer_email', errors['customer_email'][0]);
                            }

                            // Handle array field errors dengan format: errors['product_id.0'][0]
                            // Loop through all possible keys dynamically
                            if (errors) {
                                // Check for product_id.X errors
                                Object.keys(errors).forEach(function(key) {
                                    if (key.startsWith('product_id.')) {
                                        // key format: "product_id.0", "product_id.1", etc
                                        let index = key.split('.')[1];
                                        let message = errors[key][0];
                                        showError('product_' + index, message);
                                    }

                                    if (key.startsWith('quantity.')) {
                                        let index = key.split('.')[1];
                                        let message = errors[key][0];
                                        showError('quantity_' + index, message);
                                    }
                                });
                            }

                            alert('Validasi gagal. Silakan periksa form.');
                        } else {
                            alert('❌ Terjadi kesalahan server: ' + xhr.status);
                            console.log(xhr);
                        }
                    }
                });
            });
        });
    </script>
@endpush
