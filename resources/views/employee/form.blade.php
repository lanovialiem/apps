@include('layout.header')

<div class="max-w-6xl mx-auto pt-32 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Employee Registration Form
            </h2>
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data"
            class="p-6 space-y-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Identity -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Identity ID</label>
                    <input type="text" name="identity_id"
                        value="{{ old('identity_id') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Badge ID</label>
                    <input type="text" name="badge_id"
                        value="{{ old('badge_id') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                </div>

                <!-- Company -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Company</label>
                    <input type="text" name="company"
                        value="{{ old('company') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                </div>

                <!-- Request -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Request Type</label>
                    <input type="text" name="request_type"
                        value="{{ old('request_type') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                </div>

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
                    <input type="text" name="full_name"
                        value="{{ old('full_name') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nick Name</label>
                    <input type="text" name="nick_name"
                        value="{{ old('nick_name') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                </div>

                <!-- Birth -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Birth Date</label>
                    <input type="date" name="birth_date"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Birth Place</label>
                    <input type="text" name="birth_place"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Gender</label>
                    <select name="gender"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="">Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <!-- Marital -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Marital Status</label>
                    <select name="marital_status"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="">Choose...</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                    </select>
                </div>

                <!-- Skill -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Skill Category</label>
                    <select name="skill_category"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="">Choose...</option>
                        <option value="Skilled">Skilled</option>
                        <option value="Unskilled">Unskilled</option>
                    </select>
                </div>

                <!-- Job Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Job Category</label>
                    <select name="category_id"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="">Choose...</option>
                        @foreach ($category as $c)
                            <option value="{{ $c->id }}">{{ $c->job_category }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Job Code -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Job Code</label>
                    <select name="category_code_id"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="">Choose...</option>
                        @foreach ($category_code as $c)
                            <option value="{{ $c->id }}">{{ $c->job_code }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Contact -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Phone</label>
                    <input type="text" name="phone_number"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                    <select name="status"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <!-- Dates -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Start Date</label>
                    <input type="date" name="start_date"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">End Date</label>
                    <input type="date" name="end_date"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Induction</label>
                    <input type="date" name="induction_date"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <!-- Profile -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Profile Image</label>
                    <input type="file" name="image_profile"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                </div>

                <!-- Address -->
                <div class="md:col-span-2 lg:col-span-3">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Address</label>
                    <textarea name="address" rows="3"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300"></textarea>
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