@include('layout.header')

<div class="container mt-5">
    <div class="card shadow rounded-3">
        <div class="card-header">
            <h4 class="mb-0">Edit projectEmployee Employee Data</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('project_employee.update', $projectEmployeeEmployee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    {{-- <div class="col-md-6">
                        <label for="badge_id" class="form-label">projectEmployee ID</label>
                        <input type="text" class="form-control" name="projectEmployee_id" id="projectEmployee_id" value="{{ $projectEmployee->badge_id }}">
                    </div> --}}

                    <div class="col-md-6">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $projectEmployee->name }}">
                    </div>

                    <div class="col-md-6">
                        <label for="request_type" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="request_type" id="request_type" value="{{ $projectEmployee->company_name }}">
                    </div>

                    <div class="col-md-6">
                        <label for="full_name" class="form-label">MCU</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" value="{{ $projectEmployee->mcu }}">
                    </div>

                    <div class="col-md-6">
                        <label for="nick_name" class="form-label">Position</label>
                        <input type="text" class="form-control" name="position" id="position" value="{{ $projectEmployee->position }}">
                    </div>


                    <div class="col-md-6">
                        <label for="induction" class="form-label">induction</label>
                        <input type="text" class="form-control" name="induction" id="induction" value="{{ $projectEmployee->induction }}">
                    </div>

                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option disabled>Choose...</option>
                            <option value="Male" {{ $projectEmployee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $projectEmployee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="on_site" class="form-label">On Site</label>
                        <select class="form-select" name="on_site" id="on_site">
                            <option disabled>Choose...</option>
                            <option value="Single" {{ $projectEmployee->on_site == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="Married" {{ $projectEmployee->on_site == 'Married' ? 'selected' : '' }}>Married</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="date_resign" class="form-label">Skill Category</label>
                        <select class="form-select" name="date_resign" id="date_resign">
                            <option disabled>Choose...</option>
                            <option value="Skilled" {{ $projectEmployee->date_resign == 'Skilled' ? 'selected' : '' }}>Skilled</option>
                            <option value="Unskilled" {{ $projectEmployee->date_resign == 'Unskilled' ? 'selected' : '' }}>Unskilled</option>
                        </select>
                    </div>

                    {{-- <div class="col-md-6">
                        <label for="category_id" class="form-label">Job Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}" {{ old('category_id', $projectEmployee->category_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->job_category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div> --}}


                    <div class="col-md-6">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" class="form-control" name="nationality" id="nationality" value="{{ $projectEmployee->nationality }}">
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
