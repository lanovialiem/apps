@include('layout.header')

<div class="container mt-5">
    <div class="card shadow rounded-3">
        <div class="card-header">
            <h4 class="mb-0">Edit Employee Data</h4>
        </div>
        <div class="card-body">

            {{-- Tampilkan error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Company --}}
                    <div class="col-md-6">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" class="form-control" name="company" id="company"
                            value="{{ old('company', $employee->company) }}">
                        @error('company')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option disabled {{ old('status', $employee->status) ? '' : 'selected' }}>Choose...</option>
                            <option value="Active" {{ old('status', $employee->status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status', $employee->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $employee->address) }}</textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Badge ID --}}
                    <div class="col-md-6">
                        <label for="badge_id" class="form-label">Badge ID</label>
                        <input type="text" class="form-control" name="badge_id" id="badge_id"
                            value="{{ old('badge_id', $employee->badge_id) }}">
                    </div>

                    {{-- Identity ID --}}
                    <div class="col-md-6">
                        <label for="identity_id" class="form-label">Identity ID</label>
                        <input type="text" class="form-control" name="identity_id" id="identity_id"
                            value="{{ old('identity_id', $employee->identity_id) }}">
                    </div>

                    {{-- Request Type --}}
                    <div class="col-md-6">
                        <label for="request_type" class="form-label">Request Type</label>
                        <input type="text" class="form-control" name="request_type" id="request_type"
                            value="{{ old('request_type', $employee->request_type) }}">
                    </div>

                    {{-- Full Name --}}
                    <div class="col-md-6">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" id="full_name"
                            value="{{ old('full_name', $employee->full_name) }}">
                    </div>

                    {{-- Nick Name --}}
                    <div class="col-md-6">
                        <label for="nick_name" class="form-label">Nick Name</label>
                        <input type="text" class="form-control" name="nick_name" id="nick_name"
                            value="{{ old('nick_name', $employee->nick_name) }}">
                    </div>

                    {{-- Birth Date --}}
                    <div class="col-md-6">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" name="birth_date" id="birth_date"
                            value="{{ old('birth_date', $employee->birth_date) }}">
                    </div>

                    {{-- Birth Place --}}
                    <div class="col-md-6">
                        <label for="birth_place" class="form-label">Birth Place</label>
                        <input type="text" class="form-control" name="birth_place" id="birth_place"
                            value="{{ old('birth_place', $employee->birth_place) }}">
                    </div>

                    {{-- Gender --}}
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option disabled {{ old('gender', $employee->gender) ? '' : 'selected' }}>Choose...</option>
                            <option value="Male" {{ old('gender', $employee->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $employee->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    {{-- Marital Status --}}
                    <div class="col-md-6">
                        <label for="marital_status" class="form-label">Marital Status</label>
                        <select class="form-select" name="marital_status" id="marital_status">
                            <option disabled {{ old('marital_status', $employee->marital_status) ? '' : 'selected' }}>Choose...</option>
                            <option value="Single" {{ old('marital_status', $employee->marital_status) == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="Married" {{ old('marital_status', $employee->marital_status) == 'Married' ? 'selected' : '' }}>Married</option>
                        </select>
                    </div>

                    {{-- Skill Category --}}
                    <div class="col-md-6">
                        <label for="skill_category" class="form-label">Skill Category</label>
                        <select class="form-select" name="skill_category" id="skill_category">
                            <option disabled {{ old('skill_category', $employee->skill_category) ? '' : 'selected' }}>Choose...</option>
                            <option value="Skilled" {{ old('skill_category', $employee->skill_category) == 'Skilled' ? 'selected' : '' }}>Skilled</option>
                            <option value="Unskilled" {{ old('skill_category', $employee->skill_category) == 'Unskilled' ? 'selected' : '' }}>Unskilled</option>
                        </select>
                    </div>

                    {{-- Job Category --}}
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Job Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}" {{ old('category_id', $employee->category_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->job_category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Job Code --}}
                    <div class="col-md-6">
                        <label for="category_code_id" class="form-label">Job Code</label>
                        <select class="form-select" id="category_code_id" name="category_code_id" required>
                            @foreach ($category_code as $c)
                                <option value="{{ $c->id }}" {{ old('category_code_id', $employee->category_code_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->job_code }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_code_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nationality --}}
                    <div class="col-md-6">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" class="form-control" name="nationality" id="nationality"
                            value="{{ old('nationality', $employee->nationality) }}">
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ old('email', $employee->email) }}">
                    </div>

                    {{-- Country Code --}}
                    <div class="col-md-2">
                        <label for="country_code" class="form-label">Country Code</label>
                        <input type="text" class="form-control" name="country_code" id="country_code"
                            value="{{ old('country_code', $employee->country_code) }}">
                    </div>

                    {{-- Phone Number --}}
                    <div class="col-md-4">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                            value="{{ old('phone_number', $employee->phone_number) }}">
                    </div>

                    {{-- Start Date --}}
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="start_date"
                            value="{{ old('start_date', $employee->start_date) }}">
                    </div>

                    {{-- End Date --}}
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date" id="end_date"
                            value="{{ old('end_date', $employee->end_date) }}">
                    </div>

                    {{-- Image Profile --}}
                    <div class="col-md-6">
                        <label for="image_profile" class="form-label">Edit Profile</label>
                        <input type="file" class="form-control @error('image_profile') is-invalid @enderror"
                               id="image_profile" name="image_profile">
                        @error('image_profile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="col-12 mt-3 text-end">
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')