@include('layout.header')

<div class="container py-4">
    <div class="card shadow rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Project List</h5>
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" height="40">
        </div>
        <div class="card-body">
            <form class="row g-4" method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name"
                        value="{{ old('company_name') }}">
                    @error('company_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="col-md-6">
                    <label for="no_quotation" class="form-label">Penawaran ID</label>
                    <select class="form-select" id="no_quotation" name="no_quotation">
                        <option disabled {{ old('gender') ? '' : 'selected' }}>Choose ID Penawaran</option>
                        <option value= >Male</option>
                    </select>
                    @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                <div class="col-md-6">
                    <label for="subject_name" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject_name" name="subject_name"
                        value="{{ old('subject_name') }}">
                    @error('subject_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="category_project" class="form-label">Category project</label>
                    <input type="text" class="form-control" id="category_project" name="category_project"
                        value="{{ old('category_project') }}">
                    @error('category_project')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="contact_person" class="form-label">Contact Person</label>
                    <input type="text" class="form-control" id="contact_person" name="contact_person"
                        value="{{ old('contact_person') }}">
                    @error('contact_person')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="no_quotation" class="form-label">No. Quotation</label>
                    <input type="text" class="form-control" id="no_quotation" name="no_quotation"
                        value="{{ old('no_quotation') }}">
                    @error('no_quotation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="purposed_value" class="form-label">Purposed Value</label>
                    <input type="number" step="0.01" class="form-control" id="purposed_value" name="purposed_value"
                        value="{{ old('purposed_value') }}">
                    @error('purposed_value')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="date_sph" class="form-label">Date SPH</label>
                    <input type="date" class="form-control" id="date_sph" name="date_sph"
                        value="{{ old('date_sph') }}">
                    @error('date_sph')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="upload_dokumen" class="form-label">Upload Dokumen</label>
                    <input type="file" class="form-control" id="upload_dokumen" name="upload_dokumen">
                    @error('upload_dokumen')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@include('layout.footer')
