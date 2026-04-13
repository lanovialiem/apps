@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Employee Details</h3>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">
        Add Employee
    </a>
</div>

<div class="card shadow-sm rounded-3">
    <div class="card-body">
        <div class="row g-3">
            {{-- Profile --}}
            <div class="col-md-6">
                <label class="fw-bold">Profile</label>
                <div class="class g-2">
                    @if ($employee->image_profile)
                        <img src="{{ asset('storage/' . $employee->image_profile) }}" alt="Profile" width="150">
                    @else
                        <img alt="No Profile" width="150" style="opacity: 0.7;">
                    @endif
                </div>
            </div>

            {{-- Badge ID --}}
            <div class="col-md-6">
                <label class="fw-bold">Badge ID:</label>
                <div>{{ $employee->badge_id }}</div>
            </div>

            {{-- Identity ID --}}
            <div class="col-md-6">
                <label class="fw-bold">Identity ID:</label>
                <div>{{ $employee->identity_id }}</div>
            </div>

            {{-- Request Type --}}
            <div class="col-md-6">
                <label class="fw-bold">Request Type:</label>
                <div>{{ $employee->request_type }}</div>
            </div>

            {{-- Full Name --}}
            <div class="col-md-6">
                <label class="fw-bold">Full Name:</label>
                <div>{{ $employee->full_name }}</div>
            </div>

            {{-- Nick Name --}}
            <div class="col-md-6">
                <label class="fw-bold">Nick Name:</label>
                <div>{{ $employee->nick_name }}</div>
            </div>

            {{-- Birth Place --}}
            <div class="col-md-6">
                <label class="fw-bold">Birth Place:</label>
                <div>{{ $employee->birth_place }}</div>
            </div>

            {{-- Birth Date --}}
            <div class="col-md-6">
                <label class="fw-bold">Birth Date:</label>
                <div>{{ $employee->birth_date }}</div>
            </div>

            {{-- Gender --}}
            <div class="col-md-6">
                <label class="fw-bold">Gender:</label>
                <div>{{ $employee->gender }}</div>
            </div>

            {{-- Marital Status --}}
            <div class="col-md-6">
                <label class="fw-bold">Marital Status:</label>
                <div>{{ $employee->marital_status }}</div>
            </div>

            {{-- Skill Category --}}
            <div class="col-md-6">
                <label class="fw-bold">Skill Category:</label>
                <div>{{ $employee->skill_category }}</div>
            </div>

            {{-- Company --}}
            <div class="col-md-6">
                <label class="fw-bold">Company:</label>
                <div>{{ $employee->company }}</div>
            </div>

            {{-- Status --}}
            <div class="col-md-6">
                <label class="fw-bold">Status:</label>
                <div>{{ $employee->status }}</div>
            </div>

            {{-- Address --}}
            <div class="col-md-12">
                <label class="fw-bold">Address:</label>
                <div>{{ $employee->address }}</div>
            </div>

            {{-- Category --}}
            <div class="col-md-6">
                <label class="fw-bold">Category:</label>
                <div>{{ $employee->category->job_category ?? '-' }}</div>
            </div>

            {{-- Category Code --}}
            <div class="col-md-6">
                <label class="fw-bold">Category Code:</label>
                <div>{{ $employee->category_code->job_code ?? '-' }}</div>
            </div>

            {{-- Nationality --}}
            <div class="col-md-6">
                <label class="fw-bold">Nationality:</label>
                <div>{{ $employee->nationality }}</div>
            </div>

            {{-- Email --}}
            <div class="col-md-6">
                <label class="fw-bold">Email:</label>
                <div>{{ $employee->email }}</div>
            </div>

            {{-- Country Code --}}
            <div class="col-md-6">
                <label class="fw-bold">Country Code:</label>
                <div>{{ $employee->country_code }}</div>
            </div>

            {{-- Phone Number --}}
            <div class="col-md-6">
                <label class="fw-bold">Phone Number:</label>
                <div>{{ $employee->phone_number }}</div>
            </div>

            {{-- Start Date --}}
            <div class="col-md-6">
                <label class="fw-bold">Start Date:</label>
                <div>{{ $employee->start_date }}</div>
            </div>

            {{-- End Date --}}
            <div class="col-md-6">
                <label class="fw-bold">End Date:</label>
                <div>{{ $employee->end_date }}</div>
            </div>

        </div>
    </div>
</div>

@include('layout.footer')