@include('layout.header')
<form class="row g-3" method="POST" action="{{ route('category.store') }}">
    @csrf
    <div class="col-md-6">
        <label for="identity_id" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" id="job_category" name="job_category" placeholder="Enter job category"
            title="job_category">
    </div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@include('layout.footer')
