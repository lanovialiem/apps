@include('layout.header')

<div class="max-w-2xl mx-auto pt-32 px-4">

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Create Category
            </h2>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('category.store') }}" class="p-6 space-y-6">
            @csrf

            <!-- Job Category -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Nama Kategori
                </label>

                <input type="text"
                    name="job_category"
                    id="job_category"
                    placeholder="Enter job category"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">

                @error('job_category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
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