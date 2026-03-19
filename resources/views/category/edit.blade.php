@include('layout.header')

<div class="container mt-5">
    <h3 class="mb-4">Edit Category Data</h3>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-6 mb-3">
            <label for="job_category" class="form-label">Job Category</label>
            <input type="text" class="form-control" name="job_category" id="job_category"
                value="{{ $category->job_category }}" title="job_category">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@include('layout.footer')
