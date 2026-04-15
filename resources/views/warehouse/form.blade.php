@include('layout.header')

<div class="max-w-4xl mx-auto pt-28 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Form Warehouse
            </h2>
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('warehouse.store') }}"
              class="p-6 space-y-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Warehouse Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Name Warehouse
                    </label>
                    <input type="text" name="warehouse_name" value="{{ old('warehouse_name') }}" required
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    @error('warehouse_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Warehouse Code -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Code Warehouse
                    </label>
                    <input type="text" name="warehouse_code" value="{{ old('warehouse_code') }}" required
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    @error('warehouse_code')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Location Warehouse
                    </label>
                    <input type="text" name="warehouse_location" value="{{ old('warehouse_location') }}" required
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                    @error('warehouse_location')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Button -->
            <div class="flex justify-end pt-4 border-t">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md transition">
                    Submit
                </button>
            </div>

        </form>
    </div>
</div>

@include('layout.footer')