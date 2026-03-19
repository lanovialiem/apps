@include('layout.header')

<div class="container py-4">
    <div class="card shadow rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">MCU Registration Form</h5>
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" height="40">
        </div>
        <div class="card-body">
            <form class="row g-4" method="POST" action="{{ route('medical_checkups.store') }}"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')

                <div class="col-md-6">
                    <label for="employee_id" class="form-label">Name</label>
                    <select class="form-select" id="employee_id" name="employee_id">
                        <option disabled {{ old('employee_id') ? '' : 'selected' }}>Choose...</option>
                        @foreach ($employee as $c)
                            <option value="{{ $c->id }}" {{ old('employee_id') == $c->id ? 'selected' : '' }}>
                                {{ $c->full_name}}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Identity --}}
                <div class="col-md-6">
                    <label for="identity_id" class="form-label">Hostpital</label>
                    <select class="form-select" id="hospital" name="hospital">
                        <option disabled {{ old('hospital') ? '' : 'selected' }}>Choose...</option>
                        @foreach ($h as $hs)
                            <option value="{{ $hs }}" {{ old('hospital') == $hs ? 'selected' : '' }}>
                                {{ $hs }}
                            </option>
                        @endforeach
                    </select>
                    @error('hospital')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="mcu_date" class="form-label">MCU Date</label>
                    <input type="date" class="form-control" id="mcu_date" name="mcu_date"
                        value="{{ old('mcu_date') }}">
                    @error('mcu_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="expire_date" class="form-label">Expire Date</label>
                        <input type="date" name="expire_date" id="expire_date" class="form-control" readonly>
                    @error('expire_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="result" class="form-label">Result</label>
                    <select class="form-select" id="result" name="result">
                        <option disabled {{ old('result') ? '' : 'selected' }}>Choose...</option>
                        <option value="Fit_to_work" {{ old('result') == 'Fit' ? 'selected' : '' }}>Fit to work</option>
                        <option value="Fit_with_note" {{ old('result') == 'Unfit' ? 'selected' : '' }}>Fit with note
                        </option>
                        <option value="-" {{ old('result') == '-' ? 'selected' : '' }}>-</option>
                    </select>
                    @error('result')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="file_mcu" class="form-label">Upload MCU File (PDF)</label>
                    <input type="file" class="form-control @error('file_mcu') is-invalid @enderror" id="file_mcu"
                        name="file_mcu">
                    @error('file_mcu')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="col-md-4">
                    <label for="file_mcu" class="form-label">Upload MCU File (PDF)</label>
                    <input type="file" class="form-control @error('file_mcu') is-invalid @enderror" id="file_mcu"
                        name="file_mcu" accept="application/pdf">
                    @error('file_mcu')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{--                 <div class="col-md-6">
                    <label for="image_profile" class="form-label">Upload Profile</label>
                    <input type="file" class="form-control @error('image_profile') is-invalid @enderror"
                        id="image_profile" name="image_profile">
                    @error('image_profile') <div class="text-danger">{{ $message }}</div> @enderror
                </div> --}}

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter additional notes">{{ old('description') }}</textarea>
                    @error('description')
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

<script>
document.getElementById('mcu_date').addEventListener('change', function() {

    let mcuDate = new Date(this.value);

    if(!isNaN(mcuDate)){
        mcuDate.setFullYear(mcuDate.getFullYear() + 1);

        let year = mcuDate.getFullYear();
        let month = String(mcuDate.getMonth() + 1).padStart(2, '0');
        let day = String(mcuDate.getDate()).padStart(2, '0');

        let expireDate = year + '-' + month + '-' + day;

        document.getElementById('expire_date').value = expireDate;
    }
});
</script>