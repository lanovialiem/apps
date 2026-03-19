@include('layout.header')

<div class="container py-4">
    <div class="card shadow rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Employee Registration Form</h5>
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" height="40">
        </div>
        <div class="card-body">
            <form class="row g-4" method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                @csrf
                                
                {{-- Identity --}}
                <div class="col-md-6">
                    <label for="identity_id" class="form-label">Identity ID</label>
                    <input type="text" class="form-control" id="identity_id" name="identity_id"
                        placeholder="Enter Identity ID" value="{{ old('identity_id') }}">
                    @error('identity_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="badge_id" class="form-label">Badge ID</label>
                    <input type="text" class="form-control" id="badge_id" name="badge_id" placeholder="Enter Badge ID"
                        value="{{ old('badge_id') }}">
                    @error('badge_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Company --}}
                <div class="col-md-6">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">
                    @error('company') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Request Type & Name --}}
                <div class="col-md-6">
                    <label for="request_type" class="form-label">Request Type</label>
                    <input type="text" class="form-control" id="request_type" name="request_type"
                        value="{{ old('request_type') }}">
                    @error('request_type') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name"
                        value="{{ old('full_name') }}">
                    @error('full_name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="nick_name" class="form-label">Nick Name</label>
                    <input type="text" class="form-control" id="nick_name" name="nick_name"
                        value="{{ old('nick_name') }}">
                    @error('nick_name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Birth Info --}}
                <div class="col-md-6">
                    <label for="birth_date" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date"
                        value="{{ old('birth_date') }}">
                    @error('birth_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="birth_place" class="form-label">Birth Place</label>
                    <input type="text" class="form-control" id="birth_place" name="birth_place"
                        value="{{ old('birth_place') }}">
                    @error('birth_place') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Gender & Marital --}}
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                        <option disabled {{ old('gender') ? '' : 'selected' }}>Choose...</option>
                        <option value="Male" {{ old('gender')=='Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender')=='Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="marital_status" class="form-label">Marital Status</label>
                    <select class="form-select" id="marital_status" name="marital_status">
                        <option disabled {{ old('marital_status') ? '' : 'selected' }}>Choose...</option>
                        <option value="Single" {{ old('marital_status')=='Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ old('marital_status')=='Married' ? 'selected' : '' }}>Married
                        </option>
                    </select>
                    @error('marital_status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Skill & Job --}}
                <div class="col-md-6">
                    <label for="skill_category" class="form-label">Skill Category</label>
                    <select class="form-select" id="skill_category" name="skill_category">
                        <option disabled {{ old('skill_category') ? '' : 'selected' }}>Choose...</option>
                        <option value="Skilled" {{ old('skill_category')=='Skilled' ? 'selected' : '' }}>Skilled
                        </option>
                        <option value="Unskilled" {{ old('skill_category')=='Unskilled' ? 'selected' : '' }}>Unskilled
                        </option>
                    </select>
                    @error('skill_category') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="category_id" class="form-label">Job Category</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option disabled {{ old('category_id') ? '' : 'selected' }}>Choose...</option>
                        @foreach ($category as $c)
                        <option value="{{ $c->id }}" {{ old('category_id')==$c->id ? 'selected' : '' }}>
                            {{ $c->job_category }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="category_code_id" class="form-label">Job Code</label>
                    <select class="form-select" id="category_code_id" name="category_code_id">
                        <option disabled {{ old('category_code_id') ? '' : 'selected' }}>Choose...</option>
                        @foreach ($category_code as $c)
                        <option value="{{ $c->id }}" {{ old('category_code_id')==$c->id ? 'selected' : '' }}>
                            {{ $c->job_code }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_code_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Contact --}}
                <div class="col-md-6">
                    <label for="nationality" class="form-label">Nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality"
                        value="{{ old('nationality', 'Indonesia') }}">
                    @error('nationality') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-3">
                    <label for="country_code" class="form-label">Country Code</label>
                    <input type="text" class="form-control" id="country_code" name="country_code"
                        value="{{ old('country_code', '62') }}">
                    @error('country_code') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        value="{{ old('phone_number') }}">
                    @error('phone_number') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Dates --}}
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Start/In Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ old('start_date') }}">
                    @error('start_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-3">
                    <label for="end_date" class="form-label">Resign/End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                    @error('end_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- New Dates --}}
                <div class="col-md-3">
                    <label for="induction_date" class="form-label">Induction Date</label>
                    <input type="date" class="form-control" id="induction_date" name="induction_date"
                        value="{{ old('induction_date') }}">
                    @error('induction_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Status --}}
                <div class="col-md-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option disabled {{ old('status') ? '' : 'selected' }}>Choose...</option>
                        <option value="Active" {{ old('status')=='Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('status')=='Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Address --}}
                <div class="col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                    @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- Profile --}}
                <div class="col-md-6">
                    <label for="image_profile" class="form-label">Upload Profile</label>
                    <input type="file" class="form-control @error('image_profile') is-invalid @enderror"
                        id="image_profile" name="image_profile">
                    @error('image_profile') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')