@include('layout.header')

<div class="container mt-5">
    <div class="card shadow rounded-3">
        <div class="card-header">
            <h4 class="mb-0">Edit Penawaran Data</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('penawaran.update', $penawaran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control"
                        value="{{ old('company_name', $penawaran->company_name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="subject_name" class="form-label">Subject Name</label>
                    <input type="text" name="subject_name" id="subject_name" class="form-control"
                        value="{{ old('subject_name', $penawaran->subject_name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="category_penawaran" class="form-label">Category Penawaran</label>
                    <input type="text" name="category_penawaran" id="category_penawaran" class="form-control"
                        value="{{ old('category_penawaran', $penawaran->category_penawaran) }}" required>
                </div>

                <div class="mb-3">
                    <label for="contact_person" class="form-label">Contact Person</label>
                    <input type="text" name="contact_person" id="contact_person" class="form-control"
                        value="{{ old('contact_person', $penawaran->contact_person) }}" required>
                </div>

                <div class="mb-3">
                    <label for="no_quotation" class="form-label">No. Quotation</label>
                    <input type="text" name="no_quotation" id="no_quotation" class="form-control"
                        value="{{ old('no_quotation', $penawaran->no_quotation) }}" required>
                </div>

                <div class="mb-3">
                    <label for="purposed_value" class="form-label">Purposed Value</label>
                    <input type="number" name="purposed_value" id="purposed_value" class="form-control"
                        value="{{ old('purposed_value', $penawaran->purposed_value) }}" required>
                </div>

                <div class="mb-3">
                    <label for="date_sph" class="form-label">Date SPH</label>
                    <input type="date" name="date_sph" id="date_sph" class="form-control"
                        value="{{ old('date_sph', \Carbon\Carbon::parse($penawaran->date_sph)->format('Y-m-d')) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control" required>{{ old('description', $penawaran->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="upload_dokumen" class="form-label">Upload Dokumen</label>
                    @if ($penawaran->upload_dokumen)
                        <p>Current file: <a href="{{ asset('storage/' . $penawaran->upload_dokumen) }}"
                                target="_blank">{{ basename($penawaran->upload_dokumen) }}</a></p>
                    @endif
                    <input type="file" name="upload_dokumen" id="upload_dokumen" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('penawaran.index') }}" class="btn btn-secondary">Cancel</a>
            </form>

            </form>
        </div>
    </div>
</div>

@include('layout.footer')
