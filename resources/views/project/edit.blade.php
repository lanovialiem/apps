@include('layout.header')

<div class="container mt-5">
    <div class="card shadow rounded-3">
        <div class="card-header">
            <h4 class="mb-0">Edit project Data</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('project.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="badge_id" class="form-label">Badge ID</label>
                        <input type="text" class="form-control" name="badge_id" id="badge_id" value="{{ $project->badge_id }}">
                    </div>

                    <div class="col-md-6">
                        <label for="identity_id" class="form-label">Identity ID</label>
                        <input type="text" class="form-control" name="identity_id" id="identity_id" value="{{ $project->identity_id }}">
                    </div>

                    <div class="col-md-6">
                        <label for="request_type" class="form-label">Request Type</label>
                        <input type="text" class="form-control" name="request_type" id="request_type" value="{{ $project->request_type }}">
                    </div>

                    <div class="col-md-6">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" value="{{ $project->full_name }}">
                    </div>

                    <div class="col-md-6">
                        <label for="nick_name" class="form-label">Nick Name</label>
                        <input type="text" class="form-control" name="nick_name" id="nick_name" value="{{ $project->nick_name }}">
                    </div>

                    <div class="col-md-6">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" name="birth_date" id="birth_date" value="{{ $project->birth_date }}">
                    </div>

                    <div class="col-md-6">
                        <label for="birth_place" class="form-label">Birth Place</label>
                        <input type="text" class="form-control" name="birth_place" id="birth_place" value="{{ $project->birth_place }}">
                    </div>

                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option disabled>Choose...</option>
                            <option value="Male" {{ $project->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $project->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="marital_status" class="form-label">Marital Status</label>
                        <select class="form-select" name="marital_status" id="marital_status">
                            <option disabled>Choose...</option>
                            <option value="Single" {{ $project->marital_status == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="Married" {{ $project->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="skill_category" class="form-label">Skill Category</label>
                        <select class="form-select" name="skill_category" id="skill_category">
                            <option disabled>Choose...</option>
                            <option value="Skilled" {{ $project->skill_category == 'Skilled' ? 'selected' : '' }}>Skilled</option>
                            <option value="Unskilled" {{ $project->skill_category == 'Unskilled' ? 'selected' : '' }}>Unskilled</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Job Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}" {{ old('category_id', $project->category_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->job_category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="category_code_id" class="form-label">Job Code</label>
                        <select class="form-select" id="category_code_id" name="category_code_id" required>
                            @foreach ($category_code as $c)
                                <option value="{{ $c->id }}" {{ old('category_code_id', $project->category_code_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->job_code }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_code_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" class="form-control" name="nationality" id="nationality" value="{{ $project->nationality }}">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $project->email }}">
                    </div>

                    <div class="col-md-2">
                        <label for="country_code" class="form-label">Country Code</label>
                        <input type="text" class="form-control" name="country_code" id="country_code" value="{{ $project->country_code }}">
                    </div>

                    <div class="col-md-4">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $project->phone_number }}">
                    </div>

                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $project->start_date }}">
                    </div>

                    <div class="col-md-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $project->end_date }}">
                    </div>

                    <div class="col-12 mt-3 text-end">
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')
