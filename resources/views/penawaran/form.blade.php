@include('layout.header')

<div class="max-w-5xl mx-auto pt-28 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Surat Penawaran
            </h2>
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('penawaran.store') }}" enctype="multipart/form-data"
            class="p-6 space-y-8" id="form-id">
            @csrf

            <!-- Offer Number -->
            <h2 class="text-xl font-bold text-gray-700">
                Nomor Penawaran: {{ $offerNumber }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Company -->
                <div>
                    <label class="label">Company Name</label>
                    <input type="text" name="company_name" value="{{ old('company_name') }}" class="input">
                    @error('company_name') <p class="error">{{ $message }}</p> @enderror
                </div>

                <!-- Subject -->
                <div>
                    <label class="label">Subject</label>
                    <input type="text" name="subject_name" value="{{ old('subject_name') }}" class="input">
                    @error('subject_name') <p class="error">{{ $message }}</p> @enderror
                </div>

                <!-- Category -->
                <div class="md:col-span-2 lg:col-span-3">
                    <label class="label">Category</label>
                    <input type="text" name="category_penawaran" value="{{ old('category_penawaran') }}"
                        class="input">
                    @error('category_penawaran') <p class="error">{{ $message }}</p> @enderror
                </div>

                <!-- PRODUCT + QTY (LOOP CLEAN) -->
                <div class="md:col-span-3 space-y-4">
                    <label class="label">Products</label>

                    @foreach ($orderProducts as $index => $item)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 items-end">

                            <!-- Product -->
                            <label for="product_id">Product</label>
                            <div>
                                <select name="orderProducts[{{ $index }}][product_id]"
                                    class="form-control input">
                                    <option value="">-- Pilih Product --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ $item['product_id'] == $product->id ? 'selected' : '' }}>
                                            {{ $product->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Qty -->
                            <div>
                                <input type="number"
                                    name="orderProducts[{{ $index }}][quantity]"
                                    value="{{ $item['quantity'] ?? 0 }}"
                                    min="0"
                                    class="form-control input"
                                    placeholder="Qty">
                            </div>

                            <!-- Delete -->
                            <div>
                                <button type="button"
                                    class="text-red-500 text-sm"
                                    wire:click.prevent="removeProduct({{ $index }})">
                                    Delete
                                </button>
                            </div>

                        </div>
                    @endforeach

                    <!-- Add Button -->
                    <button type="button"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg"
                        wire:click="addProduct">
                        + Add Item
                    </button>
                </div>

                <!-- Contact -->
                <div>
                    <label class="label">Contact Person</label>
                    <input type="text" name="contact_person" value="{{ old('contact_person') }}"
                        class="input">
                    @error('contact_person') <p class="error">{{ $message }}</p> @enderror
                </div>

                <!-- Quotation -->
                <div>
                    <label class="label">No. Quotation</label>
                    <input type="text" name="no_quotation" value="{{ old('no_quotation') }}"
                        class="input">
                    @error('no_quotation') <p class="error">{{ $message }}</p> @enderror
                </div>

                <!-- Value -->
                <div>
                    <label class="label">Purposed Value</label>
                    <input type="number" step="0.01" name="purposed_value"
                        value="{{ old('purposed_value') }}" class="input">
                    @error('purposed_value') <p class="error">{{ $message }}</p> @enderror
                </div>

                <!-- Date -->
                <div>
                    <label class="label">Date SPH</label>
                    <input type="date" name="date_sph" value="{{ old('date_sph') }}"
                        class="input">
                    @error('date_sph') <p class="error">{{ $message }}</p> @enderror
                </div>

                <!-- Upload -->
                <div>
                    <label class="label">Upload Dokumen</label>
                    <input type="file" name="upload_dokumen" class="input-file">
                    @error('upload_dokumen') <p class="error">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-3">
                    <label class="label">Description</label>
                    <textarea name="description" rows="3" class="input">{{ old('description') }}</textarea>
                    @error('description') <p class="error">{{ $message }}</p> @enderror
                </div>

            </div>

            <!-- Submit -->
            <div class="flex justify-end pt-4 border-t">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md">
                    Submit
                </button>
            </div>

        </form>
    </div>
</div>

@include('layout.footer')