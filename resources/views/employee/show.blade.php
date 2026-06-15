@extends('welcome.welcome')

@section('content')
    <div class="container">

        {{-- Header --}}
        <div class="page-header">
            <div>
                <h1 class="text-3xl font-bold text-white">
                    Employee Detail
                </h1>

                <p class="text-blue-100 mt-2 text-sm">
                    Detail data karyawan perusahaan
                </p>
            </div>

            <div class="action-group">
                <a href="{{ route('employees.index') }}"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm text-black">
                    Back
                </a>

                {{-- @can('edit employee')
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn-edit">
                Edit
            </a>
            @endcan --}}
            </div>
        </div>

        {{-- Content --}}
        <div class="employee-card">

            {{-- Profile --}}
            <div class="flex justify-center mb-8">
                @if ($employee->image_profile)
                    <img src="{{ asset('storage/' . $employee->image_profile) }}" alt="Profile"
                        class="w-40 h-40 object-cover border-4 border-blue-100 shadow-md">
                @else
                    <div class="w-40 h-40 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                @endif
            </div>

            {{-- Information --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="font-semibold text-gray-600">Identity ID</label>
                    <p>{{ $employee->identity_id ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Badge ID</label>
                    <p>{{ $employee->badge_id ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Request Type</label>
                    <p>{{ $employee->request_type ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Full Name</label>
                    <p>{{ $employee->full_name ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Nick Name</label>
                    <p>{{ $employee->nick_name ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Birth Place</label>
                    <p>{{ $employee->birth_place ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Birth Date</label>
                    <p>{{ $employee->birth_date ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Gender</label>
                    <p>{{ $employee->gender ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Marital Status</label>
                    <p>{{ $employee->marital_status ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Skill Category</label>
                    <p>{{ $employee->skill_category ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Category</label>
                    <p>{{ $employee->category->job_category ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Job Code</label>
                    <p>{{ $employee->category_code->job_code ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Nationality</label>
                    <p>{{ $employee->nationality ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Email</label>
                    <p>{{ $employee->email ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Country Code</label>
                    <p>{{ $employee->country_code ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Phone Number</label>
                    <p>{{ $employee->phone_number ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Company</label>
                    <p>{{ $employee->company ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Start Date</label>
                    <p>{{ $employee->start_date ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">End Date</label>
                    <p>{{ $employee->end_date ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Induction Date</label>
                    <p>{{ $employee->induction_date ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">In Date</label>
                    <p>{{ $employee->in_date ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Date Resign</label>
                    <p>{{ $employee->date_resign ?? '-' }}</p>
                </div>

                <div>
                    <label class="font-semibold text-gray-600">Status</label>
                    <p>
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                            {{ $employee->status ?? '-' }}
                        </span>
                    </p>
                </div>

            </div>

            {{-- Address --}}
            <div class="mt-8">
                <label class="font-semibold text-gray-600">Address</label>
                <p class="mt-2">
                    {{ $employee->address ?? '-' }}
                </p>
            </div>

        </div>
    </div>
@endsection
