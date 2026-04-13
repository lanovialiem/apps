@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">History Details</h3>
    <a href="{{ route('stock_movement.create') }}" class="btn btn-primary">
        Stock Movement History
    </a>
</div>

<div class="card shadow-sm rounded-3">
    <div class="card-body">

    </div>
</div>

@include('layout.footer')
