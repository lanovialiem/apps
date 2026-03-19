@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">medical_checkups Details</h3>
    <a href="{{ route('medical_checkupss.create') }}" class="btn btn-primary">
        Add MCU
    </a>
</div>

<div class="card shadow-sm rounded-3">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="fw-bold">Profile</label>
                <div class="class g-2">
                    @if ($medical_checkups->image_profile)
                        <img src="{{ asset('storage/' . $medical_checkups->image_profile) }}" alt="Profile" width="150">
                    @else
                        <img alt="No Profile" width="150"
                            style="opacity: 0.7;">
                    @endif

                </div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Badge ID:</label>
                <div>{{ $medical_checkups->badge_id }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Request Type:</label>
                <div>{{ $medical_checkups->request_type }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Full Name:</label>
                <div>{{ $medical_checkups->full_name }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Nick Name:</label>
                <div>{{ $medical_checkups->nick_name }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Birth Place:</label>
                <div>{{ $medical_checkups->birth_place }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Birth Date:</label>
                <div>{{ $medical_checkups->birth_date }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Gender:</label>
                <div>{{ $medical_checkups->gender }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Marital Status:</label>
                <div>{{ $medical_checkups->marital_status }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Skill Category:</label>
                <div>{{ $medical_checkups->skill_category }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Category:</label>
                <div>{{ $medical_checkups->category->job_category ?? '-' }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Category Code:</label>
                <div>{{ $medical_checkups->category_code->job_code ?? '-' }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Nationality:</label>
                <div>{{ $medical_checkups->nationality }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Email:</label>
                <div>{{ $medical_checkups->email }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Country Code:</label>
                <div>{{ $medical_checkups->country_code }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Phone Number:</label>
                <div>{{ $medical_checkups->phone_number }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Start Date:</label>
                <div>{{ $medical_checkups->start_date }}</div>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">End Date:</label>
                <div>{{ $medical_checkups->end_date }}</div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')
