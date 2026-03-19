@include('layout.header')

<div class="d-flex justify-content-between align-category-center mb-3">
    <h3 class="mb-0 text-primary">Details category</h3>
    <a href="{{ route('category.create') }}" class="btn btn-primary">Add category</a>
</div>
<table class="table table-striped">
    <table class="table table-striped">
        <tbody>
            <thead>
                <th>job category </th>
            </thead>
            <tr>
                <td>{{ $category->job_category }}</td>
            </tr>
        </tbody>
    </table>

</table>
@include('layout.footer')
