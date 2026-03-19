@include('layout.header')
<form class="row g-3" method="POST" action="{{ route('category_code.store') }}">
    @csrf
    <div class="col-md-6">
        <label for="job_code" class="form-label">Job Code</label>
        <input type="text" class="form-control" id="job_code" name="job_code" placeholder="job_code" title="job_code">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@include('layout.footer')
