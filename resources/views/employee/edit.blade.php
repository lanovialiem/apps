@include('layout.header')

<div class="max-w-6xl mx-auto pt-32 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Edit Employee Data
            </h2>
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
        </div>

        <!-- Error -->
        @if ($errors->any())
        <div class="mx-6 mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-600 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data"
            class="p-6 space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Identity -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Identity ID</label>
                    <input type="text" name="identity_id"
                        value="{{ old('identity_id', $employee->identity_id) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Badge ID</label>
                    <input type="text" name="badge_id"
                        value="{{ old('badge_id', $employee->badge_id) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Company</label>
                    <input type="text" name="company"
                        value="{{ old('company', $employee->company) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Request Type</label>
                    <input type="text" name="request_type"
                        value="{{ old('request_type', $employee->request_type) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
                    <input type="text" name="full_name"
                        value="{{ old('full_name', $employee->full_name) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nick Name</label>
                    <input type="text" name="nick_name"
                        value="{{ old('nick_name', $employee->nick_name) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Birth Date</label>
                    <input type="date" name="birth_date"
                        value="{{ old('birth_date', $employee->birth_date) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Birth Place</label>
                    <input type="text" name="birth_place"
                        value="{{ old('birth_place', $employee->birth_place) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Gender</label>
                    <select name="gender" class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="">Choose...</option>
                        <option value="Male" {{ old('gender', $employee->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $employee->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Marital Status</label>
                    <select name="marital_status" class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="">Choose...</option>
                        <option value="Single" {{ old('marital_status', $employee->marital_status) == 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ old('marital_status', $employee->marital_status) == 'Married' ? 'selected' : '' }}>Married</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Skill Category</label>
                    <select name="skill_category" class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="">Choose...</option>
                        <option value="Skilled" {{ old('skill_category', $employee->skill_category) == 'Skilled' ? 'selected' : '' }}>Skilled</option>
                        <option value="Unskilled" {{ old('skill_category', $employee->skill_category) == 'Unskilled' ? 'selected' : '' }}>Unskilled</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Job Category</label>
                    <select name="category_id" class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        @foreach ($category as $c)
                            <option value="{{ $c->id }}"
                                {{ old('category_id', $employee->category_id) == $c->id ? 'selected' : '' }}>
                                {{ $c->job_category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Job Code</label>
                    <select name="category_code_id" class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        @foreach ($category_code as $c)
                            <option value="{{ $c->id }}"
                                {{ old('category_code_id', $employee->category_code_id) == $c->id ? 'selected' : '' }}>
                                {{ $c->job_code }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nationality</label>
                    <input type="text" name="nationality"
                        value="{{ old('nationality', $employee->nationality) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" name="email"
                        value="{{ old('email', $employee->email) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Country Code</label>
                    <input type="text" name="country_code"
                        value="{{ old('country_code', $employee->country_code) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Phone Number</label>
                    <input type="text" name="phone_number"
                        value="{{ old('phone_number', $employee->phone_number) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Start Date</label>
                    <input type="date" name="start_date"
                        value="{{ old('start_date', $employee->start_date) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">End Date</label>
                    <input type="date" name="end_date"
                        value="{{ old('end_date', $employee->end_date) }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                    <select name="status" class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option value="Active" {{ old('status', $employee->status) == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('status', $employee->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="md:col-span-2 lg:col-span-3">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Address</label>
                    <textarea name="address" rows="3"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">{{ old('address', $employee->address) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Profile Image</label>
                    <input type="file" name="image_profile"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                </div>

            </div>

            <!-- Button -->
            <div class="flex justify-end pt-4 border-t">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md transition">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>

@include('layout.footer')