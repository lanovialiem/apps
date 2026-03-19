@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Project Details</h3>
    <a href="{{ route('Projects.create') }}" class="btn btn-primary">
        Add Project
    </a>
</div>

<div class="card shadow-sm rounded-3">
    <div class="card-body">

    </div>
</div>

@include('layout.footer')
