@include('layout.header')

<div class="container mt-5">
    <h3 class="mb-4">Edit Category Code Job Data</h3>

    <form action="{{ route('category_code.update', $category_code->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="col-md-6 mb-3">
            <label for="job_code" class="form-label">Job Code</label>
            <input type="text" class="form-control" name="job_code" id="job_code" value="{{ $category_code->job_code}}"
                title="job_code">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@include('layout.footer')
